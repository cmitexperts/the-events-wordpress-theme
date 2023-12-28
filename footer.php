<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TheEvent
 */

?>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
      <img src="<?php the_field('footer_image',565); ?>" alt="">
            <p>
              <?php the_field('footer_text',565); ?>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4><?php _e("Useful Links","eventone") ?></h4>
            <?php wp_nav_menu(
                  array('theme_location' => 'secondary-menu')
                   ); ?>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4><?php _e("Useful Links","eventone") ?></h4>
            <?php wp_nav_menu(
                  array('theme_location' => 'secondary-menu')
                   ); ?>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4><?php _e("Contact Us","eventone") ?></h4>
            <p>
           <?php the_field('footer_contact_detail',565); ?>
            </p>

            <div class="social-links">
              <a href="<?php the_field('facebook',565) ;?>" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="<?php the_field('linkedin',565) ;?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
              <a href="<?php the_field('instagram',565) ;?>" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="<?php the_field('twitter',565) ;?>" class="twitter"><i class="bi bi-twitter"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
       <?php the_field('copyright',565); ?>
      </div>
      <div class="credits">
        <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent
      -->
      <?php _e("Designed by ","eventone") ?> <a href="<?php the_field('site_link',565); ?>"><?php the_field('site_cradits',565); ?></a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/aos/aos.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/custom.js"></script>

      <script>
      var ajax_url = '<?php echo admin_url('admin-ajax.php'); ?>';
      </script>

 

</body>

</html>
