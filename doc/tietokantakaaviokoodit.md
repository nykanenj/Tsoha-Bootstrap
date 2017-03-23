### Tietokantakaaviot tehty yuml.me sivun avulla

Kaavion luomiseen tarvittava koodi:

```
 // Questionnaire Database Diagram.  
[Question]1-*[Answer]  
[Respondent]1-*[QuestionnairesRespondents]  
[Questionnaire]1-*[QuestionnairesRespondents]  
[Questionnaire]1-*[QuestionnairesQuestions]  
[Question]1-*[QuestionnairesQuestions]   
[CustomerCompany]1-*[Questionnaire]  
```
```
// Complex version
[Respondent|key -respID:int;-name:string]<1-*[QuestionnairesRespondents|fkey key -Questionnaire:int;fkey key -Respondent:int]
[Questionnaire]<1-*[QuestionnairesRespondents]
[Questionnaire|key -questionnaireID:int;key fkey CustomerCompany:int;]*-1>[CustomerCompany|key -companyID:int;-name:string]
[Questionnaire]<1-*[QuestionnairesQuestions|fkey key -Question:int;fkey key -Questionnaire:int]
[Question|key -qID:int;-question:string]<1-*[QuestionnairesQuestions|fkey key -Question:int;fkey key -Questionnaire:int] 
[Question|key -qID:int;-question:string]<1-*[QuestionsAnswers|fkey key -Question:int;fkey key -Answer:int]
[Answer|key -ansID:int;-answer:string]<1-*[QuestionsAnswers]
```
