<!-- main content -->
<div class="span9">
	<div class="row">
		<div class="span9"><?php if(isset($articles[0])) echo get_excerpt($articles[0]) ?></div>
	</div>
	<div class="row">
		<div class="span5"><?php if(isset($articles[1])) echo get_excerpt($articles[1]) ?></div>
	<div class="span4"><?php if(isset($articles[2])) echo get_excerpt($articles[2], 30) ?></div>
	</div>
	

</div>

<!-- sidebar -->
<aside class="span3 sidebar">
	<h2>Recent archive</h2>
	<?php echo anchor($news_archive_link, '+ News Archive'); ?>
	<?php 
	$articles = array_slice($articles, 2);
	echo article_links($articles);
	 ?>
</aside>