<?php

/*
 * ViewController is concerned with showing webpages
 */

class ViewController extends BaseController {

    public static function overview() {
        self::check_logged_in();
        $data = QuestionDataModel::getAllData();
        View::make('questionnairedataviews/overview.html', array('data' => $data, 'title' => ' Overview af all data'));
    }

    public static function questionnaires() {
        self::check_logged_in();
        $data = QuestionDataModel::getAllQuestionnaires();
        View::make('questionnairedataviews/questionnaires.html', array('data' => $data));
    }

    public static function show($questionnaire_id) {
        self::check_logged_in();
        $data = QuestionDataModel::findQuestionnaire($questionnaire_id);
        if (empty($data)) {
            $data = QuestionDataModel::getAllQuestionnaires();
            View::make('questionnairedataviews/questionnaires.html', array('data' => $data, 'error' => 'No data to show for this questionnaire!'));
        }
        $title = $data[0]->questionnaire_name;
        View::make('questionnairedataviews/overview.html', array('data' => $data, 'title' => $title));
    }

    public static function query() {
        self::check_logged_in();
        View::make('questionnairedataviews/query.html');
    }

    public static function insertoverview1() {
        self::check_logged_in();
        View::make('questionnairedataviews/addquestionnaire.html');
    }

    public static function insertoverview2() {
        self::check_logged_in();
        $data = QuestionDataModel::getAllQuestionnaires();
        View::make('questionnairedataviews/addquestionsanswers.html', array('data' => $data));
    }

    public static function viewedit() {
        self::check_logged_in();
        $data = QuestionDataModel::getAllQuestionnaires();
        View::make('questionnairedataviews/viewedit.html', array('data' => $data));
    }

    public static function edit($id) {
        self::check_logged_in();
        $attributes = QuestionnaireModel::findAttributesByQuestionnaireID($id);
        View::make('questionnairedataviews/edit.html', array('attributes' => $attributes[0]));
    }
    
        public static function viewremovequestionnaire() {
        self::check_logged_in();
        $data = QuestionDataModel::getAllQuestionnaires();
        $headings = array('Questionnaire ID', 'Questionnaire Name', 'Date', 'Company', 'VAT number', 'Remove');
        View::make('questionnairedataviews/viewremovequestionnaire.html', array('data' => $data, 'headings' => $headings));
    }
    
        public static function viewremoveanswer($questionnaire_id) {
        self::check_logged_in();
        $data = QuestionDataModel::findQuestionnaire($questionnaire_id);
        if (empty($data)) {
            $data = QuestionDataModel::getAllQuestionnaires();
            View::make('questionnairedataviews/viewremovequestionnaire.html', array('data' => $data, 'error' => 'No data to show for this questionnaire!'));
        }
        $title = $data[0]->questionnaire_name;
        View::make('questionnairedataviews/viewremoveanswer.html', array('data' => $data, 'title' => $title));
    }

}
