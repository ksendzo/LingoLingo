<?php
/**
 * Miloš Jovanović 2013/0669
 * Ksenija Bulatović 2019/0730
**/

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AccountStatusModel;
use App\Models\AccountTypeModel;
use App\Models\LanguageModel;
use App\Models\QuestionModel;
use App\Models\PlayedGamesModel;
use App\Models\GameTypeModel;

 
/**
* Player – klasa za Player-ovu stranicu
*
* @version 1.0
*/
class Player extends BaseController
{
    /**
    * dohvatanje svih jezika iz baze
    */
    public function languages() 
    {
        $this->receiveAJAX();

        $model = new LanguageModel();
        $languages = $model->GetLanguageNames();

        $this->sendAJAX(json_encode($languages));
    }

    /**
    * Dohvatanje random pitanja
    */
    public function question() {
        $this->receiveAJAX();

        $language = htmlspecialchars($this->request->getVar('language'), ENT_COMPAT, "UTF-8");

        $languageModel = new LanguageModel();
        $languageId = $languageModel->GetLanguageId($language);

        $questionModel = new QuestionModel();
        $result = $questionModel->getRandomQuestion($languageId);

        $this->sendAJAX($result);

    }

    /**
    * Dohvatanje svih informacija o user-u na osnovu username-a
    */
    public function userInfo(){
        $this->receiveAJAX();

        $username = htmlspecialchars($this->request->getVar('username'), ENT_COMPAT, "UTF-8");

        $userModel = new UserModel();
        $myName = $userModel->getUserFullName($username);
        
        $user = $userModel->getUser($username);
        
        $playedModel = new PlayedGamesModel();
        $myLanguages = $playedModel->getMyLanguages($user->IdUser);
        
        $langModel = new LanguageModel();
        
        $returnList = array();
        foreach($myLanguages as $lang) {
            $name = $langModel->GetLanguageName($lang['IdLanguage']);
            $basic = $playedModel->GetMyBasicScore($user->IdUser, $lang['IdLanguage']);
            if($basic == null) $basic = 0;
            $survival = $playedModel->GetMySurvivalScore($user->IdUser, $lang['IdLanguage']);
            if($survival == null) $survival = 0;
            $returnList[] = array(
                'language'          =>  $name,
                'basic_score'       =>  $basic,
                'survival_score'    =>  $survival,
                'score'             =>  $basic + $survival
            );
        }
        
        
        $res = array(
            'name' => $myName,
            'results' => $returnList
        );

        $this->sendAJAX($res);

    }
    
    /**
    * Dohvatanje svih user-a za high score
    */
    public function userList() {
        $this->receiveAJAX();
        
        $modelUser = new UserModel();
        $users = $modelUser->GetAllPlayers();
        
        $modelGames = new PlayedGamesModel();
        $scores = $modelGames->GetScores();
        
        $result = array();
        
        //for($i = 0; $i < count($users); $i++)
        foreach($users as $user)
        {
            $result[] = array(
                'id'                =>  $user['IdUser'],
                'player'            =>  $user['Username'],
                'basic_score'       =>  0,
                'survival_score'    =>  0
            );
        }
        for($i = 0; $i < count($scores); $i++){
            for($j = 0; $j < count($result); $j++){
                if($result[$j]['id'] == $scores[$i]['IdUser']){
                    if($scores[$i]['IdGameType'] == 1)
                        $result[$j]['basic_score'] = $scores[$i]['PointsScored'];
                    else
                        $result[$j]['survival_score'] = $scores[$i]['PointsScored'];
                }
            }
        }
        
        $this->sendAJAX($result);
    }
    
    /**
    * Čuvanje rezultata nakon uspešno odigrane igre
    */
    public function SaveScore()
    {
        $this->receiveAJAX();
        
        $mode = htmlspecialchars($this->request->getVar('gameMode'), ENT_COMPAT, "UTF-8");
        $score = htmlspecialchars($this->request->getVar('numberOfCorrectAnswers'), ENT_COMPAT, "UTF-8");
        $language = htmlspecialchars($this->request->getVar('language'), ENT_COMPAT, "UTF-8");
        $username = htmlspecialchars($this->request->getVar('username'), ENT_COMPAT, "UTF-8");
        
        $modelPlayedGames = new PlayedGamesModel();
        $modelLanguage = new LanguageModel();
        $modelUser = new UserModel();
        $modelGameType = new GameTypeModel();
        
        $gameModeId = $modelGameType->GetGameModeIdByName($mode);
        $userId = $modelUser->GetUserIdByUsername($username);
        $languageId = $modelLanguage->GetLanguageId($language);
        
        $pointsScored = 0;
        if($mode == GAME_TYPE_BASIC)
        {
            $pointsScored = $score * BASIC_CORRECT_ANSWER_POINTS;
        }
        else if($mode == GAME_TYPE_SURVIVAL)
        {
            $pointsScored = $score * SURVIVAL_CORRECT_ANSWER_POINTS;
        }
        $datePlayed = $this->GetCurrentDateAndTime();
        
        $modelPlayedGames->InsertNewPlayedGame($userId, $gameModeId, $languageId, $datePlayed, $pointsScored);
    }
    
    /**
    * Reportovanje pitanja
    */
    public function report() {
        $this->receiveAJAX();
        $id = $this->request->getVar('idQ');
        
        $model = new QuestionModel();
        $model->SetQuestionFlag($id, '1');
    }
    
}