CREATE TABLE usertable(
  user_id SERIAL PRIMARY KEY, -- SERIAL tyyppinen pääavain pitää huolen, että tauluun lisätyllä rivillä on aina uniikki pääavain. Kätevää!
  user_name varchar(30) NOT NULL, -- Muista erottaa sarakkeiden määrittelyt pilkulla!
  password varchar(30) NOT NULL
);

CREATE TABLE customercompany(
  company_id SERIAL PRIMARY KEY, -- SERIAL tyyppinen pääavain pitää huolen, että tauluun lisätyllä rivillä on aina uniikki pääavain. Kätevää!
  company_name varchar(30) NOT NULL, -- Muista erottaa sarakkeiden määrittelyt pilkulla!
  vat_number char(9) NOT NULL
);



CREATE TABLE question(
  question_id SERIAL PRIMARY KEY,
  qID varchar(50), --Text seen by users as the question identifier. It identifies similar questions among many questionnaires.
  question varchar(50) NOT NULL
);

CREATE TABLE answer(
  answer_id SERIAL PRIMARY KEY,
  question_id INTEGER REFERENCES question(question_id),
  answer varchar(50) NOT NULL
);

CREATE TABLE questionnaire(
  questionnaire_id SERIAL PRIMARY KEY,
  company_id INTEGER REFERENCES customercompany(company_id), -- Viiteavain CustomerCompany-tauluun
  questionnaire_name varchar(30)
);


CREATE TABLE questionnairesquestions(
  question_id INTEGER REFERENCES question(question_id),
  questionnaire_id INTEGER REFERENCES questionnaire(questionnaire_id)
);





