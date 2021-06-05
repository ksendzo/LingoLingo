<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AccountStatusModel;
use App\Models\AccountTypeModel;
use App\Models\LanguageModel;
use App\Models\QuestionModel;
use App\Models\PlayedGamesModel;
use App\Models\GameTypeModel;

 

class Player extends BaseController
{
    public function languages() 
    {
        $this->receiveAJAX();

        $model = new LanguageModel();
        $languages = $model->GetLanguageNames();

        $this->sendAJAX(json_encode($languages));
    }
    
    public function newQuestion() {
        $this->receiveAJAX();
        $question = $this->request->getVar('question', FILTER_SANITIZE_STRING);
        $answer = $this->request->getVar('answer', FILTER_SANITIZE_STRING);
        $languageName = $this->request->getVar('language', FILTER_SANITIZE_STRING);
        $username = $this->request->getVar('professor', FILTER_SANITIZE_STRING);

        $languageModel = new LanguageModel();
        $languageId = $languageModel->GetLanguageId($languageName);

        $userModel = new UserModel();
        $authorId = $userModel->GetUserId($username);

        $model = new QuestionModel();
        $model->NewQuestion($languageId, $authorId, $question, $answer);

    }

    public function question() {
        $this->receiveAJAX();

        $language = $this->request->getVar('language', FILTER_SANITIZE_STRING);

        $languageModel = new LanguageModel();
        $languageId = $languageModel->GetLanguageId($language);

        $questionModel = new QuestionModel();
        $result = $questionModel->getRandomQuestion($languageId);

        $this->sendAJAX($result);

    }

    public function userInfo(){
        $this->receiveAJAX();

        $username = $this->request->getVar('username', FILTER_SANITIZE_STRING);

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
        
        
    public function questions(){
        $this->receiveAJAX();
        
        $model = new QuestionModel();
        $questions = $model->GetAllQuestions();
        
        $languageModel = new LanguageModel();
        
        $data;
        
        for($i = 0; $i < count($questions); $i++){
            $data[$i] =  array(
                'language'  => $languageModel->GetLanguageName($questions[$i]->IdLanguage),
                'question'  =>  $questions[$i]->QuestionText,
                'answer'    =>  $questions[$i]->AnswerText,
                'flag'      =>  $questions[$i]->IsFlagged
            );
        }
        
        $this->sendAJAX($data);
        
    }
    
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
    
    public function SaveScore()
    {
        $this->receiveAJAX();
        
        $mode = $this->request->getVar('gameMode');
        $score = $this->request->getVar('numberOfCorrectAnswers');
        $language = $this->request->getVar('language');
        $username = $this->request->getVar('username');
        
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
    
    public function report() {
        $this->receiveAJAX();
        $id = $this->request->getVar('idQ');
        
        $model = new QuestionModel();
        $model->SetQuestionFlag($id, '1');
    }
    
}