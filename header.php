<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Motionkata_ACF
 */
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<meta name="description" content="">
	<meta name="author" content="">
	
	<!-- We will use fontawesome 4 -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" media="all" />

	<title><?php wp_title(); ?></title>

	<?php wp_head();?> 
  </head>

  <body>
	<div class="wrapper"> 

		<header class="header">
			<div class="shell">
				<a class="logo" href="#">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/logo2.png'; ?>" />
				</a>

		 

				<div class="navigation">
					<?php wp_nav_menu([
                        'menu' => 1,
                        'container_class' => 'navbar-collapse collapse',
                        'container_id' => 'navbar',
                        'menu_class' => 'nav navbar-nav navbar-right',
                    ]); ?>
				</div><!-- /.navigation -->
			</div><!-- /.shell -->
		</header> 