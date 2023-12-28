<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TheEvent
 */
  get_header();
 ?>

<!-- ======= Hero Section ======= -->
 <section id="hero" style=" background: url(<?php the_field('header_bg_image',341);?>) top center;background-size: cover;">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1 class="mb-4 pb-0"><?php the_field('header_title',341); ?></h1>
      <p class="mb-4 pb-0"><?php the_field('header_sub_title',341); ?></p>
      <a href="<?php the_field('header_link',341); ?>" class="glightbox play-btn mb-4"></a>
      <a href="#about" class="about-btn scrollto"><?php _e("About The Event","eventone") ?></a>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about"  style=" background: url(<?php the_field('about_bg_image',341 )?>); background-size: cover;">
      <div class="container position-relative" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-6">
            <h2><?php the_field('about_title',341); ?></h2>
            <p><?php the_field('about_sub_title',341); ?></p>
          </div>
          <div class="col-lg-3">
            <h3><?php the_field('where_title',341); ?></h3>
            <p><?php the_field('where_sub_title',341); ?></p>
          </div>
          <div class="col-lg-3">
            <h3><?php the_field('when_title',341); ?></h3>
            <p><?php the_field('when_sub_title',341); ?></p>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Speakers Section ======= -->
    <section id="speakers">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2><?php _e("Event Speakers","eventone") ?></h2>
          <p><?php _e("Here are some of our speakers","eventone") ?></p>
        </div>

