<article <?php post_class()?> id="post-<?php the_ID();?>" data-post-id="<?php the_ID();?>">
	<h1 class="display-4 text-uppercase text-center mb-5">
		<?php the_title();?>
	</h1>
	<p><?php the_content();?></p>
</article>