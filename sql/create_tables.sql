CREATE TABLE usertable(
  user_id SERIAL PRIMARY KEY,
  username varchar(30) NOT NULL, -- Muista erottaa sarakkeiden määrittelyt pilkulla!
  password varchar(30) NOT NULL,
  adminrights integer NOT NULL -- Varmista ettei viimeisessä pilkkua
);

CREATE TABLE questionnaire(
  questionnaire_id SERIAL PRIMARY KEY,
  project_start DATE,
  questionnaire_name varchar(40) NOT NULL,
  customer_company varchar(40) NOT NULL, 
  vat_number char(9) NOT NULL
);

CREATE TABLE questions_answers(
  questions_answers_id SERIAL PRIMARY KEY,
  questionnaire_id INTEGER REFERENCES questionnaire(questionnaire_id),
  question varchar(50) NOT NULL,
  qid varchar(30) NOT NULL,
  answer varchar(40) NOT NULL
);

CREATE TABLE respondent(
  respondent_id SERIAL PRIMARY KEY,
  respondent_name varchar(40), 
  gender varchar(10),
  age INTEGER,
  city varchar(20),
  address varchar(50)
);

CREATE TABLE questionrespondent(
  questions_answers_id INTEGER REFERENCES questions_answers(questions_answers_id),
  respondent_id INTEGER REFERENCES respondent(respondent_id)
);

