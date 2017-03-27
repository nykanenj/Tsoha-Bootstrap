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

$routes->get('/edit', function() {
    MainController::edit();
});

$routes->get('/remove', function() {
    MainController::remove();
});

$routes->get('/sandbox', function() {
    MainController::sandbox();
});
