<article class="col-lg-12">
	<header>
		<h3><?php echo $article->getTitle(); ?></h3>
		<small class="date">Published <?php echo $article->getCreatedAt(); ?></small>
	</header>
	<p><?php echo $article->getBody(); ?></p>
</article>
<?php if(isset($_SESSION['admin'])): ?>
<div class="delete-btn pull-right" data-id="<?php echo $article->getId(); ?>"><span class="glyphicon glyphicon-trash"></span></div>
<div class="edit-btn pull-right" data-id="<?php echo $article->getId(); ?>"><span class="glyphicon glyphicon-edit"></span></div>
<?php endif; ?> 
