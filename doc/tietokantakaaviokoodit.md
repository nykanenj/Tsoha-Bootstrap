### Tietokantakaaviot tehty yuml.me sivun avulla

Kaavion luomiseen tarvittava koodi:

```
[usertable]    
[questions_answers]*-*[respondent]
[questionnaire]1-*[questions_answers]
```
```
// Complex version
[User|key -user_id; -username:string; -password:string]
[respondent|key -respondent_id:int;-name:string;-gender:string;-age:int]<1-*[questionnaires_respondents|fkey key -questions_answers_id:int;fkey key -respondent_id:int] 
[questions_answers|key -questions_answers_id:int; fkey -questionnaire_id:int; -question:string; -answer:string; -qID:string ]<1-*[questionnaires_respondents]
[questionnaire|key -questionnaire_id:int; -questionnaire_name:string; -project_start:date; -customer_company:string; -vat_number:string ]<1-*[questions_answers]
```
