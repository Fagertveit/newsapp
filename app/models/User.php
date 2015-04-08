<?php namespace Newsapp\Models;

use Newsapp\Core\Crypt;
use Newsapp\Core\Model;

class User extends Model {
	protected $table = "user";

	private $id;
	private $email;
	private $key;
	private $admin;

	public function __construct($id = null) {
		if($id != null) {
			$this->find($id);
		}
	}

	public function authenticate($email, $pass) {
		parent::open();
		$mysqli = parent::get();

		$result = array();
		$response = array();

		if($stmt = $mysqli->prepare("SELECT * FROM {$this->table} WHERE email = ?")) {
			$stmt->bind_param('s', $email);

			$stmt->execute();

			$resultObj = array();
			$resultObj = $stmt->get_result();

			while($row = $resultObj->fetch_array(MYSQLI_ASSOC)) {
				$result[] = $row;
			}
		} else {

		}

		parent::close();

		if(count($result) == 0) {
			$response['msg'] = "Couldn't find user with that e-mail.";
			$response['status'] = "fail";
			return $response;
		} else if(strcmp($result[0]['key'], Crypt::generateHash($pass, $result[0]['key'])) !== 0) {
			$response['msg'] = "Email and password doesn't match, please try again";
			$response['status'] = "fail";
			return $response;
		}

		$this->id = $result[0]['id'];
		$this->email = $result[0]['email'];
		$this->key = $result[0]['key'];
		$this->admin = $result[0]['admin'];

		$response['status'] = "success";
		$response['id'] = $this->id;

		return $response;
	}

	public function isValidUser($email, $key) {
		parent::open();
		$mysqli = parent::get();

		$result = array();
		$response = array();

		if($stmt = $mysqli->prepare("SELECT * FROM {$this->table} WHERE email = ?")) {
			$stmt->bind_param('s', $email);

			$stmt->execute();

			$resultObj = array();
			$resultObj = $stmt->get_result();

			while($row = $resultObj->fetch_array(MYSQLI_ASSOC)) {
				$result[] = $row;
			}
		} else {

		}

		if(count($result) != 0 && $result[0]['key'] == $key) {
			return true;
		} else {
			return false;
		}

		parent::close();
	}

	public function getEmail() {
		return $this->email;
	}

	public function getAdmin() {
		return $this->admin;
	}

	public function getKey() {
		return $this->key;
	}
}