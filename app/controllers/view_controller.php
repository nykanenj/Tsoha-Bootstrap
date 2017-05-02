<?php

/*
 * ViewController is concerned with showing webpages
 */

class ViewController extends BaseController {

    public static function overview() {
        self::check_logged_in();
        $data = QuestionDataModel::getAllData();
        View::make('questionnairedataviews/overview.html', array('data' => $data, 'title' => ' Overview of all data'));
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
        Kint::dump($data);
        $title = $data[0]->questionnaire_name;
        View::make('questionnairedataviews/questionnaire.html', array('data' => $data, 'title' => $title));
    }

    public static function addquestionnaire() {
        self::check_logged_in();
        View::make('questionnairedataviews/addquestionnaire.html');
    }

    public static function addquestionsanswers() {
        self::check_logged_in();
        $data = QuestionDataModel::getAllQuestionnaires();
        View::make('questionnairedataviews/addquestionsanswers.html', array('data' => $data));
    }
    
    public static function addrespondent() {
        self::check_logged_in();
        View::make('questionnairedataviews/addrespondent.html');
        
    }

    public static function editquestionnaire($id) {
        self::check_logged_in();
        $attributes = QuestionnaireModel::findAttributesByQuestionnaireID($id);
        View::make('questionnairedataviews/editquestionnaire.html', array('attributes' => $attributes[0]));
    }

    public static function editanswer($id) {
        self::check_logged_in();
        $attributes = QuestionsAnswersModel::findAttributesByQuestionsAnswersID($id);
        $data = QuestionDataModel::getAllQuestionnaires();
        View::make('questionnairedataviews/editanswer.html', array('attributes' => $attributes[0], 'data' => $data));
    }

}
