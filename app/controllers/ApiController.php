<?php namespace Newsapp\Controller;

use Newsapp\Models\Article;
use Newsapp\Models\User;

class ApiController {

	public function listArticles() {
		$model = new Article();
		$articles = $model->listing(0, 10);

		header('Content-Type: application/json');
		echo json_encode($articles);
	}

	public function readArticle($id) {
		$article = new Article($id);

		$json = array();
		$json['id'] = $article->getId();
		$json['title'] = $article->getTitle();
		$json['body'] = $article->getBody();
		$json['excerpt'] = $article->getExcerpt();
		$json['created_at'] = $article->getCreatedAt();
		$json['updated_at'] = $article->getUpdatedAt();

		header('Content-Type: application/json');
		echo json_encode($json);
	}

	public function createArticle() {
		$user = new User();
		if(isset($_POST['user_email']) && isset($_POST['user_key'])) {
			$valid = $user->isValidUser($_POST['user_email'], $_POST['user_key']);
		} else {
			$valid = false;
		}

		if(!$valid) {
			header('Content-Type: application/json');
			echo "{\"status\":\"fail\",\"msg\":\"Not a valid user\"}";
			exit;
		}

		$article = new Article();

		$article->setTitle($_POST['title']);
		$article->setBody($_POST['body']);

		$article->save();

		$json = array();
		$json['id'] = $article->getId();
		$json['title'] = $article->getTitle();
		$json['body'] = $article->getBody();
		$json['created_at'] = $article->getCreatedAt();
		$json['updated_at'] = $article->getUpdatedAt();

		header('Content-Type: application/json');
		echo json_encode($json);
	}

	public function updateArticle($id) {
		$user = new User();
		if(isset($_POST['user_email']) && isset($_POST['user_key'])) {
			$valid = $user->isValidUser($_POST['user_email'], $_POST['user_key']);
		} else {
			$valid = false;
		}

		if(!$valid) {
			header('Content-Type: application/json');
			echo "{\"status\":\"fail\",\"msg\":\"Not a valid user\"}";
			exit;
		}

		$article = new Article($id);

		$article->setTitle($_POST['title']);
		$article->setBody($_POST['body']);

		$article->save();

		$json = array();
		$json['id'] = $article->getId();
		$json['title'] = $article->getTitle();
		$json['body'] = $article->getBody();
		$json['created_at'] = $article->getCreatedAt();
		$json['updated_at'] = $article->getUpdatedAt();

		header('Content-Type: application/json');
		echo json_encode($json);
	}

	public function deleteArticle($id) {
		$user = new User();
		if(isset($_POST['user_email']) && isset($_POST['user_key'])) {
			$valid = $user->isValidUser($_POST['user_email'], $_POST['user_key']);
		} else {
			$valid = false;
		}

		if(!$valid) {
			header('Content-Type: application/json');
			echo "{\"status\":\"fail\",\"msg\":\"Not a valid user\"}";
			exit;
		}

		$article = new Article($id);
		$article->delete();

		header('Content-Type: application/json');
		echo "{\"status\":\"ok\"}";
	}

	public function page404() {
		header('Content-Type: application/json');
		echo "{\"status\":\"404\"}";
	}
}