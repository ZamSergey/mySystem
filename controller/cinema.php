<?php
class Controller_cinema extends Controller_main{

    static function main($method, $id) {
        if (self::$user = Model_User::getByToken()){
            switch ($method) {
                case 'show':
                    self::show();
                    break;

                default:
                    self::index();

            }
            self::showPage();
        } else {
            switch ($method) {
                default:
                    self::index();
            }
            self::showPage();
        }
    }


    static function show() {

        self::$title = 'Кинотеатры нашей сети';
        self::$js[]  = JS  . 'cinema.js';
        self::$main = [
            'index/cinema' => [
                'cinemas' => Model_cinema::showList(),
                'user' => self::$user,
            ],
        ];

    }

}