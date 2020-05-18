<?php if (have_rows('sections')): ?>
	<?php while (have_rows('sections')) : the_row(); ?>

		<?php // if (get_row_layout() == 'hero_section'): ?> 
			<?php // include('sections/hero/index.php'); ?>  
		<?php // endif; ?>
		 
	<?php endwhile; // end "while" flex content?> 
<?php else : ?>  
	<p>
		No sections created yet
	</p>
<?php endif; // end "if" flex content?> 