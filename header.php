<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php wp_head();?>
</head>
<body <?php body_class();?>>
 <div class="header-section">
    <h2>Header Area should go here</h2>
    <div class="header-right">
        <h3>Total Products:</h3>
        <?php if ( is_active_sidebar( 'mini-cart' ) ) : ?>
        <div class="mini-cart">
        <?php dynamic_sidebar( 'mini-cart' ); ?>
        </div>
        <?php endif; ?>


    </div>
 </div>
