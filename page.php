<?php get_header();

/* add default image to theme files and load it from template directory <?php echo get_template_directory_uri(); ?>/default.png */

if( get_field('logo_image') )
{
    echo '<div id="content" style="background: url(' . get_field('logo_image') . '); background-position: center; background-size: contain;">';
}
else
{
    echo '<div id="content" style="background: url(https://ununsplash.imgix.net/photo-1423753623104-718aaace6772?q=75&fm=jpg&s=1ffa61419561b5c796bca3158e7c704c); background-position: center; background-size: cover;">';
}

?>


				<div id="inner-content" class="row">

				    <div id="main" class="large-12 medium-8 columns" role="main">



                       	<div class="slider-wrapper">

                            <div class="controls">
                                <button class="prev"></button>

                                <button class="next"></button>
                            </div>
                            <div class="slider" id="testslides">
                                <div>
                                   <?php the_field('slide_one'); ?>
                                </div>
                                <div>
                                    <?php the_field('slide_two'); ?>
                                </div>
                            </div>
                        </div>




    				</div> <!-- end #main -->



				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
