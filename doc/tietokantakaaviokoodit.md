### Tietokantakaaviot tehty yuml.me sivun avulla

Kaavion luomiseen tarvittava koodi:

```
 // Questionnaire Database Diagram.  
[Question]1-*[Answer]    
[Questionnaire]*-*[Question]
[CustomerCompany]1-*[Questionnaire]   
```
```
// Complex version
[Questionnaire|key -questionnaireID:int;key fkey CustomerCompany:int;]*-1>[CustomerCompany|key -companyID:int;-name:string]
[Questionnaire]<1-*[QuestionnairesQuestions|fkey key -Question:int;fkey key -Questionnaire:int]
[Question|key -qID:int;-question:string]<1-*[QuestionnairesQuestions|fkey key -Question:int;fkey key -Questionnaire:int] 
[Question|key -qID:int;-question:string]<1-*[Answer|fkey key questionID:int; -answer:string]
```
