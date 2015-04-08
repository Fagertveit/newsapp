<?php namespace Newsapp\Models;

use Newsapp\Core\Model;

class Article extends Model {
	protected $table = "article";

	private $id;
	private $title;
	private $body;
	private $excerpt;
	private $createdAt;
	private $updatedAt;

	public function __construct($id = null) {
		if($id != null) {
			$this->find($id);
		}
	}

	public function listing($offset = 0, $max_rows) {
		parent::open();
		$mysqli = parent::get();

		$result = array();

		if($stmt = $mysqli->prepare("SELECT id, title, excerpt, created_at, updated_at FROM {$this->table} ORDER BY id")) {
			$stmt->execute();

			$resultObj = array();
			$resultObj = $stmt->get_result();

			while($row = $resultObj->fetch_array(MYSQLI_ASSOC)) {
				$result[] = $row;
			}
		} else {

		}

		parent::close();

		return $result;
	}

	public function find($id) {
		parent::open();
		$mysqli = parent::get();

		$result = array();

		if($stmt = $mysqli->prepare("SELECT * FROM {$this->table} WHERE id = ?")) {
			$stmt->bind_param('i', $id);

			$stmt->execute();

			$resultObj = array();
			$resultObj = $stmt->get_result();

			while($row = $resultObj->fetch_array(MYSQLI_ASSOC)) {
				$result[] = $row;
			}
		} else {

		}

		parent::close();

		$this->id = $result[0]['id'];
		$this->title = $result[0]['title'];
		$this->body = $result[0]['body'];
		$this->excerpt = $result[0]['excerpt'];
		$this->createdAt = $result[0]['created_at'];
		$this->updatedAt = $result[0]['updated_at'];
	}

	public function count() {
		parent::open();
		$mysqli = parent::get();

		$rows = 0;

		if($stmt = $mysqli->prepare("SELECT * FROM {$this->table} ORDER BY id")) {
			$stmt->execute();

			$rows = mysqli_num_rows($stmt->get_result());
		} else {

		}

		parent::close();

		return $rows;
	}

	public function save() {
		if($this->id != null) {
			$this->update();
		} else {
			$this->create();
		}
	}

	public function create() {
		parent::open();
		$mysqli = parent::get();

		$result = array();

		if($stmt = $mysqli->prepare("INSERT INTO {$this->table} (title, body, excerpt, created_at, updated_at) values (?, ?, ?, ?, ?)")) {
			$stmt->bind_param('sssss', $this->title, $this->body, $this->excerpt, $createdAt, $updatedAt);

			$createdAt = date("Y-m-d H:i:s");
			$updatedAt = date("Y-m-d H:i:s");

			$stmt->execute();

			$stmt->close();

			$this->id = $mysqli->insert_id;
		} else {

		}

		parent::close();
	}

	public function update() {
		parent::open();
		$mysqli = parent::get();

		$result = array();

		if($stmt = $mysqli->prepare("UPDATE {$this->table} SET title = ?, body = ?, excerpt = ?, updated_at = ? WHERE id = ?")) {
			$stmt->bind_param('ssssi', $this->title, $this->body, $this->excerpt, $updatedAt, $this->id);

			$updatedAt = date("Y-m-d H:i:s");

			$stmt->execute();

			$stmt->close();
		} else {

		}

		parent::close();
	}

	public function delete() {
		parent::open();
		$mysqli = parent::get();

		if($this->id == null) {
			return false;
		}

		if($stmt = $mysqli->prepare("DELETE FROM {$this->table} WHERE id = ?")) {
			$stmt->bind_param('i', $this->id);

			$stmt->execute();

			$stmt->close();

			$this->id = $mysqli->insert_id;
		} else {

		}

		parent::close();
	}

	public function getId() {
		return $this->id;
	}

	public function getTitle() {
		return $this->title;
	}

	public function setTitle($title) {
		$this->title = $title;
	}

	public function getBody() {
		return $this->body;
	}

	public function setBody($body) {
		$this->body = $body;
		$this->excerpt = $this->generateExcerpt();
	}

	public function getExcerpt() {
		return $this->excerpt;
	}

	public function getCreatedAt() {
		return $this->createdAt;
	}

	public function getUpdatedAt() {
		return $this->updatedAt;
	}

	public function generateExcerpt() {
		if(strlen($this->body) > 500) {
			$str = substr($this->body, 0, 500);
			$whiteSpace = strrpos($str, ' ');
			$str = substr($str, 0, $whiteSpace);
			$str .= '...';
			return $str;
		} else {
			return $this->body;
		}
	}
}