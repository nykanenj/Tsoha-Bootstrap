<?php

class HelloWorldController extends BaseController {

    public static function index() {
        // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        echo 'Tämä on etusivu!';
    }

    public static function sandbox() {
        // Testaa koodiasi täällä
        View::make('helloworld.html');
    }

    public static function login() {
        View::make('suunnitelmat/login.html');
    }

    public static function overview() {
        View::make('suunnitelmat/overview.html');
    }

    public static function query() {
        View::make('suunnitelmat/query.html');
    }

    public static function query_results() {
        View::make('suunnitelmat/query_results.html');
    }

}
