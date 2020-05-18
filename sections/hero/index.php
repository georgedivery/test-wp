<?php
    function motionkata_hero_section_styles()
    {
        wp_enqueue_style('hero-section-css', 'styles.css', array(), '1.1', 'all');
    }
    add_action('wp_enqueue_scripts', 'motionkata_hero_section_styles');
?>

<section class="section section-hero" style="background-image: url(<?php echo get_sub_field('section_hero_background'); ?>)">
    <div class="shell">
        <div class="section-content">
            <h1 class="title">
                <?php echo get_sub_field('section_hero_title'); ?>
            </h1>
            <p class="text">
                <?php echo get_sub_field('section_hero_sub_title'); ?>
            </p>
        </div>
    </div>
</section>

