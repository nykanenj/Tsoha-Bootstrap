<?php

class MainController extends BaseController {

    public static function login() {
        View::make('suunnitelmat/login.html');
    }

    public static function overview() {
        View::make('suunnitelmat/overview.html');
    }

    public static function query() {
        View::make('suunnitelmat/query.html');
    }

    public static function sandbox() {
        // Testaa koodiasi täällä
        View::make('sandbox.html');
    }

}
