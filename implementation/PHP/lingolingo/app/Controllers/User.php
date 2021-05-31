<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AccountStatusModel;
use App\Models\AccountTypeModel;
use App\Models\LanguageModel;
use App\Models\QuestionModel;

 

class User extends BaseController
{
    public function login()
    {
            $this->receiveAJAX();
            $username = $this->request->getVar('username', FILTER_SANITIZE_STRING);
            $pass = $this->request->getVar('password', FILTER_SANITIZE_STRING);
            
            $model = new UserModel();
            $user = $model->GetUser($username);
            
            $loginResult = array(
                "LoginSuccessful" => false, 
                "Username" => null,
                "FirstName" => null,
                "LastName" => null,
                "UserTypeId" => null,
                "Message" => null
                );
        
            if(isset($user))
            {
                if(password_verify($pass, $user->Password))
                {
                    
                    $accModel = new AccountStatusModel();
                    $accountStatus = $accModel->GetStatusNameByID($user->IdStatus);

                    if($accountStatus == ACCOUNT_STATUS_APPROVED)
                    {
                        $_SESSION['username'] = $username;
                        
                        $loginResult["LoginSuccessful"] = true;
                        $loginResult["Username"] = $username;
                        $loginResult["FirstName"] = $user->FirstName;
                        $loginResult["LastName"] = $user->LastName;
                        $loginResult["UserTypeId"] = $user->IdUserType;
                    }
                    else if($accountStatus == ACCOUNT_STATUS_PENDING)
                    {
                        $loginResult["Message"] = LOGIN_PENDING_APPROVAL;
                    }
                    else if($accountStatus == ACCOUNT_STATUS_SUSPENDED)
                    {
                        $loginResult["Message"] = LOGIN_ACCOUNT_SUSPENDED;
                    }
                }
                else
                {
                    $loginResult["Message"] = LOGIN_WRONG_PASSWORD;
                }
            }
            else
            {
                $loginResult["Message"] = LOGIN_UNKNOWN_USER;
            }  
            
            $this->sendAJAX(json_encode($loginResult));
        }
        
    public function register()
    {
        $this->receiveAJAX();
        $firstName = $this->request->getVar('FirstName', FILTER_SANITIZE_STRING);
        $lastName = $this->request->getVar('LastName', FILTER_SANITIZE_STRING);
        $username = $this->request->getVar('Username', FILTER_SANITIZE_STRING);
        $email = $this->request->getVar('Email', FILTER_SANITIZE_STRING);
        $password = $this->request->getVar('Password', FILTER_SANITIZE_STRING);
        $confirmPassword = $this->request->getVar('ConfirmPassword', FILTER_SANITIZE_STRING);
        $accountType = $this->request->getVar('AccountType', FILTER_SANITIZE_STRING);

        $registerResult = array(
            "RegisterSuccessful" => false,
            "Message" => null
            );
        
        $userModel = new UserModel();
        $accountStatusModel = new AccountStatusModel();
        $accountTypeModel = new AccountTypeModel();
        
        if(empty($firstName) || empty($lastName) || empty($username) || empty($email) || empty($password) || empty($confirmPassword) || empty($accountType))
        {
            $registerResult["Message"] = REGISTRATION_MISSING_INFO;
        }
        else if($password != $confirmPassword)
        {
            $registerResult["Message"] = REGISTRATION_PASSWORD_MISMATCH;
        }
        else if($userModel->CheckUsernameTaken($username))
        {
            $registerResult["Message"] = REGISTRATION_USERNAME_TAKEN;
        }
        else if($userModel->CheckEmailTaken($email))
        {
            $registerResult["Message"] = REGISTRATION_EMAIL_TAKEN;
        }
        else if(strlen($password) > 70)
        {
            $registerResult["Message"] = REGISTRATION_PASSWORD_TOO_LONG;
        }
        else
        {
            $accountTypeId = null;
            $accountStatusId = null;
            if($accountType == ACCOUNT_TYPE_PLAYER)
            {
                $accountTypeId = $accountTypeModel->GetTypeIDByName(ACCOUNT_TYPE_PLAYER);
                $accountStatusId = $accountStatusModel->GetStatusIDByName(ACCOUNT_STATUS_APPROVED);
            }
            else if($accountType == ACCOUNT_TYPE_PROFESSOR)
            {
                $accountTypeId = $accountTypeModel->GetTypeIDByName(ACCOUNT_TYPE_PROFESSOR);
                $accountStatusId = $accountStatusModel->GetStatusIDByName(ACCOUNT_STATUS_PENDING);
            }
            else if($accountType == ACCOUNT_TYPE_ADMIN)
            {
                $accountTypeId = $accountTypeModel->GetTypeIDByName(ACCOUNT_TYPE_ADMIN);
                $accountStatusId = $accountStatusModel->GetStatusIDByName(ACCOUNT_STATUS_PENDING);
            }
            else
            {
                $registerResult["Message"] = REGISTRATION_INCORRECT_ACCOUNT_TYPE;
            }
            
            if(isset($accountStatusId) && isset($accountTypeId))
            {
                $passwordHash = $this->encryptPassword($password);
                $userModel->RegisterNewUser($firstName, $lastName, $username, $passwordHash, $email, $accountTypeId, $accountStatusId);
                
                $registerResult['RegisterSuccessful'] = true;
                $registerResult['Message'] = REGISTRATION_SUCCESSFUL;
            }
        }
        
        $this->sendAJAX(json_encode($registerResult));
    }

