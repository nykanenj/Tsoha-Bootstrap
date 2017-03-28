<?php

class MainController extends BaseController {

    public static function login() {
        View::make('questionnairewebpages/login.html');
    }

    public static function overview() {
        View::make('questionnairewebpages/overview.html');
    }

    public static function query() {
        View::make('questionnairewebpages/query.html');
    }
    
    public static function edit() {
        View::make('questionnairewebpages/edit.html');
    }
    
    public static function remove() {
        View::make('questionnairewebpages/remove.html');
    }

    public static function sandbox() {
        // Testaa koodiasi täällä
        $mummonpullat = Datacruncher::findQuestionnaire('Mummonpullat pilottikysely');
        $maistanut = Datacruncher::findqid('maistanut');
        $data = Datacruncher::getAllData();
        Kint::dump($mummonpullat);
        Kint::dump($maistanut);
        Kint::dump($data);
    }

}
