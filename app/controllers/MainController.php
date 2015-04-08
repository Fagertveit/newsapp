<?php namespace Newsapp\Controller;

use Newsapp\Models\Article;
use Newsapp\Models\User;
use Newsapp\Core\Crypt;

class MainController {
	public function listArticles() {
		$model = new Article();
		$articles = $model->listing(0, 10);

		include(PATH_VIEWS . '/header.php');
		include(PATH_VIEWS . '/article/list.php');
		include(PATH_VIEWS . '/footer.php');
	}

	public function readArticle($id) {
		$article = new Article($id);

		include(PATH_VIEWS . '/header.php');
		include(PATH_VIEWS . '/article/show.php');
		include(PATH_VIEWS . '/footer.php');
	}

	public function editArticle($id) {
		# Must be admin to post new article
		if(!isset($_SESSION['admin'])) {
			header('location: /');
		}
		
		$article = new Article($id);
		include(PATH_VIEWS . '/header.php');
		include(PATH_VIEWS . '/article/edit.php');
		include(PATH_VIEWS . '/footer.php');
	}

	public function createArticle() {
		# Must be admin to post new article
		if(!isset($_SESSION['admin'])) {
			header('location: /');
		}
		include(PATH_VIEWS . '/header.php');
		include(PATH_VIEWS . '/article/create.php');
		include(PATH_VIEWS . '/footer.php');
	}

	public function showLogin() {
		include(PATH_VIEWS . '/header.php');
		include(PATH_VIEWS . '/login.php');
		include(PATH_VIEWS . '/footer.php');
	}

	public function loginUser() {
		$model = new User();
		$user = $model->authenticate($_POST['email'], $_POST['password']);

		if($user['status'] == "success") {
			$_SESSION['email'] = $model->getEmail();
			$_SESSION['key'] = $model->getKey();
			if($model->getAdmin()) {
				$_SESSION['admin'] = $model->getAdmin();
			}

			header("location: /");
		} else {
			header("location: /login?err=fail&msg={$user['msg']}");
		}
	}

	public function logout() {
		session_destroy();

		header("location: /");
	}

	public function page404() {
		include(PATH_VIEWS . '/header.php');
		include(PATH_VIEWS . '/page404.php');
		include(PATH_VIEWS . '/footer.php');
	}
}