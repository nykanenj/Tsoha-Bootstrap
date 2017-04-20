<?php

class MainController extends BaseController {

    public static function overview() {
        self::check_logged_in();
        $data = QuestionDataModel::getAllData();
        View::make('questionnairewebpages/overview.html', array('data' => $data, 'title' => ' Overview af all data'));
    }
    
    public static function questionnaires() {
        self::check_logged_in();
        $data = QuestionDataModel::getAllQuestionnaires();
        View::make('questionnairewebpages/questionnaires.html', array('data' => $data));
    }

    public static function show($questionnaire_id) {
        self::check_logged_in();
        $data = QuestionDataModel::findQuestionnaire($questionnaire_id);
        if (empty($data)) {
            $data = QuestionDataModel::getAllQuestionnaires();
            View::make('questionnairewebpages/questionnaires.html', array('data' => $data, 'error' => 'No data to show for this questionnaire!'));
        }
        View::make('questionnairewebpages/overview.html', array('data' => $data, 'title' => $data[1]->questionnaire_name));
    }

    public static function query() {
        self::check_logged_in();
        View::make('questionnairewebpages/query.html');
    }

    public static function insertoverview1() {
        self::check_logged_in();
        View::make('questionnairewebpages/addquestionnaire.html');
    }
    
    public static function insertoverview2() {
        self::check_logged_in();
        View::make('questionnairewebpages/addquestionsanswers.html');
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
            View::make('questionnairewebpages/addquestionnaire.html', array('errors' => $errors, 'attributes' => $attributes));
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
            View::make('questionnairewebpages/addquestionsanswers.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

    public static function editoverview() {
        self::check_logged_in();
        $data = QuestionDataModel::getAllData();
        View::make('questionnairewebpages/editoverview.html', array('data' => $data));
    }

    public static function edit($id) {
        self::check_logged_in();
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

        if (count($errors) == 0) {

            $datarow->update($id);
            Redirect::to('/overview', array('message' => 'Data added to database!'));
        } else {

            View::make('questionnairewebpages/add.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

    public static function removeoverview() {
        self::check_logged_in();
        $data = QuestionDataModel::getAllData();
        View::make('questionnairewebpages/removeoverview.html', array('data' => $data));
    }

    public static function remove($id) {
        self::check_logged_in();
        $datarow = new QuestionDataModel(array('questiondata_id' => $id));
        $datarow->remove();

        Redirect::to('/overview', array('message' => 'Rivi poistettu onnistuneesti!'));
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
