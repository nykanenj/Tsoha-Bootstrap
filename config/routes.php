<?php

//The first route that gives a match will be used.

$routes->get('/', function() {
    MainController::login();
});

$routes->get('/login', function() {
    UserController::login();
});

$routes->post('/login', function() {
    UserController::handle_login();
});

$routes->get('/test.html', function() {
    MainController::login();
});

$routes->get('/overview', function() {
    DataController::overview();
});

$routes->get('/query', function() {
    MainController::query();
});

$routes->get('/editoverview', function() {
    DataController::editoverview();
});

$routes->get('/edit/:id', function($id) {
    DataController::edit($id);
});

$routes->post('/update/:id', function($id) {
    DataController::update($id);
});

$routes->get('/removeoverview', function() {
    DataController::removeoverview();
});

$routes->post('/remove/:id', function($id) {
	Kint::dump($id);
    DataController::remove($id);
});

$routes->get('/add', function() {
    MainController::add();
});

$routes->post('/insertdata', function() {
    DataController::insertdata();
});

$routes->get('/query/:questionnaire_name', function($questionnaire_name) {
    DataController::show($questionnaire_name);
});


$routes->get('/sandbox', function() {
    MainController::sandbox();
});
