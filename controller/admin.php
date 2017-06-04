<?php
class Controller_admin extends Controller_main {

	static function main($method, $id){
		
		if(self::$user = Model_User::getByToken()){

			switch($method) {

				case 'show':
					self::show();
					break;
				case 'chmod':
					self::chmod();
					break;
                case 'edit':
                    self::edit($id);
                    break;
                case 'remove':
                    self::remove($id);
                    break;
				default:
					self::index();	

			}

			self::showPage();
		}else{
			switch($method) {
				default:
					self::index();
			}
			self::showPage();
		}

	}

	static function show() {


		self::$title = 'Изменение прав пользователя';
		self::$js[]  = JS  . 'adminForm.js';
		self::$main = [
			'index/admin' => [
				'users' => Model_admin::getAllUsers(),
				'user' => self::$user,
			],
		];
		//}
	}
    static function remove($id) {
//        echo 'remove ' . $id;
        if (is_int($id)) {
            $data['table'] = 'user';
            $data['where'] = ['id_user' => $id];
            //print_r($data);
            if (DB::remove($data)) {
                header("Location: ".SUBSERVER."admin/show/");
            } else {
                die('error 404');
            }
        }
    }
    static function edit($id) {
        //echo 'edit ' . $id;
        if (IS_AJAX) {

            $answer['error'] = 1;
            $answer['text']  = 'Ошибка обращения к серверу';
            $answer['type']  = 'danger';

            if (isset($id) || isset($_POST['userName']) || isset($_POST['userStatus'])){
                $userName = $_POST['userName'];
                $userMode = $_POST['userStatus'];


                $data['table'] = 'user';
                $data['values'] = ['login' => $userName, 'mode' => $userMode];
                $data['where'] = ['id_user' => $id];
               // print_r($data);
                if(DB::update($data)) {
                    $answer['error'] = 0;
                    $answer['text']  = 'new edit';
                    $answer['type']  = 'success';
                } else {
                    $answer['text']  = 'Ошибка обрашения к серверу базы данных';
                    $answer['type']  = 'danger';
                }
                echo json_encode($answer);
            }
        } else {
            die('error 404');
        }
    }


		

}
