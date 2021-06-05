<?php namespace App\Models;

 

use CodeIgniter\Model;

 


class PlayedGamesModel extends Model
{
    public function GetScores() {
        $builder = $this->db->table('playedgames');
        
        $builder->select('IdUser, IdGameType, SUM(PointsScored) AS PointsScored');
        $builder->groupBy('IdUser, IdGameType');
    
//        $builder->join('useraccounts', 'if ')
    
        $res = $builder->get()->getResultArray();
        return $res;
    
    }
    
    public function getScoresByLanguage($id) {
        $builder = $this->db->table('playedgames');
        $builder->select('IdGameType, IdLanguage, SUM(PointsScored) AS PointsScored');
        $builder->where('IdUser', $id);
        $builder->groupBy('IdGameType, IdLanguage');
        
        $res = $builder->get()->getResultObject();
        return $res;
        
    }
    
    public function getMyLanguages($id) {
        $builder = $this->db->table('playedgames');
//        $builder->select('IdLanguage');
        $builder->select('IdLanguage');
        $builder->where('IdUser', $id);
        $builder->groupBy('IdLanguage');
        $res = $builder->get()->getResultArray();
        return $res;
    }
   
    public function GetMyBasicScore($id, $lang) {
        $builder = $this->db->table('playedgames');
        $builder->select('SUM(PointsScored) AS Basic');
        $builder->where('IdUser', $id);
        $builder->where('IdLanguage', $lang);
        $builder->where('IdGameType', 1);
//        $builder->groupBy('')
        
        $res = $builder->get()->getResultObject();
        return $res[0]->Basic;           
    }
    
     public function GetMySurvivalScore($id, $lang) {
        $builder = $this->db->table('playedgames');
        $builder->select('SUM(PointsScored) AS Survival');
        $builder->where('IdUser', $id);
        $builder->where('IdLanguage', $lang);
        $builder->where('IdGameType', 2);
        
        $res = $builder->get()->getResultObject();
        return $res[0]->Survival;           
    }
  
    
    public function InsertNewPlayedGame($IdUser, $IdGameType, $IdLanguage, $PlayDate, $PointsScored)
    {
        $newGame = [
            'IdUser' => $IdUser,
            'IdGameType'  => $IdGameType,
            'IdLanguage'  => $IdLanguage,
            'PlayDate'  => $PlayDate,
            'PointsScored'     => $PointsScored
        ];

        $query = $this->db->table('playedgames');
        $query->insert($newGame);
    }
}