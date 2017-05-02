<?php

class QuestionnaireModel extends BaseModel {

    public $questionnaire_id, $project_start, $questionnaire_name, $customer_company, $vat_number, $validators;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_questionnaire_name', 'validate_project_start', 'validate_customer_company', 'validate_vat_number'); //Add more with a comma
    }

    public function saveQuestionnaire() {
        $query = DB::connection()->prepare('INSERT INTO questionnaire (project_start, questionnaire_name, customer_company, vat_number) VALUES (:project_start, :questionnaire_name, :customer_company, :vat_number) RETURNING questionnaire_id');
        $query->execute(array(
            'project_start' => $this->project_start,
            'questionnaire_name' => $this->questionnaire_name,
            'customer_company' => $this->customer_company,
            'vat_number' => $this->vat_number
        ));

        $row = $query->fetch();
        $this->questionnaire_id = $row['questionnaire_id'];
    }

    public static function getAllQuestionnaires() {

        $query = DB::connection()->prepare('SELECT * FROM questionnaire ORDER BY questionnaire_id');
        $query->execute();
        $rows = $query->fetchAll();
        $data = array();

        foreach ($rows as $row) {
            $data[] = new QuestionDataModel(array(
                'questionnaire_id' => $row['questionnaire_id'],
                'project_start' => $row['project_start'],
                'questionnaire_name' => $row['questionnaire_name'],
                'customer_company' => $row['customer_company'],
                'vat_number' => $row['vat_number']
            ));
        }

        return $data;
    }

    public static function findAttributesByQuestionnaireID($id) {

        $query = DB::connection()->prepare('SELECT * FROM questionnaire WHERE questionnaire_id = :questionnaire_id');
        $query->execute(array('questionnaire_id' => $id));
        $row = $query->fetchAll();

        return $row;
    }

    public function updateQuestionnaire($id) {
        $query = DB::connection()->prepare('UPDATE questionnaire SET project_start = :project_start, questionnaire_name = :questionnaire_name, customer_company = :customer_company, vat_number = :vat_number WHERE questionnaire_id = :questionnaire_id');
        $query->execute(array('questionnaire_id' => $this->questionnaire_id,
            'project_start' => $this->project_start,
            'questionnaire_name' => $this->questionnaire_name,
            'customer_company' => $this->customer_company,
            'vat_number' => $this->vat_number,
            'questionnaire_id' => $id
        ));
        $query->fetch();
    }

    public function removeQuestionnaire($id) {
        $query = DB::connection()->prepare('DELETE FROM questions_answers WHERE questionnaire_id = :questionnaire_id');
        $query->execute(array('questionnaire_id' => $id));
        $query->fetch();
        $query = DB::connection()->prepare('DELETE FROM questionnaire WHERE questionnaire_id = :questionnaire_id');
        $query->execute(array('questionnaire_id' => $id));
        $query->fetch();
    }

    //Validators below

    public function validate_questionnaire_id() {

        return parent::validate_is_number($this->questionnaire_id, 'Questionnaire ID');
    }

    public function validate_questionnaire_name() {

        return parent::validate_string_length($this->questionnaire_name, 1, 40, 'Questionnaire name');
    }

    public function validate_project_start() {

        $errors = array();
        $datepattern = '/^((19|20)?\d\d)-' .
                '((0?[1-9])|(1[0-2]))-' .
                '((0?[1-9])|([1-2][0-9])|(3[0-1]))$/i';

        if (preg_match($datepattern, $this->project_start) == 0) {

            $errors[] = 'Date: Project start date does not match correct form. Write in form dd-mm-yy';
        }

        return $errors;
    }

    public function validate_customer_company() {

        return parent::validate_string_length($this->customer_company, 1, 40, 'Customer company');
    }

    public function validate_vat_number() {

        $errors = array();
        $vatpattern = '/^\d{7}-\d$/i';

        if (preg_match($vatpattern, $this->vat_number) == 0) {

            $errors[] = 'Vat number: Does not match correct form. Check that it matches the form 1234567-8. Make sure there are no extra spaces before or after the number.';
        }

        return $errors;
    }

}
