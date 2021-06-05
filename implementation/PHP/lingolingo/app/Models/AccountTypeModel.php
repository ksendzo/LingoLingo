<?php 
namespace App\Models;


use CodeIgniter\Model;

 


class AccountTypeModel extends Model
{
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