<?php

class Elementor_About_Widget extends \Elementor\Widget_Base{

    public function get_name()
    {
        return 'geniusuran_about';
    }
    public function get_title(){
        return esc_html__('geniusuran_about', 'geniusuran');
    }
    public function get_icon()
    {
        return 'fa fa-code';
    }
    public function get_categories()
    {
        return ['general'];
    }
    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label'=>__('Content', 'geniusuran'),
                'tab'=>\Elementor\Controls_Manager::TAB_CONTENT,
            ],

        );
        $this->add_control(
            'title_geniusuran',
            [
                'label'=>'Title',
                'type'=>\Elementor\Controls_Manager::TEXT,
                'default'=>'Default title',
                'placeholder'=>'https://your-link.com',
            ]
        );
        $this->add_control(
            'url',
            [
                'label'=>'URL to embed',
                'type'=>\Elementor\Controls_Manager::TEXT,
                'input_type'=>'url',
                'placeholder'=>'https://your-link.com',
            ]
        );
        $this->add_control(
            'image_geniusuran',
            [
                'label'=>'image',
                'type'=>\Elementor\Controls_Manager::MEDIA,
                'default'=>[
                    'url'=>\Elementor\Utils::get_placeholder_image_src(),
                ]

            ]
        );
        $this->end_controls_section();
    }
    protected function render(){
        $settings=$this->get_settings_for_display();
        echo $settings['title_geniusuran'];
        echo $settings['image']['url'];
    }
}