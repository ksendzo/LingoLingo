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

 
/**
* Professor – klasa za Professor-ovu stranicu
*
* @version 1.0
*/
class Professor extends BaseController
{
    /**
    * Dohvatanje svih jezika iz baze
    */
    public function languages() 
    {
        $this->receiveAJAX();

        $model = new LanguageModel();
        $languages = $model->GetLanguageNames();

        $this->sendAJAX(json_encode($languages));
    }
    
    /**
    * Dodavanje novog pitanja u bazu
    */
    public function newQuestion() {
        $this->receiveAJAX();
        $question = htmlspecialchars($this->request->getVar('question'), ENT_COMPAT, "UTF-8");
        $answer = htmlspecialchars($this->request->getVar('answer'), ENT_COMPAT, "UTF-8");
        $languageName = htmlspecialchars($this->request->getVar('language'), ENT_COMPAT, "UTF-8");
        $username = htmlspecialchars($this->request->getVar('professor'), ENT_COMPAT, "UTF-8");

        $languageModel = new LanguageModel();
        $languageId = $languageModel->GetLanguageId($languageName);

        $userModel = new UserModel();
        $authorId = $userModel->GetUserId($username);

        $model = new QuestionModel();
        $model->NewQuestion($languageId, $authorId, $question, $answer);

    }
    
    /**
    * Dohvatanje liste svih pitanja
    */
    public function questions(){
        $this->receiveAJAX();
        
        $model = new QuestionModel();
        $questions = $model->GetAllQuestions();
        
        $languageModel = new LanguageModel();
        
        $data;
        
        for($i = 0; $i < count($questions); $i++){
            $data[$i] =  array(
                'IdQuestion'=> $questions[$i]->IdQuestion,
                'language'  => $languageModel->GetLanguageName($questions[$i]->IdLanguage),
                'question'  =>  $questions[$i]->QuestionText,
                'answer'    =>  $questions[$i]->AnswerText,
                'flag'      =>  $questions[$i]->IsFlagged
            );
        }
        
        $this->sendAJAX($data);
        
    }
    
    /**
    * Izmena već postojećeg pitanja
    */
    public function ModifyQuestion()
    {
        $this->receiveAJAX();
        
        $modifiedQuestion = htmlspecialchars($this->request->getVar('modifiedQuestion'), ENT_COMPAT, "UTF-8");
        $modifiedAnswer = htmlspecialchars($this->request->getVar('modifiedAnswer'));
        $modifiedQuestionId = htmlspecialchars($this->request->getVar('modifiedQuestionId'), ENT_COMPAT, "UTF-8");
        
        $questionModel = new QuestionModel();
        $questionModel->ModifyQuestion($modifiedQuestionId, $modifiedQuestion, $modifiedAnswer);
    }
    
    /**
    * Brisanje pitanja iz baze
    */
    public function DeleteQuestion()
    {
        $this->receiveAJAX();
        
        $idQuestionToBeDeleted = $this->request->getVar('IdQuestion', FILTER_SANITIZE_STRING);
        
        $questionModel = new QuestionModel();
        $questionModel->DeleteQuestion($idQuestionToBeDeleted);
    }
    
    /**
    * Izmena flag-a na pitanju
    */
    public function ModifyFlag()
    {
        $this->receiveAJAX();
        
        $idQuestion = $this->request->getVar('IdQuestion', FILTER_SANITIZE_STRING);
        
        $questionModel = new QuestionModel();
        $newQuestionFlag = FLAG_TYPE_FLAGGED;
        $oldQuestionFlag = $questionModel->GetQuestionFlag($idQuestion);
        if($oldQuestionFlag > 0)
        {
            $newQuestionFlag = FLAG_TYPE_NOT_FLAGGED;
        }
        
        $questionModel->SetQuestionFlag($idQuestion, $newQuestionFlag);
        
        $dataToSend = json_encode($newQuestionFlag);
        
        $this->sendAJAX($newQuestionFlag);
    }
}