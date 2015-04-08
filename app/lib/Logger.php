<?php namespace Newsapp\Core;

class Logger {
	private static $_file = '/app.log';
	private $levels = array(
		'info',
		'debug',
		'success',
		'warning',
		'fatal'
	);

	public function __construct() {

	}

	public static function setFile($file) {
		self::$_file = $file;
	}

	public static function log($msg, $level = 'info') {
		$fHandle = fopen(PATH_LOG . self::$_file, 'a');

		$line = '';
		$line .= date("Y-m-d H:i:s") . ' [';
		$line .= strtoupper($level) . '] ';
		$line .= $msg . "\n";
		fwrite($fHandle, $line);
		fclose($fHandle);
	}
}