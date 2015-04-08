<?php foreach($articles as $article): ?>
	<div class="col-lg-6 pull-left ">
		<article class="col-lg-12 news-article" data-id="<?php echo $article['id']; ?>">
			<header>
				<h3><?php echo $article['title']; ?></h3>
				<small class="date">Published <?php echo $article['created_at']; ?></small>
			</header>
			<p><?php echo $article['excerpt']; ?></p>
		</article>
		<?php if(isset($_SESSION['admin'])): ?>
		<div class="delete-btn pull-right" data-id="<?php echo $article['id']; ?>"><span class="glyphicon glyphicon-trash"></span></div>
		<div class="edit-btn pull-right" data-id="<?php echo $article['id']; ?>"><span class="glyphicon glyphicon-edit"></span></div>
		<?php endif; ?> 
	</div>
<?php endforeach; ?>