<?php

class QuestionDataModel extends BaseModel {

    public $questiondata_id, $project_start, $questionnaire_name, $customer_company, $vat_number, $question, $qid, $answer, $validators;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_questionnaire_name', 'validate_customer_company', 'validate_qid', 'validate_question', 'validate_answer', ); //Add more with a comma
    }
    
    public function save(){
		$query = DB::connection()->prepare('INSERT INTO questiondata (questionnaire_name, project_start, customer_company, vat_number, question, qid, answer) VALUES (:questionnaire_name, :project_start, :customer_company, :vat_number, :question, :qid, :answer) RETURNING questiondata_id');
		$query->execute(array('questionnaire_name' => $this->questionnaire_name, 'project_start' => $this->project_start, 'customer_company' => $this->customer_company, 'vat_number' => $this->vat_number, 'question' => $this->question, 'qid' => $this->qid, 'answer' => $this->answer));
		
		$row = $query->fetch();
		$this->questiondata_id = $row['questiondata_id'];
	
	}

    public static function getAllData() {

        $query = DB::connection()->prepare('SELECT * FROM questiondata');
        $query->execute();
        $rows = $query->fetchAll();
        $data = array();

        foreach ($rows as $row) {
            $data[] = new Datacruncher(array(
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
            $data[] = new Datacruncher(array(
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
            $data[] = new Datacruncher(array(
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
    
    public function validate_questionnaire_name(){
    
    	return parent::validate_string_length($this->questionnaire_name, 1, 40, 'Questionnaire name');
    
    }
    
    public function validate_customer_company(){
    
  	return parent::validate_string_length($this->customer_company, 1, 40, 'Customer company');
    
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
