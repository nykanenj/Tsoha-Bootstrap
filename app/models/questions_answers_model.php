<?php

class QuestionsAnswersModel extends BaseModel {

    public $questions_answers_id, $questionnaire_id, $question, $qid, $answer, $validators;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_questionnaire_id', 'validate_qid', 'validate_question', 'validate_answer'); //Add more with a comma
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
    
    public function removeanswer() {
        $query = DB::connection()->prepare('DELETE FROM questions_answers WHERE questions_answers_id = :questions_answers_id');
        $query->execute(array('questions_answers_id' => $this->questions_answers_id));
        $query->fetch();
    }

    //Validators below

    public function validate_questionnaire_id() {
        
        return parent::validate_is_number($this->questionnaire_id, 'Questionnaire ID');
        
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
