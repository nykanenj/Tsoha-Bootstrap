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

$routes->get('/insertoverview', function() {
    MainController::insertoverview();
});

$routes->post('/insertdata', function() {
    MainController::insertdata();
});

$routes->get('/editoverview', function() {
    MainController::editoverview();
});

$routes->get('/edit/:id', function($id) {
    MainController::edit($id);
});

$routes->post('/update/:id', function($id) {
    MainController::update($id);
});

$routes->get('/removeoverview', function() {
    MainController::removeoverview();
});

$routes->post('/remove/:id', function($id) {
    MainController::remove($id);
});

$routes->get('/sandbox', function() {
    MainController::sandbox();
});
