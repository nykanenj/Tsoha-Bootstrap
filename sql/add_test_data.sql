INSERT INTO usertable (user_name, password) VALUES ('Testikäyttäjä', 'Testisala');
INSERT INTO usertable (user_name, password) VALUES ('Matti Nykänen', 'Mäkikotka');

INSERT INTO customercompany (company_name, vat_number) VALUES ('Mummonpullat Oy', '1234567-8');
INSERT INTO customercompany (company_name, vat_number) VALUES ('Sente Academy', '2663047-3');

INSERT INTO question (qID, question) VALUES ('tunnettuus', 'Tunnetko tämän brändin?');
INSERT INTO question (qID, question) VALUES ('mainonnanmuistaminen', 'Missä olet nähnyt tuotteesta mainontaa?');
INSERT INTO question (qID, question) VALUES ('maistuminen', 'Miltä pullat maistuu?');

INSERT INTO answer (question_id, answer) VALUES (1, 'Kyllä');
INSERT INTO answer (question_id, answer) VALUES (1, 'Ei');
INSERT INTO answer (question_id, answer) VALUES (1, 'Kyllä');
INSERT INTO answer (question_id, answer) VALUES (1, 'Kyllä');
INSERT INTO answer (question_id, answer) VALUES (1, 'Ei');
INSERT INTO answer (question_id, answer) VALUES (2, 'TV');
INSERT INTO answer (question_id, answer) VALUES (2, 'TV');
INSERT INTO answer (question_id, answer) VALUES (2, 'Internet');
INSERT INTO answer (question_id, answer) VALUES (2, 'Internet');
INSERT INTO answer (question_id, answer) VALUES (2, 'Lehti');
INSERT INTO answer (question_id, answer) VALUES (2, 'TV');
INSERT INTO answer (question_id, answer) VALUES (3, 'Hyvältä');
INSERT INTO answer (question_id, answer) VALUES (3, 'Herkulliselta');
INSERT INTO answer (question_id, answer) VALUES (3, 'Herkulliselta');
INSERT INTO answer (question_id, answer) VALUES (3, 'Pahalta');

INSERT INTO questionnaire (company_id, questionnaire_name) VALUES (2, 'Kevään bränditutkimus sente');
INSERT INTO questionnaire (company_id, questionnaire_name) VALUES (1, 'Mummonpullat pilotti');

INSERT INTO questionnairesquestions (question_id, questionnaire_id) VALUES (3, 2);











