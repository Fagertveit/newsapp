	<article>
		<header>
			<h1>Edit news article</h1>
		</header>
		<div>
			<form id="update-article">
				<input type="hidden" name="id" value="<?php echo $article->getId(); ?>" />
				<div class="form-group">
					<label for="title">Title</label>
					<input class="form-control" type="text" name="title" placeholder="Title" value="<?php echo $article->getTitle(); ?>" />
				</div>
				<div class="form-group">
					<label for="body">Body</label>
					<textarea class="form-control" rows="16" name="body"><?php echo $article->getBody(); ?></textarea>
				</div>
				<button class="btn btn-primary pull-right" type="submit">Edit Article</button>
			</form>
		</div>
	</article>