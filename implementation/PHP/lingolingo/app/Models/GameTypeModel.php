<?php 
namespace App\Models;


use CodeIgniter\Model;

 


class GameTypeModel extends Model
{
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