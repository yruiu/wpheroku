<?php
function geniusuran_acf_metaboxes(){
	acf_add_local_field_group(
		array(
			'key'=>'asf_carsettings',
			'title'=>'Car Settings for acf from code',
			'fields'=>array(
				array(
					'key'=>'custom_price',
					'label'=>'Car Price',
					'name'=>'custom_price',
					'type'=>'text',
				),
				array(
					'key'=>'custom_engine_type',
					'label'=>'custom_engine_type',
					'name'=>'custom_engine_type',
					'type'=>'select',
					'choices'=>array(
						'manual'=>'Manual',
						'automatic'=>'Automatic'
					),
					'allow_null'=>1,
				)
			),
			'location'=>array(
				array(
				array(
					'param'=>'post_type',
					'operator'=>'==',
					'value'=>'car',
				)
				)
			),
			'menu_order'=>0,
			'position'=>'normal',
			'style'=>'default',
			'label+placement'=>'top',
			'instruction_placement'=>'label',
			'hode_one_screen'=>array(),

		)
	);
}
add_action('acf/init','geniusuran_acf_metaboxes');