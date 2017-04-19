<?php

class QuestionDataModel extends BaseModel {

    public $project_start, $questionnaire_name, $customer_company, $vat_number, $questions_answers_id, $questionnaire_id, $question, $qid, $answer, $validators;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_qid', 'validate_question', 'validate_answer'); //Add more with a comma
    }
    
    public function getAttributes() {
		
		$attributes = array('questionnaire_id' => $this->questionnaire_id,
							'question' => $this->question, 
							'qid' => $this->qid, 
							'answer' => $this->answer);
        
        return $attributes;
		
	}
    
    public function save(){
		$query = DB::connection()->prepare('INSERT INTO questions_answers (questionnaire_id, question, qid, answer) VALUES (:questionnaire_id, :question, :qid, :answer) RETURNING questions_answers_id');
		$query->execute(array('questionnaire_id' => $this->questionnaire_id, 
							  'question' => $this->question, 
							  'qid' => $this->qid, 
							  'answer' => $this->answer));
		
		$row = $query->fetch();
		$this->questions_answers_id = $row['questions_answers_id'];
	
	}
	
	public function update($id){
		$query = DB::connection()->prepare('UPDATE questions_answers SET questionnaire_id = :questionnaire_id, question = :question, qid = :qid, answer = :answer WHERE questions_answers_id = :questions_answers_id');
		$query->execute(array('questionnaire_id' => $this->questionnaire_id, 
							  'question' => $this->question, 
							  'qid' => $this->qid, 
							  'answer' => $this->answer, 
							  'questions_answers_id' => $id
							  ));
		$query->fetch();
	}
	
	public function remove(){
		$query = DB::connection()->prepare('DELETE FROM questions_answers WHERE questions_answers_id = :questions_answers_id');
		$query->execute(array('questions_answers_id' => $this->questions_answers_id));
		$query->fetch();
	}

    public static function getAllData() {

        $query = DB::connection()->prepare('SELECT * FROM questions_answers LEFT JOIN questionnaire ON questions_answers.questionnaire_id = questionnaire.questionnaire_id');
        $query->execute();
        $rows = $query->fetchAll();
        $data = array();

        foreach ($rows as $row) {
            $data[] = new QuestionDataModel(array(
                'questions_answers_id' => $row['questions_answers_id'],
                'project_start' => $row['project_start'],
                'questionnaire_id' => $row['questionnaire_id'],
                'questionnaire_name' => $row['questionnaire_name'],
                'customer_company' => $row['customer_company'],
                'vat_number' => $row['vat_number'],
                'question' => $row['question'],
                'qid' => $row['qid'],
                'answer' => $row['answer']
            ));
        }

        return $data;
    }

    public static function findQuestionnaire($questionnaire_id) {

        $query = DB::connection()->prepare('SELECT * FROM questions_answers LEFT JOIN questionnaire ON questions_answers.questionnaire_id = questionnaire.questionnaire_id WHERE questions_answers.questionnaire_id = :questionnaire_id');
        $query->execute(array('questionnaire_id' => $questionnaire_id));
        $rows = $query->fetchAll();
        $data = array();

        foreach ($rows as $row) {
            $data[] = new QuestionDataModel(array(
                'questions_answers_id' => $row['questions_answers_id'],
                'project_start' => $row['project_start'],
                'questionnaire_id' => $row['questionnaire_id'],
                'questionnaire_name' => $row['questionnaire_name'],
                'customer_company' => $row['customer_company'],
                'vat_number' => $row['vat_number'],
                'question' => $row['question'],
                'qid' => $row['qid'],
                'answer' => $row['answer']
            ));
        }
        
        return $data;

    }

    public static function findqid($qid) {

        $query = DB::connection()->prepare('SELECT * FROM questions_answers WHERE qid = :qid');
        $query->execute(array('qid' => $qid));
        $rows = $query->fetchAll();
        $data = array();

        foreach ($rows as $row) {
            $data[] = new QuestionDataModel(array(
                'questions_answers_id' => $row['questions_answers_id'],
                'questionnaire_id' => $row['questionnaire_id'],
                'question' => $row['question'],
                'qid' => $row['qid'],
                'answer' => $row['answer']
            ));

            return $data;
        }

        return null;
    }
    
    
    //Under construction
    public static function findAttributesByQuestionDataID($id) {

        $query = DB::connection()->prepare('SELECT * FROM questions_answers WHERE questions_answers_id = :questions_answers_id');
        $query->execute(array('questions_answers_id' => $id));
        $row = $query->fetchAll();

		return $row;
        
    }
     
    //Validators below
    
    public function validate_questionnaire_name(){
    
    	return parent::validate_string_length($this->questionnaire_name, 1, 40, 'Questionnaire name');
    
    }
    
    public function validate_project_start(){
    
    	$errors = array();
    	$datepattern = '/^((19|20)?\d\d)-' . 
    	               '((0?[1-9])|(1[0-2]))-' .
    	               '((0?[1-9])|([1-2][0-9])|(3[0-1]))$/i';
    
    	if (preg_match($datepattern, $this->project_start) == 0) {
    	
    		$errors[] = 'Date: Project start date does not match correct form. Write in form dd-mm-yy';
    	
    	} 
    
  	return $errors;
    }    
    
    
    public function validate_customer_company(){
    
  	return parent::validate_string_length($this->customer_company, 1, 40, 'Customer company');
    
    }
    
    public function validate_vat_number(){
    
    	$errors = array();
    	$vatpattern = '/^\d{7}-\d$/i';
    
    	if (preg_match($vatpattern, $this->vat_number) == 0) {
    	
    		$errors[] = 'Vat number: Does not match correct form. Check that it matches the form 1234567-8. Make sure there are no extra spaces before or after the number.';
    	
    	} 
    
  	return $errors;
    
    }
    
    public function validate_qid(){
    
  	return parent::validate_string_length($this->qid, 1, 30, 'qid');
    
    }
    
    public function validate_question(){
    
  	return parent::validate_string_length($this->question, 1, 50, 'Question');
    
    }
    
    public function validate_answer(){
    
  	return parent::validate_string_length($this->answer, 1, 40, 'Answer');
    
    }
    
    
    
    
}
