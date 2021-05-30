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
        $builder->orderBy('id', 'RANDOM');
        
        $result = $builder->get()->getResult();
        
        return $result[0];        
    }
    
    public function GetAllQuestions() {
        $builder = $this->db->table('questions');
        $builder->select('*');
        
        $result = $builder->get()->getResult();
        return $result;
    }
    
}