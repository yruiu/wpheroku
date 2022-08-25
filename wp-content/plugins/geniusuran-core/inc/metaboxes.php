<?php
/*
 * geniusuran name of theme
 * */
function geniusuran_add_metabox(){
	add_meta_box('car_metabox', esc_html__('Cars Settings','geniusuran'),'geniusuran_cars_metabox_html','car', 'normal', 'high');
}
add_action('add_meta_boxes', 'geniusuran_add_metabox');
function geniusuran_cars_metabox_html($post){
	$car_price=get_post_meta($post->ID, 'car_price', true);
	$car_engine=get_post_meta($post->ID, 'car_engine', true);
	wp_nonce_field('geniusuranrandomstring','_carmetabox')
	?>

	<p>
		<label for="car_price"><?php esc_html_e('Car Price', 'geniusuran')?></label>
		<input type="text" id="car_price" name="car_price" value="<?php echo esc_attr($car_price)?>"
	</p>
	<p>
		<label for="car_engine"><?php esc_html_e('Car engine', 'geniusuran')?></label>
		<select id="car_engine" name="car_engine">
			<option value="">Select Engine</option>
			<option value="manual" <?php if($car_engine=='manual'){echo 'selected';} ?>>Manual</option>
			<option value="automatic"<?php if($car_engine=='manual'){echo 'automatic';} ?>>Automatic</option>
		</select>
	</p>

	<?php

}
function geniusuran_save_metabox($post_id, $post){
	if(!isset($_POST['_carmetabox']) || ! wp_verify_nonce($_POST['_carmetabox'], 'geniusuranrandomstring')){
		return $post_id;
	}

	if(defined("DOING_AUTOSAVE")&& DOING_AUTOSAVE){
		return $post_id;
	}
	if($post->post_type!='car'){
		return $post_id;
	}
	$post_type=get_post_type_object($post->post_type);
	if(!current_user_can($post_type->cap->edit_post, $post_id)){
		return $post_id;
	}
	if(isset($_POST['car_price'])){
		update_post_meta($post_id, 'car_price',sanitize_text_field( $_POST['car_price']));
	}
	else{
		delete_post_meta($post_id, 'car_price');
	}
	if(isset($_POST['car_engine'])){
		update_post_meta($post_id, 'car_engine',sanitize_text_field( $_POST['car_engine']));
	}
	else{
		delete_post_meta($post_id, 'car_engine');
	}
	return $post_id;
}
add_action('save_post', 'geniusuran_save_metabox', 10,2 );
