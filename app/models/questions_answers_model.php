<?php

class QuestionsAnswersModel extends BaseModel {

    public $questions_answers_id, $questionnaire_id, $question, $qid, $answer, $respondent_id, $validators;

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
        
        $query = DB::connection()->prepare('INSERT INTO questionrespondent (questions_answers_id, respondent_id) VALUES (:questions_answers_id, :respondent_id)');
        $query->execute(array('questions_answers_id' => $this->questions_answers_id,
                              'respondent_id' => $this->respondent_id));
        $query->fetch();
    }

    public function getQuestionnaireID() {
        return $this->questionnaire_id;
    }

    public function updateanswer($id) {
        $query = DB::connection()->prepare('UPDATE questions_answers SET questionnaire_id = :questionnaire_id, question = :question, qid = :qid, answer = :answer WHERE questions_answers_id = :questions_answers_id');
        $query->execute(array('questionnaire_id' => $this->questionnaire_id,
            'questions_answers_id' => $id,
            'question' => $this->question,
            'qid' => $this->qid,
            'answer' => $this->answer
        ));
        $query->fetch();
    }

    public static function findAttributesByQuestionsAnswersID($id) {

        $query = DB::connection()->prepare('SELECT * FROM questions_answers WHERE questions_answers_id = :questions_answers_id');
        $query->execute(array('questions_answers_id' => $id));
        $row = $query->fetchAll();

        return $row;
    }

    public static function removeanswer($id) {
        $query = DB::connection()->prepare('DELETE FROM questions_answers WHERE questions_answers_id = :questions_answers_id');
        $query->execute(array('questions_answers_id' => $id));
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
