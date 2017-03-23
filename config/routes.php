<?php

$routes->get('/', function() {
    MainController::login();
});

$routes->get('/login', function() {
    MainController::login();
});

$routes->get('/overview', function() {
    MainController::overview();
});

$routes->get('/query', function() {
    MainController::query();
});

$routes->get('/sandbox', function() {
    MainController::sandbox();
});
