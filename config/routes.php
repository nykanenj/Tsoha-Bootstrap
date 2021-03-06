<?php

//The first route that gives a match will be used.

$routes->get('/', function() {
    ViewController::overview();
});

$routes->get('/register', function() {
    UserController::register();
});

$routes->post('/register', function() {
    UserController::registernewuser();
});

$routes->get('/login', function() {
    UserController::login();
});

$routes->post('/login', function() {
    UserController::handle_login();
});

$routes->post('/logout', function() {
    UserController::logout();
});

$routes->get('/overview', function() {
    ViewController::overview();
});

$routes->get('/questionnaires', function() {
    ViewController::questionnaires();
});

$routes->get('/questionnaire/:questionnaire_id', function($questionnaire_id) {
    ViewController::show($questionnaire_id);
});

$routes->get('/addquestionnaire', function() {
    ViewController::addquestionnaire();
});

$routes->get('/addresponse', function() {
    ViewController::addresponse();
});

$routes->get('/addrespondent', function() {
    ViewController::addrespondent();
});

$routes->post('/insertquestionnaire', function() {
    DataController::insertquestionnaire();
});

$routes->post('/insertresponse', function() {
    DataController::insertresponse();
});

$routes->post('/insertrespondent', function() {
    DataController::insertrespondent();
});

$routes->get('/editquestionnaire/:id', function($id) {
    ViewController::editquestionnaire($id);
});

$routes->get('/editanswer/:id', function($id) {
    ViewController::editanswer($id);
});

$routes->post('/updatequestionnaire/:id', function($id) {
    DataController::updatequestionnaire($id);
});

$routes->post('/updateanswer/:id', function($id) {
    DataController::updateanswer($id);
});

$routes->post('/removequestionnaire/:id', function($id) {
    DataController::removequestionnaire($id);
});

$routes->post('/removeanswer/:questionnaire_id/:questions_answers_id', function($questionnaire_id, $questions_answers_id) {
    DataController::removeanswer($questionnaire_id, $questions_answers_id);
});
