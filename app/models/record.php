<?php

class Record extends BaseModel {
    
    public $questiondata_id, $project_start, $questionnaire_name, $customer_company, $vat_numeber, $question, $qid, $answer;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
    }
    
    public static function getAllData() {
        
        $query = DB::connection()->prepare('SELECT * FROM questiondata');
        $query->execute();
        $rows=$query->fetchAll();
        $data = array();
        
        foreach($rows as $row) {
            $data[] = new Record(array(
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
        
        $query = DB::connection()->prepare('SELECT * FROM questiondata WHERE questionnaire_name = :questionnaire_name LIMIT 3');
        $query->execute(array('questionnaire_name' => $questionnaire_name));
        $rows = $query->fetchAll();
        $data = array();
        
        foreach ($rows as $row) {
          $data[] = new Record(array(
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
    
    public static function findqid($qid) {
        
        $query = DB::connection()->prepare('SELECT * FROM questiondata WHERE qid = :qid');
        $query->execute(array('qid' => $qid));
        $rows = $query->fetchAll();
        $data = array();
        
        foreach ($rows as $row) {
          $data[] = new Record(array(
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
    
}