<div class="row">
 
            <?php
              $args= array(
                          'post_type' => 'speaker',
                          'post_status' => 'publish',
                          'order' => 'ASC',
                          );  
                            
                      $query= new WP_Query($args);
                      while($query->have_posts()){
                      $query->the_post();
                      $img_path= wp_get_attachment_image_src(get_post_thumbnail_id(),'large');
              ?>

  <div class="col-lg-4 col-md-6">
            
        <div class="speaker" data-aos="fade-up" data-aos-delay="100">
              <img src="<?php echo $img_path[0]; ?>" style="height:250px;width:400px;">
          <div class="details">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                <p><?php the_field('sub_title'); ?></p>

                <div class="social">
                  <a href="<?php the_field('twitter_url') ;?>"><i class="bi bi-twitter"></i></a>
                  <a href="<?php the_field('facebook_url') ;?>"><i class="bi bi-facebook"></i></a>
                  <a href="<?php the_field('instagram_url') ;?>"><i class="bi bi-instagram"></i></a>
                  <a href="<?php the_field('linkedin_url') ;?>"><i class="bi bi-linkedin"></i></a>
                </div>

          </div>
        </div>
 
  </div>
<?php
}
?>  
</div>   
</section><!-- End Speakers Section -->

    <!-- ======= Schedule Section ======= -->
    <section id="schedule" class="section-with-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2><?php _e("Event Schedule","eventone");?></h2>
          <p><?php _e("Here is our event schedule","eventone") ?></p>
        </div>

        <ul class="nav nav-tabs" role="tablist" data-aos="fade-up" data-aos-delay="100">
          <li class="nav-item">
            <a class="nav-link active" href="#day-1" role="tab" data-bs-toggle="tab"><?php _e("Day 1","eventone"); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#day-2" role="tab" data-bs-toggle="tab"><?php _e("Day 2","eventone"); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#day-3" role="tab" data-bs-toggle="tab"><?php _e("Day 3","eventone"); ?></a>
          </li>
        </ul>

        <h3 class="sub-heading">
        <?php the_field('schedule_discription',169); ?>
        </h3>

        <div class="tab-content row justify-content-center" data-aos="fade-up" data-aos-delay="200">

          <!-- Schdule Day 1 -->
          <div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">

            <div class="row schedule-item">
              <div class="col-md-2"><time><?php the_field('registration_time',169); ?></time></div>
              <div class="col-md-10">
                <h4><?php the_field('schedule_title',169); ?></h4>
                <p><?php the_field('schedule_sub_title',169); ?></p>
              </div>
            </div>

                        <?php 
                        $args = array(
                        'post_type' => 'E_schedule',
                        'post_status' => 'publish',
                        'posts_per_page' => 5,
                        'order' => 'ASC',
                        );
                        $query = new WP_Query($args);
                        while($query->have_posts()){
                          $query->the_post();
                          $img_path = wp_get_attachment_image_src(get_post_thumbnail_id());
                      
                        ?>

            <div class="row schedule-item">
            
              <div class="col-md-2"><time><?php the_field('time') ;?></time></div>
                <div class="col-md-10">
                  <div class="speaker">
                    <img src="<?php echo $img_path[0]; ?>" alt="Brenden Legros">
                  </div>
                  <h4><?php the_title(); ?><span><?php the_field('speaker');?></span></h4>
                  <p><?php the_excerpt(); ?></p>
                </div>
              
            </div>
              
            <?php } ?>
           
          </div>
          <!-- End Schdule Day 1 -->

          <!-- Schdule Day 2 -->
          <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-2">

                            <!-- day 2 -->
                       <?php 
                        $args = array(
                        'post_type' => 'E_schedule',
                        'post_status' => 'publish',
                        'offset' => 5,
                        'posts_per_page' => 5,
                        'order' => 'ASC',
                        );
                        $query = new WP_Query($args);
                        while($query->have_posts()){
                          $query->the_post();
                          $img_path = wp_get_attachment_image_src(get_post_thumbnail_id());
                      
                        ?>

            <!--day2  -->

            <div class="row schedule-item">
              <div class="col-md-2"><time><?php the_field('time') ;?></time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="<?php echo $img_path[0]; ?>" alt="Brenden Legros">
                </div>
                <h4><?php the_title(); ?><span><?php the_field('speaker') ;?></span></h4>
                <p><?php the_excerpt() ;?></p>
              </div>
            </div>
       <?php } ?>
          
          </div>
          <!-- End Schdule Day 2 -->

          <!-- Schdule Day 3 -->
          <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-3">

                      <?php 
                        $args = array(
                        'post_type' => 'E_schedule',
                        'post_status' => 'publish',
                        'offset' => 10,
                        'posts_per_page' => 5,
                        'order' => 'ASC',
                        );
                        $query = new WP_Query($args);
                        while($query->have_posts()){
                          $query->the_post();
                          $img_path = wp_get_attachment_image_src(get_post_thumbnail_id());
                      ?>

            <div class="row schedule-item">
              <div class="col-md-2"><time><?php the_field('time'); ?></time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="<?php echo $img_path[0];?>" alt="Hubert Hirthe">
                </div>
                <h4><?php the_title(); ?><span><?php the_field('speaker');?></span></h4>
                <p><?php the_excerpt(); ?></p>
              </div>
            </div>
     <?php } ?>
          </div>
          <!-- End Schdule Day 2 -->

        </div>

      </div>

    </section><!-- End Schedule Section -->

    <!-- ======= Venue Section ======= -->
    <section id="venue">

      <div class="container-fluid" data-aos="fade-up">

        <div class="section-header">
          <h2><?php _e("Event Venue","eventone") ?></h2>
          <p><?php _e("Event venue location info and gallery","eventone") ?></p>
        </div>

        <div class="row g-0">
          <div class="col-lg-6 venue-map">
          <iframe src="<?php the_field('venue_location',341); ?>"></iframe>
          </div>

          <div class="col-lg-6 venue-info">
            <div class="row justify-content-center">
              <div class="col-11 col-lg-8 position-relative">
                <h3><?php the_field('venue_title',341); ?></h3>
                <p><?php the_field('venue_sub_title',341); ?></p>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="container-fluid venue-gallery-container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-0">
          <!-- custom post types images -->
              <?php
              $args= array(
                          'post_type' => 'venue',
                          'post_status' => 'publish',
                          'order' => 'ASC',
                          );  
                            
                $query= new WP_Query($args);
                while($query->have_posts()){
                $query->the_post();
               $img_path= wp_get_attachment_image_src(get_post_thumbnail_id(),'large');
              ?>
            <!-- end -->
          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
            <a href="<?php echo $img_path[0] ;?>" class="glightbox" data-gall="venue-gallery">
            <img src="<?php echo $img_path[0]; ?>" style="height:250px;width:400px;">
              </a>
            </div>
          </div>
    <?php
    }
    ?>  
      </div>

    </section><!-- End Venue Section -->
    <!-- ======= Hotels Section ======= -->
    <section id="hotels" class="section-with-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2><?php _e("Hotels","eventone") ?></h2>
          <p><?php _e("Here are some nearby hotels","eventone") ?></p>
        </div>
        <!-- Filtering custom posts with Ajax -->
        <!-- Dropdown -->
        <div class="row mb-5">
        <div class="col-sm-12">
        <div class="grid-option  float-end">
          <form>
            <select id="opt_filter" class="selecthotel" name="selecthotel">
              <option  name="Old-Hotels" value="1">
              <?php _e("Old Hotels", "eventone") ?>
              </option>
              <option  name="New-Hotels" value="2">
                <?php _e("New Hotels", "eventone") ?>
              </option>
            </select>
          </form>
        </div>
      </div>
