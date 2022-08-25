<?php
/*
Plugin Name: uranCensuzur
Description: цензура
Version: 1.0
Author: Yura Misko
*/
define('URANCENSUZUR_DIR', plugin_dir_path(__FILE__));

function urancenzur_filter_the_comments($the_contents)
{
	static  $badwords=array();
	if(empty($badwords)){
		$badwords=explode(',', file_get_contents(URANCENSUZUR_DIR.'bedwords.txt'));
	}
	for($i=0, $c=count($badwords);  $i<$c;$i++){
		$the_contents=preg_replace('#'.$badwords[$i].'#iu', '{погане слово}', $the_contents);
	}
	return $the_contents;
}
add_filter('get_comment_text', 'urancenzur_filter_the_comments');
function urancenzur_filter_the_content($the_content)
{
    static  $badwords=array();
    if(empty($badwords)){
        $badwords=explode(',', file_get_contents(URANCENSUZUR_DIR.'bedwords.txt'));
    }
    for($i=0, $c=count($badwords); $i<$c; $i++){
        $the_content=preg_replace('#'.$badwords[$i].'#iu', '{погане слово}', $the_content);
    }
    return str_replace("WordPress", 'Какааа', $the_content);
}
add_filter('the_content', 'urancenzur_filter_the_content');