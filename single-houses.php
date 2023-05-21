<?php
get_header(); 

// Start the Loop.
while ( have_posts() ) : the_post(); ?>

    <!--Photos-->
    <div class="photos">
        <div class="container">
            <div class="details-left">
                <h2>Photos</h2>
                <div class="row">

				<?php
				global $post;
				if( metadata_exists( 'post', $post->ID, 'gallery_data' ) ){
					$photos_query = get_post_meta( $post->ID, 'gallery_data', true );
					$photos_array = maybe_unserialize($photos_query);
					$url_array = $photos_array['image_url'];
					$count = sizeof($url_array);

					for( $i=0; $i<$count; $i++ ){
						?>
						<div class="img_single_box">
							<img class="gallery-img" src="<?php echo $url_array[$i]; ?>" alt=""/>
						</div>
						<?php 
						}
				} else {
					echo __('Add images to gallery first','yourtheme');
				}
				?>
					
            </div>
        </div>
    </div>

<?php endwhile; ?>
<?php get_footer(); ?>
