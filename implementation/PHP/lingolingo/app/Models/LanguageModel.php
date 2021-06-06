<?php 
/**
 * Miloš Jovanović 2013/0669
 * Ksenija Bulatović 2019/0730
**/

namespace App\Models;

use CodeIgniter\Model;
/**
* LanguageModel – klasa za komunikaciju sa tabelom 'languages' iz baze
*
* @version 1.0
*/
class LanguageModel extends Model
{
    /**
    * GetLanguageNames funkcija koja dohvata sve nazive jezika iz baze
    * 
    * @return result
    *
    */
    public function GetLanguageNames()
    {
        $builder = $this->db->table('languages');
        $builder->select("LanguageName");
        
        $result = $builder->get()->getResultArray();
        
        // $result = $builder->get()->getResultObject();
        return $result;
    }
    
    /**
    * GetLanguageId funkcija koja dohvata id jezika na osnovu naziva jezika
    *
    * @param Request $name name
    *
    * @return IdLanguage
    *
    */
    public function GetLanguageId($name){
        $builder = $this->db->table('languages');
        $builder->select("*");
        $builder->where('LanguageName', $name);
        
        $result = $builder->get()->getResult();
        return $result[0]->IdLanguage;
        
    }
    
    /**
    * GetGameModeIdByName funkcija koja dohvata naziv jezika na osnovu id-a jezika
    *
    * @param Request $gameModeName gameModeName
    *
    * @return IdGameType
    *
    */
    public function GetLanguageName($id) {
        $builder = $this->db->table('languages');
        $builder->select("*");
        $builder->where('IdLanguage', $id);
        
        $result = $builder->get()->getResult();
        return $result[0]->LanguageName;
    }
    
}