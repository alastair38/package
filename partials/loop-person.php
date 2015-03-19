<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">

	<header class="article-header">
		<h1 class="entry-title single-title" itemprop="name"><?php the_title(); ?></h1>
    </header> <!-- end article header -->

    <section class="entry-content" itemprop="articleBody">
        <div class="person-contact large-4 columns">
		<?php the_post_thumbnail('medium', array('itemprop' => 'image')); ?>
		<?php get_template_part( 'partials/content', 'contact' ); ?>
        </div>
        <div class="large-8 columns">
		<?php the_content(); ?>
        </div>



	</section> <!-- end article section -->

</article> <!-- end article -->