</div>

      <!-- Dropdown end -->

        <div class="row" data-aos="fade-up" data-aos-delay="100" id="hotelContainer">
        <?php 
        $args = array(
          'post_type' => 'hotel',
          'post_status' => 'publish',
          'order' => 'ASC',
          'posts_per_page' => 3,
        );
        $query = new WP_Query( $args);
        while($query->have_posts()){
          $query->the_post();
          $img_path = wp_get_attachment_image_src(get_post_thumbnail_id(),'large');
        
        ?>
          <div class="col-lg-4 col-md-6" id="ajaxTesting">
            <div class="hotel">
              <div class="hotel-img">
                <img src="<?php echo $img_path[0]; ?>"  style="height:250px;width:400px;" alt="Hotel 1" class="img-fluid">
              </div>
              <h3><a href="#"><?php the_title(); ?></a></h3>
              <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p><?php the_excerpt(); ?></p>
            </div>
          </div>
<?php
}
?>
</div>

<div class="text-center">
<Button class="btn btn-danger" id="more_posts" name="more_posts" type="button" >Load More</Button>
</div>

    </section><!-- End Hotels Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery">

      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2><?php _e("Gallery","eventone") ?></h2>
          <p><?php _e("Check our gallery from the recent events","eventone") ?></p>
        </div>
      </div>

      <div class="gallery-slider swiper">   
      <div class="swiper-wrapper align-items-center">
      <?php 
        if(have_rows('gallery',419)){
          while(have_rows('gallery',419)){
          the_row(); 
        ?>
      <div class="swiper-slide">
      <a href="<?php the_sub_field('gallery_image',419); ?>" class="gallery-lightbox">
        <img src="<?php the_sub_field('gallery_image',419);?>" class="img-fluid" alt="">
      </a>
    </div>

<?php 
} }
?>
      </div>
        <div class="swiper-pagination"></div>
      </div>

    </section><!-- End Gallery Section -->

    <!-- ======= Supporters Section ======= -->
    <section id="supporters" class="section-with-bg">

      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2><?php _e("Sponsors","eventone") ?></h2>
        </div>

        <div class="row no-gutters supporters-wrap clearfix" data-aos="zoom-in" data-aos-delay="100">
        <!-- custom post type  -->
        <?php
            if(have_rows('sponsors_detail',432)){
              while(have_rows('sponsors_detail',432)){
              the_row();     
            ?>
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="<?php the_sub_field('sponsers_image',432);?>" class="img-fluid" alt="">
            </div>
          </div>
          <?php } }?>

        </div>

      </div>

    </section><!-- End Sponsors Section -->

    <!-- =======  F.A.Q Section ======= -->
    <section id="faq">

      <div class="container" data-aos="fade-up">
          <div class="section-header">
            <h2><?php _e("F.A.Q","eventone") ?></h2>
          </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
       
           <ul class="faq-list">
           
           <?php 
           if(have_rows('faq',344)){
            // $i;   
            $i = 0;
             while(have_rows('faq',344)){
            the_row(); 
            $i++;  
           ?>
        <li> 
          <div class="col-lg-9">
            <div data-bs-toggle="collapse" class="collapsed question" href="#faq<?php echo $i; ?>">
            <?php the_sub_field('question',344); ?><i class="bi bi-chevron-down icon-show"></i>
            <i class="bi bi-chevron-up icon-close"></i>
           </div>
            <div id="faq<?php echo $i;?>" class="collapse" data-bs-parent=".faq-list">
              <p>
              <?php the_sub_field('answer',344); ?>
              </p>
          </div> 
      </li>
          <?php
            } }
          ?>
        </ul>
               
          </div>
        </div>
      </div>

    </section><!-- End  F.A.Q Section -->
    <!-- ======= Subscribe Section ======= -->
    <section id="subscribe" style="background: url(<?php the_field('subscribe_bg_image',341);?>) center; background-size: cover; no-repeat;">
      <div class="container" data-aos="zoom-in">
        <div class="section-header">
          <h2><?php the_field('newsletter_title',341); ?></h2>
          <p><?php the_field('newsletter_sub_title',341); ?></p>
        </div>

        <form method="POST" action="#">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10 d-flex">
              <input type="text" class="form-control" placeholder="Enter your Email">
              <button type="submit" class="ms-2"><?php _e("Subscribe","eventone");?></button>
            </div>
          </div>
        </form>

      </div>
    </section><!-- End Subscribe Section -->

    <!-- ======= Buy Ticket Section ======= -->
    <section id="buy-tickets" class="section-with-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          
          <h2><?php _e("Buy Tickets","eventone") ?></h2>
          <p><?php _e("Velit consequatur consequatur inventore iste fugit unde omnis eum aut.","eventone") ?></p>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center"><?php _e("Standard Access","eventone") ?></h5>
                <h6 class="card-price text-center"><?php _e("$150","eventone") ?></h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span><?php _e("Regular Seating","eventone") ?></li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span><?php _e("Coffee Break","eventone") ?></li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span><?php _e("Custom Badge","eventone") ?></li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span><?php _e("Community Access","eventone") ?></li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span><?php _e("Workshop Access","eventone") ?></li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span><?php _e("After Party","eventone") ?></li>
                </ul>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#buy-ticket-modal" data-ticket-type="standard-access"><?php _e("Buy Now","eventone");?></button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center"><?php _e("Pro Access","eventone") ?></h5>
                <h6 class="card-price text-center"><?php _e("$250","eventone") ?></h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span><?php _e("Regular Seating","eventone") ?></li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span><?php _e("Coffee Break","eventone") ?></li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span><?php _e("Custom Badge","eventone") ?></li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span><?php _e("Community Access","eventone") ?></li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span><?php _e("Workshop Access","eventone") ?></li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span><?php _e("After Party","eventone") ?></li>
                </ul>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#buy-ticket-modal" data-ticket-type="pro-access"><?php _e("Buy Now","eventone");?></button>
                </div>
              </div>
            </div>
          </div>
          <!-- Pro Tier -->
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center"><?php _e("Premium Access","eventone") ?></h5>
                <h6 class="card-price text-center"><?php _e("$350","eventone") ?></h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span><?php _e("Regular Seating","eventone") ?></li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span><?php _e("Coffee Break","eventone") ?></li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span><?php _e("Custom Badge","eventone") ?></li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span><?php _e("Community Access","eventone") ?></li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span><?php _e("Workshop Access","eventone") ?></li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span><?php _e("After Party","eventone") ?></li>
                </ul>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#buy-ticket-modal" data-ticket-type="premium-access"><?php _e("Buy Now","eventone");?></button>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Modal Order Form -->
      <div id="buy-ticket-modal" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><?php _e("Buy Tickets","eventone") ?></h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <form method="POST" action="#">
                        <div class="form-group">
                          <input type="text" class="form-control" name="your-name" placeholder="Your Name">
                        </div>
                        <div class="form-group mt-3">
                          <input type="text" class="form-control" name="your-email" placeholder="Your Email">
                        </div>
                        <div class="form-group mt-3">
                          <select id="ticket-type" name="ticket-type" class="form-select">
                            <option value=""><?php _e("-- Select Your Ticket Type --","eventone") ?></option>
                            <option value="standard-access"><?php _e("Standard Access","eventone") ?></option>
                            <option value="pro-access"><?php _e("Pro Access","eventone") ?></option>
                            <option value="premium-access"><?php _e("Premium Access","eventone") ?></option>
                          </select>
                        </div>
                      <div class="text-center mt-3">
                      <button type="submit" class="btn"><?php _e("Buy Now","eventone");?></button>
                      </div>
                    </form>
              </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

    </section><!-- End Buy Ticket Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2><?php _e("Contact Us","eventone") ?></h2>
          <p><?php _e("Nihil officia ut sint molestiae tenetur.","eventone") ?></p>
        </div>

    <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="bi bi-geo-alt"></i>
              <h3><?php _e("Address","eventone") ?></h3>
              <address><?php the_field('address',341); ?></address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="bi bi-phone"></i>
              <h3><?php _e("Phone Number","eventone") ?></h3>
              <p><a href=""><?php the_field('phone_number',341); ?></a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="bi bi-envelope"></i>
              <h3><?php _e("Email","eventone") ?></h3>
              <p><?php the_field('email',341); ?></a></p>
            </div>
          </div>
    </div>
               
              <div class="row text-center">
                    <?php echo do_shortcode('[contact-form-7 id="87bfaca" title="Contact Form Event"]');  ?>
              </div>
    </div>
    </section><!-- End Contact Section -->
  </main><!-- End #main -->

<?php get_footer(); ?>

