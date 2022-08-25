<?php get_header(); ?>

<div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
    
        
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<?php get_template_part('parts/content');?>
		<?php endwhile;?>
         <?php echo paginate_links();?>
    <?php else:?>
            no posts
		<?php endif;?>
    </div>
</div>
<?php

get_footer();
