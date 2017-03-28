<?php

class DataController extends BaseController {
    
    public static function overview(){
        $data = Datacruncher::getAllData();
        View::make('questionnairewebpages/overview.html', array('data' => $data));
    }
    
    public static function show($questionnaire_name){
        $data = Datacruncher::findQuestionnaire($questionnaire_name);
        View::make('questionnairewebpages/overview.html', array('data' => $data));
    }
    
    
}


