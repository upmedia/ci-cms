<h2>Recently modified articles</h2>
<?php if(count($recent_articles)): ?>
<ul>
<?php foreach($recent_articles as $article): ?>
	<li><?php echo anchor('admin/article/edit/'.$article->id, $article->title) .' - ' . date('Y-m-d', strtotime($article->modified)); ?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>