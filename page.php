<?php get_header();

if( get_field('logo_image') )
{
    echo '<div id="content" style="background: url(' . get_field('logo_image') . '); background-position: center; background-size: contain;">';
}
else
{
    echo '<div id="content" style="background: url(' . get_template_directory_uri() . '/library/images/background.jpg); background-position: center; background-size: cover;">';
}
?>
				<div id="inner-content" class="row">

				    <div id="main" class="large-12 columns" role="main">

                     <?php get_template_part( 'partials/loop', 'slider' ); ?>

    				</div> <!-- end #main -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

    				<?php

// The Query
$page = get_page_by_path( 'about' );
$permalink = get_permalink($page->ID);

echo '<div id="about" class="large-4 columns" role="complementary"><a href="' . $permalink . '">' . $page->post_title . '<i class="fi-torsos-all"></i></a></div>';

$page = get_page_by_path( 'contact' );
$permalink = get_permalink($page->ID);

echo '<div id="contact" class="large-4 columns" role="complementary"><a href="' . $permalink . '">' . $page->post_title . '<i class="fi-mail"></i></a></div>';

$page = get_page_by_path( 'blog' );
$permalink = get_permalink($page->ID);

echo '<div id="news" class="large-4 columns" role="complementary"><a href="' . $permalink . '">' . $page->post_title . '<i class="fi-rss"></i></a></div>';

?>

             <?php get_template_part( 'partials/loop', 'latest' ); ?>



<?php get_footer(); ?>
