<?php 
/**
 * Miloš Jovanović 2013/0669
 * Ksenija Bulatović 2019/0730
**/

namespace App\Models;

use CodeIgniter\Model;

/**
* PlayedGamesModel – klasa za komunikaciju sa tabelom 'playedgames' iz baze
*
* @version 1.0
*/
class PlayedGamesModel extends Model
{
    /**
    * GetScores funkcija koja dohvata listu rezultata grupisanu po IdUser i IdGameType
    *
    * @return res
    *
    */
    public function GetScores() {
        $builder = $this->db->table('playedgames');
        $builder->select('IdUser, IdGameType, SUM(PointsScored) AS PointsScored');
        $builder->groupBy('IdUser, IdGameType');
    
        $res = $builder->get()->getResultArray();
        return $res;
    
    }
    
    /**
    * GetScores funkcija koja dohvata listu rezultata grupisanu po IdUser i IdGameType 
     * za konkretnog korisnika na osnovu id-a
     * 
     * @param $id id
    *
    * @return res
    *
    */
    public function getScoresByLanguage($id) {
        $builder = $this->db->table('playedgames');
        $builder->select('IdGameType, IdLanguage, SUM(PointsScored) AS PointsScored');
        $builder->where('IdUser', $id);
        $builder->groupBy('IdGameType, IdLanguage');
        
        $res = $builder->get()->getResultObject();
        return $res;
        
    }
    
    /**
    * getMyLanguages funkcija koja dohvata listu svih jezika koje  je neki korisnik igrao (na osnovu id-a
    *
     * @param $id id
     * 
    * @return res
    *
    */
    public function getMyLanguages($id) {
        $builder = $this->db->table('playedgames');
        $builder->select('IdLanguage');
        $builder->where('IdUser', $id);
        $builder->groupBy('IdLanguage');
        $res = $builder->get()->getResultArray();
        return $res;
    }
   
    /**
    * GetMyBasicScore funkcija koja dohvata Basic rezultat za datog korisnika sa zadatim id-om i jezikom
    * 
    * @param $id id
    * @param $lang id jezika
    *
    * @return res
    *
    */
    public function GetMyBasicScore($id, $lang) {
        $builder = $this->db->table('playedgames');
        $builder->select('SUM(PointsScored) AS Basic');
        $builder->where('IdUser', $id);
        $builder->where('IdLanguage', $lang);
        $builder->where('IdGameType', 1);
        
        $res = $builder->get()->getResultObject();
        return $res[0]->Basic;           
    }
    
    /**
    * GetMySurvivalScore funkcija koja dohvata Survival rezultat za datog korisnika sa zadatim id-om i jezikom
    * 
    * @param $id id
    * @param $lang id jezika
    *
    * @return res
    *
    */
    public function GetMySurvivalScore($id, $lang) {
        $builder = $this->db->table('playedgames');
        $builder->select('SUM(PointsScored) AS Survival');
        $builder->where('IdUser', $id);
        $builder->where('IdLanguage', $lang);
        $builder->where('IdGameType', 2);
        
        $res = $builder->get()->getResultObject();
        return $res[0]->Survival;           
    }
  
    /**
    * GetMySurvivalScore funkcija koja dohvata Survival rezultat za datog korisnika sa zadatim id-om i jezikom
    * 
    * @param $idUser
    * @param $IdGameType
    * @param $IdLanguage
    * @param $PlayDate 
    * @param $PointsScored $name Description
    *
    */
   
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