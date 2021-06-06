<?php 
namespace App\Models;

use CodeIgniter\Model;

class QuestionModel extends Model
{
    public function NewQuestion($languageId, $authorId, $question, $answer)
    {
        $builder = $this->db->table('questions');
        
        $data = array(
            'IdLanguage'   =>  $languageId,
            'IdAuthor'      =>  $authorId,
            'QuestionText' =>  $question,
            'AnswerText'   =>  $answer, 
            'IsFlagged'    => 0
        );
        
        $builder->insert($data);
        
        return true;
    }
    
    public function getRandomQuestion($id){
        $builder = $this->db->table('questions');
        $builder->select("*");
        $builder->where("IdLanguage", $id);
        $builder->orderBy('IdQuestion', 'RANDOM');
        
        $result = $builder->get()->getResult();
        
        return $result[0];        
    }
    
    public function GetAllQuestions() {
        $builder = $this->db->table('questions');
        $builder->select('*');
        $builder->orderBy('IdQuestion', 'DESC');
        
        $result = $builder->get()->getResult();
        return $result;
    }
    
    public function GetAllFlaggedQuestions() 
    {
        $builder = $this->db->table('questions');
        $builder->select('*');
        $builder->where('IsFlagged', '1');
        
        $result = $builder->get()->getResult();
        return $result;
    }
    
    public function DeleteQuestion($id)
    {
        $builder = $this->db->table('questions');
        $builder->where('IdQuestion', $id);
        $builder->delete();
//        $builder->delete(array('IdQuestions' => $id));
    }
    
    public function ModifyQuestion($id, $question, $answer)
    {
        $builder = $this->db->table('questions');
        $builder->where('IdQuestion', $id);
        $builder->set('QuestionText', $question);
        $builder->set('AnswerText', $answer);
        $builder->update();
    }
    
    public function GetQuestionFlag($idQuestion)
    {
        $builder = $this->db->table('questions');
        $builder->select('IsFlagged');
        $builder->where('IdQuestion', $idQuestion);
        
        $result = $builder->get()->getResult()[0]->IsFlagged + 0; // + 0 to convert to int
        return $result;
    }
    
    public function SetQuestionFlag($idQuestion, $flag)
    {
        $builder = $this->db->table('questions');
        $builder->where('IdQuestion', $idQuestion);
        $builder->set('IsFlagged', $flag);
        $builder->update();
    }
}