    public function languages() {
        $this->receiveAJAX();

        $model = new LanguageModel();
        $languages = $model->GetLanguageNames();

        $result = ["Spanish", "German", "Italian"];
        $this->sendAJAX(json_encode($languages));
    }

    public function newQuestion() {
        $this->receiveAJAX();
        $question = $this->request->getVar('question', FILTER_SANITIZE_STRING);
        $answer = $this->request->getVar('answer', FILTER_SANITIZE_STRING);
        $languageName = $this->request->getVar('language', FILTER_SANITIZE_STRING);
        $username = $this->request->getVar('professor', FILTER_SANITIZE_STRING);

        $languageModel = new LanguageModel();
        $languageId = $languageModel->GetLanguageId($languageName);

        $userModel = new UserModel();
        $authorId = $userModel->GetUserId($username);

        $model = new QuestionModel();
        $model->NewQuestion($languageId, $authorId, $question, $answer);

    }

    public function question() {
        $this->receiveAJAX();

        $language = $this->request->getVar('language', FILTER_SANITIZE_STRING);

        $languageModel = new LanguageModel();
        $languageId = $languageModel->GetLanguageId($language);

        $questionModel = new QuestionModel();
        $result = $questionModel->getRandomQuestion($languageId);

        $this->sendAJAX($result);

    }

    public function userInfo(){
        $this->receiveAJAX();

        $username = $this->request->getVar('username', FILTER_SANITIZE_STRING);

        $userModel = new UserModel();
        $name = $userModel->getUserFullName($username);

        $oneResult = array (
            'language'       => "German", 
            'basic_score'    => 120,
            'survival_score' => 1990
        );
        $results = array($oneResult);

        $result = array(
            'name'      =>  $name,
            'results'   =>  $results
        );

        $this->sendAJAX($result);

    }
        
        
    public function questions(){
        $this->receiveAJAX();
        
        $model = new QuestionModel();
        $questions = $model->GetAllQuestions();
        
        $languageModel = new LanguageModel();
        
        $data;
        
        for($i = 0; $i < count($questions); $i++){
            $data[$i] =  array(
                'language'  => $languageModel->GetLanguageName($questions[$i]->IdLanguage),
                'question'  =>  $questions[$i]->QuestionText,
                'answer'    =>  $questions[$i]->AnswerText,
                'flag'      =>  $questions[$i]->IsFlagged
            );
        }
        
        $this->sendAJAX($data);
        
    }
}
 