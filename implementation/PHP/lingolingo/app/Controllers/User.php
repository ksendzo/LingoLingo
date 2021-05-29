<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AccountStatusModel;

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
}
