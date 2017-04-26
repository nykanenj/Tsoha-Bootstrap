<?php

//The first route that gives a match will be used.

$routes->get('/', function() {
    UserController::login();
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

$routes->get('/overview/:questionnaire_id', function($questionnaire_id) {
    ViewController::show($questionnaire_id);
});

$routes->get('/query', function() {
    ViewController::query();
});

$routes->get('/insertoverview1', function() {
    ViewController::insertoverview1();
});

$routes->get('/insertoverview2', function() {
    ViewController::insertoverview2();
});

$routes->post('/insertquestionnaire', function() {
    DataController::insertquestionnaire();
});

$routes->post('/insertquestionsanswers', function() {
    DataController::insertquestionsanswers();
});

$routes->get('/viewedit', function() {
    ViewController::viewedit();
});

$routes->get('/edit/:id', function($id) {
    ViewController::edit($id);
});

$routes->post('/updatequestionnaire/:id', function($id) {
    DataController::updatequestionnaire($id);
});

$routes->get('/viewremovequestionnaire', function() {
    ViewController::viewremovequestionnaire();
});

$routes->post('/removequestionnaire/:id', function($id) {
    DataController::removequestionnaire($id);
});

$routes->get('/viewremoveanswer/:questionnaire_id', function($questionnaire_id) {
    ViewController::viewremoveanswer($questionnaire_id);
});

$routes->post('/removeanswer/:id', function($id) {
    DataController::removeanswer($id);
});
