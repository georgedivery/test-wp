<?php get_header(); ?>

<div class="main">
  <div class="shell">
    <section class="simple-section dark">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
        <article class="article">
          <div class="article-title">
            <h3>
              <?php the_title(); ?>
            </h3>
          </div><!-- /.article-title -->

          <div class="artile-content">
            <?php the_content(); ?>
          </div><!-- /.artile-content -->

          <div class="article-actions">
            <a href="<?php echo get_permalink() ?>" class="link-more">
              Read more
            </a>
          </div><!-- /.article-actions -->
        </article><!-- /.article --> 
      <?php endwhile; endif;  ?>
    </section><!-- /.simple-section --> 
  </div><!-- /.shell --> 
</div>
 
<?php get_footer(); ?>