<?php

class MainController extends BaseController {

    public static function login() {
        View::make('questionnairewebpages/login.html');
    }

    public static function overview() {
        View::make('questionnairewebpages/overview.html');
    }

    public static function query() {
        View::make('questionnairewebpages/query.html');
    }
    
    public static function edit() {
        View::make('questionnairewebpages/edit.html');
    }
    
    public static function remove() {
        View::make('questionnairewebpages/remove.html');
    }
    
    public static function add() {
        View::make('questionnairewebpages/add.html');
    }

    public static function sandbox() {
        // Testaa koodiasi täällä
        $hedelmatehdas = new QuestionDataModel(array(
        'questionnaire_name' => '',
        'project_start' => '1.4.2017',
        'vat_number' => '0987654-3'
        ));
	
	$errors = $hedelmatehdas->errors();
	
	Kint::dump($errors);

    }

}
