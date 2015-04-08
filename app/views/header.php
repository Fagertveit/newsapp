<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Newsapp</title>
	<link rel="stylesheet" href="<?php echo PATH_PUBLIC; ?>/css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">

		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
				<a class="navbar-brand" href="/">
					Home
				</a>
				</div>
				<?php if(isset($_SESSION['admin'])): ?>
				<input id="user_email" type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>" />
				<input id="user_key" type="hidden" name="key" value="<?php echo $_SESSION['key']; ?>" />
				<a href="/logout" class="btn btn-default navbar-btn pull-right">Logout</a> 
				<a href="/article/create" class="btn btn-primary navbar-btn pull-right" style="margin-right: 10px;"><span class="glyphicon glyphicon-add"></span>Create Article</a>
				<?php elseif(isset($_SESSION['email'])): ?>
				<a href="/logout" class="btn btn-default navbar-btn pull-right">Logout</a> 
				<?php else: ?>
				<a href="/login" class="btn btn-default navbar-btn pull-right">Sign in</a>
				<?php endif; ?>
			</div>
		</nav>
		


