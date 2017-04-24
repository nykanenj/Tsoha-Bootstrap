<?php

//The first route that gives a match will be used.

$routes->get('/', function() {
    UserController::login();
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
    MainController::overview();
});

$routes->get('/questionnaires', function() {
    MainController::questionnaires();
});

$routes->get('/overview/:questionnaire_id', function($questionnaire_id) {
    MainController::show($questionnaire_id);
});

$routes->get('/query', function() {
    MainController::query();
});

$routes->get('/insertoverview1', function() {
    MainController::insertoverview1();
});

$routes->get('/insertoverview2', function() {
    MainController::insertoverview2();
});

$routes->post('/insertquestionnaire', function() {
    MainController::insertquestionnaire();
});

$routes->post('/insertquestionsanswers', function() {
    MainController::insertquestionsanswers();
});

$routes->get('/viewedit', function() {
    MainController::viewedit();
});

$routes->get('/edit/:id', function($id) {
    MainController::edit($id);
});

$routes->post('/update/:id', function($id) {
    MainController::update($id);
});

$routes->get('/viewremovequestionnaire', function() {
    MainController::viewremovequestionnaire();
});

$routes->post('/removequestionnaire/:id', function($id) {
    MainController::removequestionnaire($id);
});

$routes->get('/viewremoveanswer/:questionnaire_id', function($questionnaire_id) {
    MainController::viewremoveanswer($questionnaire_id);
});

$routes->post('/removeanswer/:id', function($id) {
    MainController::removeanswer($id);
});

$routes->get('/sandbox', function() {
    MainController::sandbox();
});
