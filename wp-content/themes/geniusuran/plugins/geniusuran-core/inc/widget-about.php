<?php
class genuusuran_About_Widget extends WP_Widget{
	function __construct(  ) {
		parent::__construct('genuusuran_about_widget', esc_html__('About Widget', 'geniusuran'), array('description'=>esc_html__('Our First Widget', 'geniusuran')));
	}
	public  function widget( $args, $instance ) {
		extract($args);
		$title=apply_filters('widget_title', $instance['title']);
		$text=apply_filters('the_content', $instance['text']);
		echo $before_widget;
		if($title){
			echo $before_title. esc_html($title). $after_title;
		}
		if($text){
			echo wp_kses_post($text);
		}

        ?>
		<?php

		$args=array(
			'post_type'=>'post',
			'posts_per_page'=>-1,

		);
		$blogpost=new WP_Query($args) ;
		?>
		<?php if($blogpost->have_posts()): while($blogpost->have_posts()): $blogpost->the_post(); ?>
			<?php get_template_part('parts/content');?>
		<?php endwhile; else:?>
            no posts
		<?php endif;
		wp_reset_postdata();
		echo $after_widget;
	}
	public function form($instance){
		if(isset($instance['title'])){
			$title=$instance['title'];
		} else{
			$title='';
		}
		if(isset($instance['text'])){
			$text=$instance['text'];
		} else{
			$text='';
		};
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title');?>"><?php esc_html_e('Title', 'geniusuran')?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" value="<?php echo esc_attr($title)?>" type="text">

		</p>
		<p>
			<label for="<?php echo $this->get_field_id('text');?>">
				<?php esc_html_e('Title', 'geniusuran')?>
			</label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('text');?>" name="<?php echo $this->get_field_name('text');?>" type="text"><?php echo esc_attr($text)?></textarea>

		</p>
	<?php
	}
	public function update( $new_instance, $old_instance ) {
		$instance=$old_instance;
		$instance['title']=strip_tags($new_instance['title']);
		$instance['text']=strip_tags($new_instance['text']);
		return $instance;
	}
}
function geniusuran_regi_ab_wid(){
register_widget('genuusuran_About_Widget');
}
add_action( 'widgets_init', 'geniusuran_regi_ab_wid' );
