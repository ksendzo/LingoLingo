<?php 
/**
 * Miloš Jovanović 2013/0669
 * Ksenija Bulatović 2019/0730
**/

namespace App\Models;

use CodeIgniter\Model;

/**
* GameTypeModel – klasa za komunikaciju sa tabelom 'gametypes' iz baze
*
* @version 1.0
*/
class GameTypeModel extends Model
{
    /**
    * GetGameModeIdByName funkcija koja dohvata Game Mode Id na osnovu imena moda-a
    *
    * @param Request $gameModeName gameModeName
    *
    * @return IdGameType
    *
    */
    public function GetGameModeIdByName($gameModeName)
    {
        if( !isset($gameModeName))
        {
            return null;
        }
        
        $builder = $this->db->table('gametypes');
        $builder->select("IdGameType");
        $builder->where('GameTypeName', $gameModeName);
        
        $result = $builder->get()->getResultObject();
        return $result[0]->IdGameType;
    }
    
}