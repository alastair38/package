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

                        <div class="address-phone">

                        <?php get_template_part( 'partials/content', 'contact' ); ?>

                        </div>

<?php

$location = get_field('contact_map');
if( $location ):
?>
                                <div class="map" itemscope itemprop="hasMap" itemtype="http://schema.org/Map">
                                <link itemprop="mapType" href="http://schema.org/VenueMap" />
                                <a href="http://maps.google.co.uk/maps/place/<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>/@<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>,15z" target="_blank" class="show-for-large-only"><img src="https://maps.googleapis.com/maps/api/staticmap?zoom=13&size=600x300&scale=2&maptype=roadmap
          &markers=color:green%7C<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>" alt="The map showing our locations"></a><span>Keyboard users can hit 'Enter' to view the map full screen in a new window</span>

                             <a href="geo:<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>;u=35" class="hide-for-large-only"><img src="https://maps.googleapis.com/maps/api/staticmap?zoom=15&size=600x300&scale=2&maptype=roadmap
          &markers=color:green%7C<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>"  alt="The map showing our locations"></a>
                              </div>
<?php endif; ?>



				    </div> <!-- end #main -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
