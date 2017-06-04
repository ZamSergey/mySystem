<?php
class Route {
	//белые списки допустимых запросов к системе
	public static $patterns = array(
		'Controller_main' => [
			'#^' . SUBSERVER . '$#',
			'#^' . SUBSERVER . 'main/$#',
			'#^' . SUBSERVER . 'main/(auth)/$#',
			'#^' . SUBSERVER . 'main/(enterAuth)/$#',
			'#^' . SUBSERVER . 'main/(reg)/$#',
			'#^' . SUBSERVER . 'main/(enterReg)/$#',
			'#^' . SUBSERVER . 'main/(logout)/$#',
			'#^' . SUBSERVER . '(auth)/$#',
			'#^' . SUBSERVER . '(enterAuth)/$#',
			'#^' . SUBSERVER . '(reg)/$#',
			'#^' . SUBSERVER . '(enterReg)/$#',
			'#^' . SUBSERVER . '(logout)/$#',
		],
		'Controller_news' => [
			'#^' . SUBSERVER . 'news/$#',
			'#^' . SUBSERVER . 'news/(show)/?$#',
			'#^' . SUBSERVER . 'news/(show)/([0-9]+)/$#',
			'#^' . SUBSERVER . 'news/(add)/$#',
			'#^' . SUBSERVER . 'news/(edit)/([0-9]+)/$#',
			'#^' . SUBSERVER . 'news/(remove)/([0-9]+)/$#',
		],
		'Controller_admin' => [
			'#^' . SUBSERVER . 'admin/$#',
			'#^' . SUBSERVER . 'admin/([A-z])/?$#',
			'#^' . SUBSERVER . 'admin/(chmod)/$#',
			'#^' . SUBSERVER . 'admin/(chmod)/([0-9]+)/$#',
            '#^' . SUBSERVER . 'admin/(remove)/([0-9]+)/$#',
            '#^' . SUBSERVER . 'admin/(edit)/([0-9]+)/$#',

		],
        'Controller_cinema' => [
            '#^' . SUBSERVER . 'cinema/$#',
            '#^' . SUBSERVER . 'cinema/(show)/?$#',


        ],

		'Error' => [
			'#^.*$#'
		],
	);
	public static function start($url) {

		// print_r($url);
		// echo '<br>';

		foreach (self::$patterns as $class => $list) {
			foreach ($list as $pattern) {
				if (preg_match($pattern, $url, $info)) {
					$method = isset($info[1]) && $info[1] !== '' ? htmlspecialchars($info[1]) : 'index';
					$id = isset($info[2]) ? (int)$info[2] : 0;
					break 2;
				}
			}
		}

		$path = str_replace('_', '/', $class) . '.php';

		if ($class != 'Error' AND file_exists($path)) {
			include_once $path;
			$class::main($method, $id);

		} else {
			die('Router Error!');
		}

 	}

 	public static function main($method, $id){}
}
// Route::start();
//echo '<pre>';
//print_r(Route::$patterns);
//print_r($_SERVER['REQUEST_URI']);