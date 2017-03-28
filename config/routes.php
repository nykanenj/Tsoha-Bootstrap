<?php

$routes->get('/', function() {
    MainController::login();
});

$routes->get('/login', function() {
    MainController::login();
});

$routes->get('/overview', function() {
    DataController::overview();
});

$routes->get('/query', function() {
    MainController::query();
});

$routes->get('/edit', function() {
    MainController::edit();
});

$routes->get('/remove', function() {
    MainController::remove();
});

$routes->get('/query/:questionnaire_name', function($questionnaire_name) {
    DataController::show($questionnaire_name);
});

$routes->get('/sandbox', function() {
    MainController::sandbox();
});
