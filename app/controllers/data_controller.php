<?php

class DataController extends BaseController {
    
    public static function overview(){
        $data = QuestionDataModel::getAllData();
        View::make('questionnairewebpages/overview.html', array('data' => $data));
    }
    
    public static function show($questionnaire_name){
        $data = QuestionDataModel::findQuestionnaire($questionnaire_name);
        View::make('questionnairewebpages/overview.html', array('data' => $data));
    }
    
    public static function insertdata() {
        $params = $_POST;
        
        $attributes = array(
        'questionnaire_name' => $params['questionnaire_name'],
        'project_start' => $params['project_start'],
        'customer_company' => $params['customer_company'],
        'vat_number' => $params['vat_number'],
        'question' => $params['question'],
        'qid' => $params['qid'],
        'answer' => $params['answer']
        );
        
        $datarow = new QuestionDataModel($attributes);
        $errors = $datarow->errors();
        
        if(count($errors) == 0){
        
        	$datarow->save();
        	Redirect::to('/overview', array('message' => 'Data added to database!'));
        	
        } else {
        
        	View::make('questionnairewebpages/add.html', array('errors' => $errors, 'attributes' => $attributes));
        
        }
         
    }
}


