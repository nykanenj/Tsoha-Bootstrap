<?php

class QuestionDataModel extends BaseModel {

    public $questiondata_id, $project_start, $questionnaire_name, $customer_company, $vat_number, $question, $qid, $answer, $validators;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_questionnaire_name', 'validate_project_start', 'validate_customer_company', 'validate_vat_number', 'validate_qid', 'validate_question', 'validate_answer', ); //Add more with a comma
    }
    
    public function getAttributes() {
		
		$attributes = array('questionnaire_name' => $this->questionnaire_name, 
		                    'project_start' => $this->project_start, 
							'customer_company' => $this->customer_company, 
							'vat_number' => $this->vat_number, 
							'question' => $this->question, 
							'qid' => $this->qid, 
							'answer' => $this->answer);
        
        return $attributes;
		
	}
    
    public function save(){
		$query = DB::connection()->prepare('INSERT INTO questiondata (questionnaire_name, project_start, customer_company, vat_number, question, qid, answer) VALUES (:questionnaire_name, :project_start, :customer_company, :vat_number, :question, :qid, :answer) RETURNING questiondata_id');
		$query->execute(array('questionnaire_name' => $this->questionnaire_name, 
		                      'project_start' => $this->project_start, 
							  'customer_company' => $this->customer_company, 
							  'vat_number' => $this->vat_number, 
							  'question' => $this->question, 
							  'qid' => $this->qid, 
							  'answer' => $this->answer));
		
		$row = $query->fetch();
		$this->questiondata_id = $row['questiondata_id'];
	
	}
	
	public function update($id){
		$query = DB::connection()->prepare('UPDATE questiondata SET questionnaire_name = :questionnaire_name, project_start = :project_start, customer_company = :customer_company, vat_number = :vat_number, question = :question, qid = :qid, answer = :answer WHERE questiondata_id = :questiondata_id');
		$query->execute(array('questionnaire_name' => $this->questionnaire_name, 
							  'project_start' => $this->project_start, 
							  'customer_company' => $this->customer_company, 
							  'vat_number' => $this->vat_number, 
							  'question' => $this->question, 
							  'qid' => $this->qid, 
							  'answer' => $this->answer, 
							  'questiondata_id' => $id
							  ));
		$query->fetch();
	}
	
	public function remove(){
		$query = DB::connection()->prepare('DELETE FROM questiondata WHERE questiondata_id = :questiondata_id');
		$query->execute(array('questiondata_id' => $this->questiondata_id));
		$query->fetch();
	}

    public static function getAllData() {

        $query = DB::connection()->prepare('SELECT * FROM questiondata');
        $query->execute();
        $rows = $query->fetchAll();
        $data = array();

        foreach ($rows as $row) {
            $data[] = new QuestionDataModel(array(
                'questiondata_id' => $row['questiondata_id'],
                'project_start' => $row['project_start'],
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

    public static function findQuestionnaire($questionnaire_name) {

        $query = DB::connection()->prepare('SELECT * FROM questiondata WHERE questionnaire_name = :questionnaire_name');
        $query->execute(array('questionnaire_name' => $questionnaire_name));
        $rows = $query->fetchAll();
        $data = array();

        foreach ($rows as $row) {
            $data[] = new QuestionDataModel(array(
                'questiondata_id' => $row['questiondata_id'],
                'project_start' => $row['project_start'],
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

        $query = DB::connection()->prepare('SELECT * FROM questiondata WHERE qid = :qid');
        $query->execute(array('qid' => $qid));
        $rows = $query->fetchAll();
        $data = array();

        foreach ($rows as $row) {
            $data[] = new QuestionDataModel(array(
                'questiondata_id' => $row['questiondata_id'],
                'project_start' => $row['project_start'],
                'questionnaire_name' => $row['questionnaire_name'],
                'customer_company' => $row['customer_company'],
                'vat_number' => $row['vat_number'],
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

        $query = DB::connection()->prepare('SELECT * FROM questiondata WHERE questiondata_id = :questiondata_id');
        $query->execute(array('questiondata_id' => $id));
        $row = $query->fetchAll();
        
  //      $attributes = array(
    //            'project_start' => $row['project_start'],
      //          'questionnaire_name' => $row['questionnaire_name'],
        //        'customer_company' => $row['customer_company'],
          //      'vat_number' => $row['vat_number'],
            //    'question' => $row['question'],
              //  'qid' => $row['qid'],
                //'answer' => $row['answer']
				//);

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
