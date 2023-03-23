<?php
  /**
   * WooCommerce content
   *
   * This template is used to display the main content of various WooCommerce pages
   */
  get_header(); // Include header template
?>
<h2 class="page-title"><?php woocommerce_page_title(); ?></h2>

    <?php woocommerce_content(); ?>

<?php get_footer(); // Include footer template ?>
