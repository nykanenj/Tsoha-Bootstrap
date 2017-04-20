<?php

class QuestionsAnswersModel extends BaseModel {

    public $questionnaire_id, $question, $qid, $answer, $validators;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('questionnaire_qid', 'validate_qid', 'validate_question', 'validate_answer'); //Add more with a comma
    }

    public function savequestions_answers() {
        $query = DB::connection()->prepare('INSERT INTO questions_answers (questionnaire_id, question, qid, answer) VALUES (:questionnaire_id, :question, :qid, :answer) RETURNING questions_answers_id');
        $query->execute(array('questionnaire_id' => $this->questionnaire_id,
            'question' => $this->question,
            'qid' => $this->qid,
            'answer' => $this->answer));

        $row = $query->fetch();
        $this->questions_answers_id = $row['questions_answers_id'];
    }

    //Validators below

    public function questionnaire_qid() {

        return parent::validate_string_length($this->questionnaire_id, 1, 10000, 'Questionnaire ID');
    }
    
    public function validate_qid() {

        return parent::validate_string_length($this->qid, 1, 30, 'qid');
    }

    public function validate_question() {

        return parent::validate_string_length($this->question, 1, 50, 'Question');
    }

    public function validate_answer() {

        return parent::validate_string_length($this->answer, 1, 40, 'Answer');
    }

}
