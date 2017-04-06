<?php

class MainController extends BaseController {

    public static function login() {
        View::make('questionnairewebpages/login.html');
    }

    public static function overview() {
		self::check_logged_in();
        View::make('questionnairewebpages/overview.html');
    }

    public static function query() {
		self::check_logged_in();
        View::make('questionnairewebpages/query.html');
    }
    
    public static function edit() {
		self::check_logged_in();
        View::make('questionnairewebpages/edit.html');
    }
    
    public static function remove() {
		self::check_logged_in();
        View::make('questionnairewebpages/remove.html');
    }
    
    public static function add() {
		self::check_logged_in();
        View::make('questionnairewebpages/add.html');
    }

    public static function sandbox() {
		self::check_logged_in();
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
