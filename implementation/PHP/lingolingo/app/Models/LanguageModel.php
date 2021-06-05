<?php 
namespace App\Models;

use CodeIgniter\Model;

class LanguageModel extends Model
{
    public function GetLanguageNames()
    {
        $builder = $this->db->table('languages');
        $builder->select("LanguageName");
        
        $result = $builder->get()->getResultArray();
        
        // $result = $builder->get()->getResultObject();
        return $result;
    }
    
    public function GetLanguageId($name){
        $builder = $this->db->table('languages');
        $builder->select("*");
        $builder->where('LanguageName', $name);
        
        $result = $builder->get()->getResult();
        return $result[0]->IdLanguage;
        
    }
    
    public function GetLanguageName($id) {
        $builder = $this->db->table('languages');
        $builder->select("*");
        $builder->where('IdLanguage', $id);
        
        $result = $builder->get()->getResult();
        return $result[0]->LanguageName;
    }
    
}