<?php namespace App\Models;
/**
 * Miloš Jovanović 2013/0669
 * Ksenija Bulatović 2019/0730
**/ 

use CodeIgniter\Model;

/**
* UserModel – klasa za komunikaciju sa tabelom 'useraccounts' iz baze
*
* @version 1.0
*/
class UserModel extends Model
{
    /**
    * GetAllPlayers funkcija koja dohvata sve igrače
    *
    * @return list
    *
    */
    public function GetAllPlayers() {
        $builder = $this->db->table('useraccounts');
        $builder->select('*');
        $builder->where('IdUserType', 1);
        $list = $builder->get()->getResultArray();
         
        return $list;        
    }
    
    /**
    * GetUser funkcija koja dohvata user-a na osnovu username-a
    *
     * @param $username
     * 
    * @return user
    *
    */
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
    
    /**
    * GetUserIdByUsername funkcija koja dohvata userId na osnovu username-a
    *
    * @param $username
    * 
    * @return id
    *
    */
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
    
    /**
    * CheckUsernameTaken funkcija koja proverava da li je zadati username zauzet ili ne
    *
    * @param $username
    * 
    * @return res
    *
    */
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
    
    /**
    * CheckEmailTaken funkcija koja proverava da li je zadati email zauzet ili ne
    *
    * @param $email
    * 
    * @return res
    *
    */
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
    
    /**
    * GetUserByID funkcija koja dohvata user-a na osnovu $id-a
    *
    * @param $id
    * 
    * @return result
    *
    */
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
    
    /**
    * RegisterNewUser funkcija koja kreira novog user-a
    *
    * @param $firstName, $lastName, $username, $password, $email, $accountTypeId, $accountStatusId
    *
    */
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
    
    /**
    * GetUserId funkcija koja vraca id user-a na osnovu username-a
    *
    * @param $username
    * 
    * @return IdUser
    *
    */
    public function GetUserId($username) {
        $builder = $this->db->table('useraccounts');
        $builder->select("*");
        $builder->where('Username', $username);
        
        $result = $builder->get()->getResultObject();
        return $result[0]->IdUser;
    }
    
    /**
    * GetUserFullName funkcija koja FirstName i LastName na osnovu username-a
    *
    * @param $username
    * 
    * @return Name
    *
    */
    public function GetUserFullName($username){
        $builder = $this->db->table('useraccounts');
        $builder->select('*');
        $builder->where('Username', $username);
        
        $result = $builder->get()->getResultObject();
        return $result[0]->FirstName . " " . $result[0]->LastName;
    }
    
    /**
    * GetUsersByAccountStatusIdAndAccountTypeId funkcija dohvata sve user-e na osnovu tipa naloga i statusa naloga
    *
    * @param $accountStatusId, $accountTypeId
    * 
    * @return $result
    *
    */
    public function GetUsersByAccountStatusIdAndAccountTypeId($accountStatusId, $accountTypeId)
    {
        $builder = $this->db->table('useraccounts');
        $builder->select('*');
        $builder->where('IdStatus', $accountStatusId);
        $builder->where('IdUserType', $accountTypeId);
        
        $result = $builder->get()->getResultArray();
        return $result;
    }
    
    /**
    * ChangeAccountStatus funkcija menja status userovom profilu po prosledjenim parametrima
    *
    * @param $userId, $accountStatusId
    *
    */
    public function ChangeAccountStatus($userId, $accountStatusId)
    {
        $builder = $this->db->table('useraccounts');
        $builder->set('IdStatus', $accountStatusId);
        $builder->where('IdUser', $userId);
        $builder->update();
    }
    
    /**
    * DeleteAccount funkcija koja brise user-a iz baze koji ima zadati id
    *
    * @param $userId
    *
    */
    public function DeleteAccount($userId)
    {
        $builder = $this->db->table('useraccounts');
        $builder->where('IdUser', $userId);
        $builder->delete();
    }
}