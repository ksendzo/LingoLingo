<?php 
/**
 * Miloš Jovanović 2013/0669
 * Ksenija Bulatović 2019/0730
**/

namespace App\Models;
use CodeIgniter\Model;


/**
* AccountTypeModel – klasa za komunikaciju sa tabelom 'usertypes' iz baze
*
* @version 1.0
*/
class AccountTypeModel extends Model
{
    /**
    * GetTypeNameByID funkcija koja dohvata Type Name na osnovu id-a
    *
    * @param Request $id id
    *
    * @return UserTypeName
    *
    */
    public function GetTypeNameByID($id)
    {
        if( !isset($id))
        {
            return null;
        }
        
        $builder = $this->db->table('usertypes');
        $builder->select("*");
        $builder->where('IdUserType', $id);
        
        $result = $builder->get()->getResultObject();
        return $result[0]->UserTypeName;
    }
    
    /**
    * GetTypeIDByName funkcija koja dohvata id na osnovu Type Name-a
    *
    * @param Request $typeName typeName
    *
    * @return id
    *
    */
    public function GetTypeIDByName($typeName)
    {
        if( !isset($typeName))
        {
            return null;
        }
        
        $builder = $this->db->table('usertypes');
        $builder->select("*");
        $builder->where('UserTypeName', $typeName);
        
        $result = $builder->get()->getResultObject();
        return $result[0]->IdUserType;
    }
    
}