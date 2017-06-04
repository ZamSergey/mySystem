<?php
class Model_cinema {

    static function showList() {
        echo "Запрос ушел";
        $ch = curl_init("localhost/myAPI/cinema/");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $a = (array)json_decode(curl_exec($ch));
        return $a;
        curl_close($ch);

    }
}