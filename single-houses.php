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
											
						$postData = get_post_meta( get_the_ID() );		
						
						$photos_query = $postData['gallery_data'][0];
						$photos_array = unserialize($photos_query);
						$url_array = $photos_array['image_url'];
						$count = sizeof($url_array);
						
						for( $i=0; $i<$count; $i++ ){
						?>
						<div class="col-sm-4">
								<img class="img-fluid gallery-img" src="<?php echo $url_array[$i]; ?>" alt=""/>
						</div>
						<?php
							if ($i == 0) { $i=0; }
						}
						
					?>
					
            </div>
        </div>
    </div>

<?php endwhile; ?>
<?php get_footer(); ?>
