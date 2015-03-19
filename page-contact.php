<?php
/*
Template Name: Contact Page (full width)
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="row">

				    <div id="main" class="large-12 columns first" role="main">

					    <?php get_template_part( 'partials/loop', 'page' ); ?>


					    <?php if( get_field('contact_address') ): ?>
                        <div class="address-phone">
                                    <h5>Address</h5>
                                    <?php the_field('contact_address'); ?>
                                    <?php endif; ?>

                                     <?php if( get_field('phone_landline') ): ?>
                                    <h5>Phone</h5>
                                    <?php the_field('phone_landline'); ?>
                                    <?php endif; ?>

                                      <ul id="contact-details">
					     <?php if( get_field('email') ): ?>
                                <li class="email"><a href="mailto:<?php the_field('email'); ?>" target="_blank"><i class="fi-mail"></i></a></li>
                            <?php endif; ?>

					     <?php if( get_field('twitter') ): ?>
                             <li><a href="<?php the_field('twitter'); ?>" target="_blank"><i class="fi-social-twitter"></i></a></li>
                                    <?php endif; ?>

                        <?php if( get_field('linkedin') ): ?>
                                    <li><?php the_field('linkedin'); ?></li>
                                    <?php endif; ?>

            </ul>

                         </div>
<?php

$location = get_field('contact_map');
if( $location ):
?>
                                <div class="map">
                                <a href="http://maps.google.co.uk/maps/place/<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>/@<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>,15z" target="_blank" title="View map full screen" class="show-for-large-only"><img src="https://maps.googleapis.com/maps/api/staticmap?zoom=13&size=600x300&scale=2&maptype=roadmap
          &markers=color:green%7C<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>"></a><span>Keyboard users can hit 'Enter' to view the map full screen</span>

                             <a href="geo:<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>;u=35" class="hide-for-large-only"><img src="https://maps.googleapis.com/maps/api/staticmap?zoom=15&size=600x300&scale=2&maptype=roadmap
          &markers=color:green%7C<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>"></a>
                              </div>
<?php endif; ?>



				    </div> <!-- end #main -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
