<?php

/*
 * The DataController adds, edits and removes data from SQL database
 */

class DataController extends BaseController {
    
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
            $data = QuestionDataModel::getAllQuestionnaires();
            View::make('questionnairedataviews/addquestionsanswers.html', array('errors' => $errors, 'attributes' => $attributes, 'data' => $data));
        }
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

    public static function removequestionnaire($id) {
        self::check_logged_in();
        $datarow = new QuestionDataModel(array('questionnaire_id' => $id));
        $datarow->removequestionnaire();

        Redirect::to('/viewremovequestionnaire', array('message' => 'Questionnaire removed!'));
    }

    public static function removeanswer($id) {
        self::check_logged_in();
        $datarow = new QuestionsAnswersModel(array('questions_answers_id' => $id));
        $datarow->removeanswer();

        Redirect::to('/viewremovequestionnaire', array('message' => 'Row removed!'));
    }

}
