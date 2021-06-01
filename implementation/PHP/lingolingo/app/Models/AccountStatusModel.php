<?php 
namespace App\Models;


use CodeIgniter\Model;

 


class AccountStatusModel extends Model
{
    public function GetStatusNameByID($id)
    {
        if( !isset($id))
        {
            return null;
        }
        
        $builder = $this->db->table('accountstatuses');
        $builder->select("*");
        $builder->where('IdStatus', $id);
        
        $result = $builder->get()->getResultObject();
        return $result[0]->StatusName;
    }
    
    public function GetStatusIDByName($statusName)
    {
        if( !isset($statusName))
        {
            return null;
        }
        
        $builder = $this->db->table('accountstatuses');
        $builder->select("*");
        $builder->where('StatusName', $statusName);
        
        $result = $builder->get()->getResultObject();
        return $result[0]->IdStatus;
    }
    
}