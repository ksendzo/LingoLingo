<?php namespace App\Models;

 

use CodeIgniter\Model;

 


class UserModel extends Model
{
    public function GetAllPlayers() {
        $builder = $this->db->table('useraccounts');
        $builder->select('*');
        $builder->where('IdUserType', 1);
        $list = $builder->get()->getResultArray();
         
        return $list;        
    }
    
    
    public function GetUser($username)
    {
        if( !isset($username))
        {
            return false;
        }
        
        $builder = $this->db->table('useraccounts');
        $builder->select("*");
        $builder->where('Username', $username);
        
        $result = $builder->get()->getResultObject();
        if(!empty($result))
        {
            return $result[0];
        }
        else
        {
            return null;
        }
    }
    
    public function GetUserIdByUsername($username)
    {
        if( !isset($username))
        {
            return false;
        }
        
        $builder = $this->db->table('useraccounts');
        $builder->select("IdUser");
        $builder->where('Username', $username);
        
        $result = $builder->get()->getResultObject();
        if(!empty($result))
        {
            return $result[0]->IdUser;
        }
        else
        {
            return null;
        }
    }
    
    public function CheckUsernameTaken($username)
    {
        $builder = $this->db->table('useraccounts');
        $builder->select("*");
        $builder->where('username', $username);
        
        $result = $builder->get()->getResultObject();
        if(!empty($result))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function CheckEmailTaken($email)
    {
        $builder = $this->db->table('useraccounts');
        $builder->select("*");
        $builder->where('Email', $email);
        
        $result = $builder->get()->getResultObject();
        if(!empty($result))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function GetUserByID($id)
    {
        if( !isset($id))
        {
            return null;
        }
        
        $builder = $this->db->table('useraccounts');
        $builder->select("*");
        $builder->where('IdUser', $id);
        
        $result = $builder->get()->getResultObject();
        return $result[0];
    }
    
    public function RegisterNewUser($firstName, $lastName, $username, $password, $email, $accountTypeId, $accountStatusId)
    {
        $newUser = [
            'FirstName' => $firstName,
            'LastName'  => $lastName,
            'Username'  => $username,
            'Password'  => $password,
            'Email'     => $email,
            'IdUserType'=> $accountTypeId,
            'IdStatus'  => $accountStatusId
        ];

        $query = $this->db->table('useraccounts');
        $query->insert($newUser);
    }
    
    public function dogadjaj($id)
    {
        
        
        
        /*
        $builder = $this->db->table('dogadjaj');
        $builder->select('*')->join('lokacija', 'id_lokacije = id_lok')->where('id_dog', $id);
        $result = $builder->get()->getResultObject();
        if( empty($result) ) return null;
        return $result[0];
         *
        */
    }
    
    public function gradovi()
    {
        /*
        $builder = $this->db->table('grad');
        return $builder->select("*")->get()->getResultObject();
         * 
         */
    }

 

    public function kategorije()
    {
        
        
        /*
        $builder = $this->db->table('kategorija');
        $kategorije = $builder->select("*")->get()->getResultObject();
        
        $svejedno = new \stdClass();
        $svejedno->naziv = 'Sve kategorije';
        array_unshift($kategorije, $svejedno);
        
        return $kategorije;
         * 
         */
    }
    
    public function GetUserId($username) {
        $builder = $this->db->table('useraccounts');
        $builder->select("*");
        $builder->where('Username', $username);
        
        $result = $builder->get()->getResultObject();
        return $result[0]->IdUser;
    }
    
    public function GetUserFullName($username){
        $builder = $this->db->table('useraccounts');
        $builder->select('*');
        $builder->where('Username', $username);
        
        $result = $builder->get()->getResultObject();
        return $result[0]->FirstName . " " . $result[0]->LastName;
    }
    
    public function GetUsersByAccountStatusIdAndAccountTypeId($accountStatusId, $accountTypeId)
    {
        $builder = $this->db->table('useraccounts');
        $builder->select('*');
        $builder->where('IdStatus', $accountStatusId);
        $builder->where('IdUserType', $accountTypeId);
        
        $result = $builder->get()->getResultArray();
        return $result;
    }
    
    public function ChangeAccountStatus($userId, $accountStatusId)
    {
        $builder = $this->db->table('useraccounts');
        $builder->set('IdStatus', $accountStatusId);
        $builder->where('IdUser', $userId);
        $builder->update();
    }
    
    public function DeleteAccount($userId)
    {
        $builder = $this->db->table('useraccounts');
        $builder->where('IdUser', $userId);
        $builder->delete();
    }
}