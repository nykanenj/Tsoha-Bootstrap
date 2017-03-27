### Tietokantakaaviot tehty yuml.me sivun avulla

Kaavion luomiseen tarvittava koodi:

```
 // Questionnaire Database Diagram.  
[User]    
[QuestionnaireData]*-*[Respondent]
```
```
// Complex version
[User|key -user_id; -username:string; -password:string]
[respondent|key -respondent_id:int;-name:string;-gender:string;-age:int;-city:string;-address:string]<1-*[questionnaires_respondents|fkey key -id:int;fkey key -respondent_id:int] 
[questionnairedata|key -id:int; -questionnaire_name:string; -question:string; -answer:string ]<1-*[questionnaires_respondents]
```
