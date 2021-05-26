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

            $data2 = $this->receiveAJAX();
            $name = $this->request->getVar('username', FILTER_SANITIZE_STRING);
            $pass = $this->request->getVar('password', FILTER_SANITIZE_STRING);
            
            $model = new UserModel();
            $userId = $model->CheckUserExists($name, $pass);
        
            if($userId > 0)
            {
                $user = $model->GetUserByID($userId);
                $accModel = new AccountStatusModel();
                $userStatusName = $accModel->GetStatusNameByID($user->IdStatus);
                
                if($userStatusName == APPROVED_STATUS_NAME)
                {
                    $_SESSION['username'] = $name;
                    $this->sendAJAX($user);
                }
                else
                {
                    $this->sendAJAX("Your account is still pending approval...");
                }
            }
            else
            {
                $this->sendAJAX("false");
            }  
        }
}
