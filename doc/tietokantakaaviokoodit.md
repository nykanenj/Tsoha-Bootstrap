# Tietokantakaaviot tehty yuml.me sivun avulla

Kaavion luomiseen tarvittava koodi:

 // Questionnaire Database Diagram.  
[Question]1-*[Answer]  
[Respondent]1-*[QuestionnairesRespondents]  
[Questionnaire]1-*[QuestionnairesRespondents]  
[Questionnaire]1-*[QuestionnairesQuestions]  
[Question]1-*[QuestionnairesQuestions]   
[CustomerCompany]1-*[Questionnaire]  
