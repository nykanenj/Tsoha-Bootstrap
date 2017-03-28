<?php

require 'app/models/record.php';
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
    
    public static function edit() {
        View::make('suunnitelmat/edit.html');
    }
    
    public static function remove() {
        View::make('suunnitelmat/remove.html');
    }

    public static function sandbox() {
        // Testaa koodiasi täällä
        $mummonpullat = Record::findQuestionnaire('Mummonpullat pilottikysely');
        $maistanut = Record::findqid('maistanut');
        $data = Record::getAllData();
        Kint::dump($mummonpullat);
        Kint::dump($maistanut);
        Kint::dump($data);
    }

}
