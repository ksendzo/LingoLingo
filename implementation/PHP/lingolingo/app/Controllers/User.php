<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AccountStatusModel;
use App\Models\LanguageModel;
use App\Models\QuestionModel;

 

class User extends BaseController
{
    public function login()
    {
            //$this->receiveAJAX();
            /*$data = [
                'username' => $this->request->getVar('username'),
                'password' => $this->request->getVar('password')
            ];*/

 

            $this->receiveAJAX();
            $username = $this->request->getVar('username', FILTER_SANITIZE_STRING);
            $pass = $this->request->getVar('password', FILTER_SANITIZE_STRING);
            
            $model = new UserModel();
            $userId = $model->CheckUserExists($username, $pass);
            
            $loginResult = array(
                "LoginSuccessful" => false, 
                "Username" => null,
                "FirstName" => null,
                "LastName" => null,
                "UserTypeId" => null,
                "AccountStatus" => null,
                "Message" => null
                );
        
            if($userId > 0)
            {
                $_SESSION['username'] = $username;
                
                $user = $model->GetUserByID($userId);
                $accModel = new AccountStatusModel();
                
                $loginResult["AccountStatus"] = $accModel->GetStatusNameByID($user->IdStatus);
                $loginResult["Username"] = $username;
                $loginResult["FirstName"] = $user->FirstName;
                $loginResult["LastName"] = $user->LastName;
                $loginResult["UserTypeId"] = $user->IdUserType;
                
                if($loginResult["AccountStatus"] == APPROVED_STATUS_NAME)
                {
                    $loginResult["LoginSuccessful"] = true;
                }
                else
                {
                    $loginResult["Message"] = "Your account is still pending approval";
                }
            }
            else
            {
                $loginResult["Message"] = "Incorrect username or password";
            }  
            
            $this->sendAJAX(json_encode($loginResult));
        }
        
        public function register()
        {
            
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
 