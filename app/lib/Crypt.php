<?php namespace Newsapp\Core;

class Crypt {
	public static function generateHash($plain, $salt = null) {
		if($salt === null) {
			$salt = substr(md5(uniqid(rand(), true)), 0, SALT_LENGTH);
		} else {
			$salt = substr($salt, 0, SALT_LENGTH);
		}
		return $salt . sha1($salt . $plain);
	}
}