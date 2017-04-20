<?php

class DataController extends BaseController {
    
    public static function overview(){
		self::check_logged_in();
		
        $data = QuestionDataModel::getAllData();
        View::make('questionnairewebpages/overview.html', array('data' => $data));
    }
    
    public static function show($questionnaire_name){
		self::check_logged_in();
		
        $data = QuestionDataModel::findQuestionnaire($questionnaire_name);
        View::make('questionnairewebpages/overview.html', array('data' => $data));
    }
    
    public static function insertdata() {
		self::check_logged_in();
		
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
    
    public static function editoverview(){
		self::check_logged_in();
		
        $data = QuestionDataModel::getAllData();
        View::make('questionnairewebpages/editoverview.html', array('data' => $data));
    }
    
    public static function edit($id) {
	
		$attributes = QuestionDataModel::findAttributesByQuestionDataID($id);
		View::make('questionnairewebpages/edit.html', array('attributes' => $attributes[0]));

	}
	
	public static function update($id) {
		self::check_logged_in();
		
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
        
        	$datarow->update($id);
        	Redirect::to('/overview', array('message' => 'Data added to database!'));
        	
        } else {
        
        	View::make('questionnairewebpages/add.html', array('errors' => $errors, 'attributes' => $attributes));
        
        }
	}
	
	public static function removeoverview(){
		self::check_logged_in();
		
		$data = QuestionDataModel::getAllData();
        View::make('questionnairewebpages/removeoverview.html', array('data' => $data));
	}
	
	public static function remove($id) {
		self::check_logged_in();
		
		$datarow = new QuestionDataModel(array('questiondata_id' => $id));
		$datarow -> remove();
		
		Redirect::to('/overview', array('message' => 'Rivi poistettu onnistuneesti!'));
		
	}
}


