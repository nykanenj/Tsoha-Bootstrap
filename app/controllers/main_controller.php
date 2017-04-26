<?php

class MainController extends BaseController {

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
        View::make('questionnairedataviews/addquestionsanswers.html');
    }

    public static function insertquestionnaire() {
        self::check_logged_in();

        $params = $_POST;
        $attributes = array(
            'questionnaire_name' => $params['questionnaire_name'],
            'project_start' => $params['project_start'],
            'customer_company' => $params['customer_company'],
            'vat_number' => $params['vat_number']
        );

        $newquestionnaire = new QuestionnaireModel($attributes);
        $errors = $newquestionnaire->errors();

        if (count($errors) == 0) {
            $newquestionnaire->savequestionnaire();
            Redirect::to('/overview', array('message' => 'Data added to database!'));
        } else {
            View::make('questionnairedataviews/addquestionnaire.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

    public static function insertquestionsanswers() {
        self::check_logged_in();

        $params = $_POST;
        $attributes = array(
            'questionnaire_id' => $params['questionnaire_id'],
            'question' => $params['question'],
            'qid' => $params['qid'],
            'answer' => $params['answer']
        );

        $newquestionanswers = new QuestionsAnswersModel($attributes);
        $errors = $newquestionanswers->errors();

        if (count($errors) == 0) {
            $newquestionanswers->savequestions_answers();
            Redirect::to('/overview', array('message' => 'Data added to database!'));
        } else {
            View::make('questionnairedataviews/addquestionsanswers.html', array('errors' => $errors, 'attributes' => $attributes));
        }
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

    public static function updatequestionnaire($id) {
        self::check_logged_in();
        $params = $_POST;
        $attributes = array(
            'questionnaire_id' => $id,
            'questionnaire_name' => $params['questionnaire_name'],
            'project_start' => $params['project_start'],
            'customer_company' => $params['customer_company'],
            'vat_number' => $params['vat_number']
        );

        $datarow = new QuestionnaireModel($attributes);
        $errors = $datarow->errors();

        if (count($errors) == 0) {

            $datarow->updatequestionnaire($id);
            Redirect::to('/viewedit', array('message' => 'Data edit success!'));
        } else {

            View::make('questionnairedataviews/add.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

    public static function viewremovequestionnaire() {
        self::check_logged_in();
        $data = QuestionDataModel::getAllQuestionnaires();
        $headings = array('Questionnaire ID', 'Questionnaire Name', 'Date', 'Company', 'VAT number', 'Remove');
        View::make('questionnairedataviews/viewremovequestionnaire.html', array('data' => $data, 'headings' => $headings));
    }

    public static function removequestionnaire($id) {
        self::check_logged_in();
        $datarow = new QuestionDataModel(array('questionnaire_id' => $id));
        $datarow->removequestionnaire();

        Redirect::to('/viewremovequestionnaire', array('message' => 'Questionnaire removed!'));
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

    public static function removeanswer($id) {
        self::check_logged_in();
        $datarow = new QuestionsAnswersModel(array('questions_answers_id' => $id));
        $datarow->removeanswer();

        Redirect::to('/viewremovequestionnaire', array('message' => 'Row removed!'));
    }
}
