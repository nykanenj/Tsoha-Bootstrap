INSERT INTO usertable (username, password, adminrights) VALUES ('Testikäyttäjä', 'Testisala', 0);
INSERT INTO usertable (username, password, adminrights) VALUES ('Matti Nykänen', 'Mäkikotka', 0);
INSERT INTO usertable (username, password, adminrights) VALUES ('admin', 'admin', 1);
INSERT INTO usertable (username, password, adminrights) VALUES ('test', 'test', 1);

INSERT INTO questionnaire (
    project_start,
    questionnaire_name,
    customer_company,
    vat_number) VALUES (
    '28.03.2017', 
    'Mummonpullat pilottikysely',
    'Mummonpullat Oy',
    '1234567-8');

INSERT INTO questionnaire (
    project_start,
    questionnaire_name,
    customer_company,
    vat_number) VALUES (
    '01.03.2017', 
    'Kevään bränditutkimus Sente',
    'Sente Academy',
    '2663047-3');
    
    
INSERT INTO questionnaire (
    project_start,
    questionnaire_name,
    customer_company,
    vat_number) VALUES (
    '06.04.2017', 
    'Formulakysely',
    'Ferrari',
    '9999999-8');




INSERT INTO questions_answers (
    questionnaire_id,
    question,
    qid,
    answer) VALUES (
    1,
    'Oletko maistanut mummon pullia?',
    'maistanut',
    'Kyllä');

INSERT INTO questions_answers (
    questionnaire_id,
    question,
    qid,
    answer) VALUES (
    1,
    'Oletko maistanut mummon pullia?',
    'maistanut',
    'Ei');

INSERT INTO questions_answers (
    questionnaire_id,
    question,
    qid,
    answer) VALUES (
    1,
    'Oletko maistanut mummon pullia?',
    'maistanut',
    'Ei');

INSERT INTO questions_answers (
    questionnaire_id,
    question,
    qid,
    answer) VALUES (
    2,
    'Tunnetko tämän brändin?',
    'tunnettuus',
    'Kyllä');

INSERT INTO questions_answers (
    questionnaire_id,
    question,
    qid,
    answer) VALUES (
    2,
    'Tunnetko tämän brändin?',
    'tunnettuus',
    'Ei');

INSERT INTO questions_answers (
    questionnaire_id,
    question,
    qid,
    answer) VALUES (
    2,
    'Tunnetko tämän brändin?',
    'tunnettuus',
    'Kyllä');

INSERT INTO questions_answers (
    questionnaire_id,
    question,
    qid,
    answer) VALUES (
    3,
    'Mikä talli voittaa mestaruuden tänävuonna?',
    'voittaa',
    'McLaren');

INSERT INTO questions_answers (
    questionnaire_id,
    question,
    qid,
    answer) VALUES (
    3,
    'Mikä talli voittaa mestaruuden tänävuonna?',
    'voittaa',
    'Ferrari');

INSERT INTO questions_answers (
    questionnaire_id,
    question,
    qid,
    answer) VALUES (
    3,
    'Mikä talli voittaa mestaruuden tänävuonna?',
    'voittaa',
    'Renault');

INSERT INTO respondent (
    respondent_name,
    gender,
    age) VALUES (
    'Aura Lumi',
    'Female',
    '22');
    
INSERT INTO respondent (
    respondent_name,
    gender,
    age) VALUES (
    'Jere Koskinen',
    'Male',
    '20');
    
INSERT INTO respondent (
    respondent_name,
    gender,
    age) VALUES (
    'Kalle Kalevi',
    'Male',
    '29');    

INSERT INTO respondent (
    respondent_name,
    gender,
    age) VALUES (
    'Sirkku Kaunis',
    'Female',
    '21');

INSERT INTO respondent (
    respondent_name,
    gender,
    age) VALUES (
    'Jyrki Lehto',
    'Male',
    '18');

INSERT INTO questionrespondent (
    questions_answers_id,
    respondent_id) VALUES (
    1,
    1);

INSERT INTO questionrespondent (
    questions_answers_id,
    respondent_id) VALUES (
    2,
    2);

INSERT INTO questionrespondent (
    questions_answers_id,
    respondent_id) VALUES (
    3,
    3);

INSERT INTO questionrespondent (
    questions_answers_id,
    respondent_id) VALUES (
    4,
    1);

INSERT INTO questionrespondent (
    questions_answers_id,
    respondent_id) VALUES (
    5,
    4);

INSERT INTO questionrespondent (
    questions_answers_id,
    respondent_id) VALUES (
    6,
    5);

INSERT INTO questionrespondent (
    questions_answers_id,
    respondent_id) VALUES (
    7,
    4);

INSERT INTO questionrespondent (
    questions_answers_id,
    respondent_id) VALUES (
    8,
    3);

INSERT INTO questionrespondent (
    questions_answers_id,
    respondent_id) VALUES (
    9,
    2);