<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AccountStatusModel;
use App\Models\AccountTypeModel;
use App\Models\LanguageModel;
use App\Models\QuestionModel;

 

class Professor extends BaseController
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
    
    public function ModifyQuestion()
    {
        $this->receiveAJAX();
        
        $modifiedQuestion = $this->request->getVar('modifiedQuestion', FILTER_SANITIZE_STRING);
        $modifiedAnswer = $this->request->getVar('modifiedAnswer', FILTER_SANITIZE_STRING);
        $modifiedQuestionId = $this->request->getVar('modifiedQuestionId', FILTER_SANITIZE_STRING);
        
        $questionModel = new QuestionModel();
        $questionModel->ModifyQuestion($modifiedQuestionId, $modifiedQuestion, $modifiedAnswer);
    }
    
    public function DeleteQuestion()
    {
        $this->receiveAJAX();
        
        $idQuestionToBeDeleted = $this->request->getVar('IdQuestion', FILTER_SANITIZE_STRING);
        
        $questionModel = new QuestionModel();
        $questionModel->DeleteQuestion($idQuestionToBeDeleted);
    }
    
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