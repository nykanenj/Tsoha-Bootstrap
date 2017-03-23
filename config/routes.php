<?php

$routes->get('/', function() {
    HelloWorldController::index();
});

$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});

$routes->get('/login', function() {
    HelloWorldController::login();
});

$routes->get('/overview', function() {
    HelloWorldController::overview();
});

$routes->get('/query', function() {
    HelloWorldController::query();
});

$routes->get('/query_results', function() {
    HelloWorldController::query_results();
});
