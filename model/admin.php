<?php

class Model_admin extends DB {

	public static function getAllUsers () {

		$query = 'SELECT * FROM `user` WHERE 1';
		
		$data = DB::getAll($query);
		return $data;

	}

}