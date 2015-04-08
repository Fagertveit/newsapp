<?php namespace Newsapp\Core;

class Model {
	private static $conn;

	public static function open() {
		self::$conn = mysqli_connect(
			DB_HOST,
			DB_USER,
			DB_PASS,
			DB_NAME);

		if(!self::$conn) {
			printf("Can't connect to MySQL Server. Errorcode: %s\n", mysqli_connect_error());
			exit;
		}
	}

	public static function get() {
		return self::$conn;
	}

	public static function close() {
		mysqli_close(self::$conn);
	}
}