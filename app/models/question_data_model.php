<?php

class QuestionDataModel extends BaseModel {

    public $project_start, $questionnaire_name, $customer_company, $vat_number, $questions_answers_id, $questionnaire_id, $question, $qid, $answer, $validators;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_qid', 'validate_question', 'validate_answer'); //Add more with a comma
    }

    public function getAttributes() {

        $attributes = array('questionnaire_id' => $this->questionnaire_id,
            'question' => $this->question,
            'qid' => $this->qid,
            'answer' => $this->answer);

        return $attributes;
    }

    public function update($id) {
        $query = DB::connection()->prepare('UPDATE questions_answers SET questionnaire_id = :questionnaire_id, question = :question, qid = :qid, answer = :answer WHERE questions_answers_id = :questions_answers_id');
        $query->execute(array('questionnaire_id' => $this->questionnaire_id,
            'question' => $this->question,
            'qid' => $this->qid,
            'answer' => $this->answer,
            'questions_answers_id' => $id
        ));
        $query->fetch();
    }

    public function remove() {
        $query = DB::connection()->prepare('DELETE FROM questions_answers WHERE questions_answers_id = :questions_answers_id');
        $query->execute(array('questions_answers_id' => $this->questions_answers_id));
        $query->fetch();
    }

    public static function getAllData() {

        $query = DB::connection()->prepare('SELECT * FROM questions_answers FULL OUTER JOIN questionnaire ON questions_answers.questionnaire_id = questionnaire.questionnaire_id');
        $query->execute();
        $rows = $query->fetchAll();
        $data = array();

        foreach ($rows as $row) {
            $data[] = new QuestionDataModel(array(
                'questions_answers_id' => $row['questions_answers_id'],
                'project_start' => $row['project_start'],
                'questionnaire_id' => $row['questionnaire_id'],
                'questionnaire_name' => $row['questionnaire_name'],
                'customer_company' => $row['customer_company'],
                'vat_number' => $row['vat_number'],
                'question' => $row['question'],
                'qid' => $row['qid'],
                'answer' => $row['answer']
            ));
        }

        return $data;
    }

    public static function getAllQuestionnaires() {

        $query = DB::connection()->prepare('SELECT * FROM questionnaire');
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

    public static function findQuestionnaire($questionnaire_id) {

        $query = DB::connection()->prepare('SELECT * FROM questions_answers LEFT JOIN questionnaire ON questions_answers.questionnaire_id = questionnaire.questionnaire_id WHERE questions_answers.questionnaire_id = :questionnaire_id');
        $query->execute(array('questionnaire_id' => $questionnaire_id));
        $rows = $query->fetchAll();
        $data = array();

        foreach ($rows as $row) {
            $data[] = new QuestionDataModel(array(
                'questions_answers_id' => $row['questions_answers_id'],
                'project_start' => $row['project_start'],
                'questionnaire_id' => $row['questionnaire_id'],
                'questionnaire_name' => $row['questionnaire_name'],
                'customer_company' => $row['customer_company'],
                'vat_number' => $row['vat_number'],
                'question' => $row['question'],
                'qid' => $row['qid'],
                'answer' => $row['answer']
            ));
        }

        return $data;
    }

    public static function findqid($qid) {

        $query = DB::connection()->prepare('SELECT * FROM questions_answers WHERE qid = :qid');
        $query->execute(array('qid' => $qid));
        $rows = $query->fetchAll();
        $data = array();

        foreach ($rows as $row) {
            $data[] = new QuestionDataModel(array(
                'questions_answers_id' => $row['questions_answers_id'],
                'questionnaire_id' => $row['questionnaire_id'],
                'question' => $row['question'],
                'qid' => $row['qid'],
                'answer' => $row['answer']
            ));

            return $data;
        }

        return null;
    }

    //Under construction
    public static function findAttributesByQuestionDataID($id) {

        $query = DB::connection()->prepare('SELECT * FROM questions_answers WHERE questions_answers_id = :questions_answers_id');
        $query->execute(array('questions_answers_id' => $id));
        $row = $query->fetchAll();

        return $row;
    }
}
