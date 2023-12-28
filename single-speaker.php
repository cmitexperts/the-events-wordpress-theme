<?php GET_HEADER();?>   
    <div class="container-fluid border-bottom" id="speaker_container">
        <?php $img_path= wp_get_attachment_image_src(get_post_thumbnail_id(),'large'); ?>
        <div class="row pb-5" style="background-color:#040919;">
            
            <div class="row text-center py-3 m-0 ">
                <h4 class="text-white"><?php the_title(); ?></h4>
                <a href=""><?php the_category();?></a>
            </div>

                 <div class="col-6 d-flex align-items-center justify-content-center">
                <img src="<?php echo $img_path[0]; ?>"  style="height:400px;width:300px;">
                </div>

                <div class=" col-6 text-white">
                <?php the_content(); ?>
                <?php 
                // comment_template(); 
                ?>
                </div>
        </div>
    </div>
<?php get_footer();?>
