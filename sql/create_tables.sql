CREATE TABLE usertable(
  user_id SERIAL PRIMARY KEY, -- SERIAL tyyppinen pääavain pitää huolen, että tauluun lisätyllä rivillä on aina uniikki pääavain. Kätevää!
  username varchar(30) NOT NULL, -- Muista erottaa sarakkeiden määrittelyt pilkulla!
  password varchar(30) NOT NULL,
  adminrights integer NOT NULL 
);

CREATE TABLE questiondata(
  questiondata_id SERIAL PRIMARY KEY, -- SERIAL tyyppinen pääavain pitää huolen, että tauluun lisätyllä rivillä on aina uniikki pääavain. Kätevää!
  project_start DATE, 
  questionnaire_name varchar(40) NOT NULL,
  customer_company varchar(40) NOT NULL, 
  vat_number char(9) NOT NULL,
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
  questiondata_id INTEGER REFERENCES questiondata(questiondata_id),
  respondent_id INTEGER REFERENCES respondent(respondent_id)
);

