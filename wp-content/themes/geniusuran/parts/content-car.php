<article <?php post_class('custom_car_class')?> id="post-<?php the_ID();?>" data-post-id="<?php the_ID();?>">
	<?php
    if(has_post_thumbnail(get_the_ID())){
        the_post_thumbnail('car-cover');
        get_the_post_thumbnail(get_the_ID(), array(170, 170));
    }
    ?>
	<h1><?php the_title();?></h1>
	<div><p><?php the_content();?></p></div>
    <div>
        <?php
            echo get_post_meta(get_the_ID(), 'custom_price', true). '<br>';
        echo get_post_meta(get_the_ID(), 'custom_engine_type', true)
        ?>
    </div>
	<a href="<?php the_permalink();?>">Read More</a>
</article>