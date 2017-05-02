<?php

class RespondentModel extends BaseModel {

    public $respondent_id, $respondent_name, $gender, $age;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_respondent_name', 'validate_gender', 'validate_age');
    }
    
    public static function getAllRespondents() {
        $query = DB::connection()->prepare('SELECT * FROM respondent');
        $query->execute();
        $rows = $query->fetchAll();
        $data = array();

        foreach ($rows as $row) {
            $data[] = new RespondentModel(array(
                'respondent_id' => $row['respondent_id'],
                'respondent_name' => $row['respondent_name'],
                'gender' => $row['gender'],
                'age' => $row['age']
            ));
        }
        return $data; 
    }
    
        public function saveRespondent() {
        $query = DB::connection()->prepare('INSERT INTO respondent (respondent_name, gender, age) VALUES (:respondent_name, :gender, :age)');
        $query->execute(array(
            'respondent_name' => $this->respondent_name,
            'gender' => $this->gender,
            'age' => $this->age
        ));
        $row = $query->fetch();
    }

    //Validators below

    public function validate_respondent_name() {
        return parent::validate_string_length($this->respondent_name, 1, 40, 'Respondent Name');
    }

    public function validate_gender() {
        return parent::validate_string_length($this->gender, 1, 10, 'Gender');
    }

    public function validate_age() {
        return parent::validate_is_number($this->age, 'Age');
    }

}
