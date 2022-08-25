<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Geniusuran
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>
<?php global $geniusuran_options; ?>
<div class="container-fluid bg-dark py-3 px-lg-5 d-none d-lg-block">
    <div class="row">
        <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center">
                <?php if($geniusuran_options['phone']){?>
                <a class="text-body pr-3" href=""><i class="fa fa-phone-alt mr-2"></i><?php echo esc_html__($geniusuran_options['phone'])?></a>
                <span class="text-body">|</span>
                <?php } ?>
                <?php if($geniusuran_options['email']){?>
                <a class="text-body px-3" href="mailto:<?php echo esc_html__($geniusuran_options['email'])?>"><i class="fa fa-envelope mr-2"></i><?php echo esc_html__($geniusuran_options['email'])?></a>
                <?php }?>
            </div>
        </div>
        <div class="col-md-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <?php if($geniusuran_options['fb']){?>
                <a class="text-body px-3" href="<?php echo esc_url($geniusuran_options['fb'])?>">
                    <i class="fab fa-facebook"></i>
                </a>
                <?php }?>
                <?php if($geniusuran_options['twi']){?>
                <a class="text-body px-3" href="<?php echo esc_url($geniusuran_options['twi'])?>">
                    <i class="fab fa-twitter"></i>
                </a>
                <?php }?>
                <?php if($geniusuran_options['in']){?>
                <a class="text-body px-3" href="<?php echo esc_url($geniusuran_options['in'])?>">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                         width="24" height="24"
                         viewBox="0 0 64 64"
                         style=" fill:#000000;"><path d="M32,6C17.641,6,6,17.641,6,32c0,14.359,11.641,26,26,26s26-11.641,26-26C58,17.641,46.359,6,32,6z M25,44h-5V26h5V44z M22.485,24h-0.028C20.965,24,20,22.888,20,21.499C20,20.08,20.995,19,22.514,19c1.521,0,2.458,1.08,2.486,2.499 C25,22.887,24.035,24,22.485,24z M44,44h-5v-9c0-3-1.446-4-3-4c-1.445,0-3,1-3,4v9h-5V26h5v3c0.343-0.981,1.984-3,5-3c4,0,6,3,6,8 V44z"></path></svg>
                </a>
                <?php }?>
                <?php if($geniusuran_options['ins']){?>
                <a class="text-body px-3" href="<?php echo esc_url($geniusuran_options['ins'])?>">
                    <i class="fab fa-instagram"></i>
                </a>
                <?php }?>
                <?php if($geniusuran_options['yout']){?>
                <a class="text-body pl-3" href="<?php echo esc_url($geniusuran_options['yout'])?>">
                    <i class="fab fa-youtube"></i>
                </a>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid position-relative nav-bar p-0">
    <div class="position-relative px-lg-5" style="z-index: 9;">
        <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
            <a href="<?php echo esc_url(home_url('/'))?>" class="navbar-brand">
                <h1 class="text-uppercase text-primary mb-1"><?php esc_html(bloginfo('name'));?></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'header_nav',
                        'menu_class'=>'navbar-nav ml-auto py-0',
                        'container'=>'',
                        'add_li_class'=>'"nav-item nav-link'
                    ))


                ?>
            </div>
        </nav>
    </div>
</div>
<?php if(!is_front_page()){
    $bg_image='';
    $bds=get_the_post_thumbnail_url( get_the_ID(), 'full');
    if($bds){
        $bg_image='"background: linear-gradient(rgba(28, 30, 50, .9), rgba(28, 30, 50, .9)), url('.$bds.') center"';
    }
    else if($geniusuran_options['header_image']['url']){
        $bg_image='"background: linear-gradient(rgba(28, 30, 50, .9), rgba(28, 30, 50, .9)), url('.$geniusuran_options['header_image']['url'].')"';
    }

    ?>
<div class="container-fluid page-header"style=<?php echo $bg_image?>>

    <h1 class="display-3 text-uppercase text-white mb-3"><?php 
    if(is_date()){
        the_archive_title( '', '' );
    }
    else if(is_search()){

        printf( esc_html__( 'Search Results for: %s', 'geniusuran' ), '<span>' . get_search_query() . '</span>' );

    }
    else{
        wp_title("");
    }; ?></h1>
</div>
<?php }?>
