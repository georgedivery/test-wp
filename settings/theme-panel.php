<?php

function motionkata_settings_page()
{
    ?>
	    <div class="wrap">
			<div>
				<h1>Export ACF fields:</h1>
			</div>
			<div>
				<ol type="1">
					<li>Got to Custom Fields > Tools</li>
					<li>Click on "Export File"</li>
					<li>Save the file in <theme_root>/sync/acf-export.json</li>
				</ol>
			</div>
		</div>
	<?php
}


function motionkata_admin_action()
{
	if (!empty($_POST)) {
		$url = get_home_url() . '/casecoachpdf/process.php';

		$response = wp_remote_post( $url, [
			    'method' => 'POST',
			    'timeout' => 45,
			    'redirection' => 5,
			    'httpversion' => '1.0',
			    'blocking' => true,
			    'headers' => [],
			    'body' => ['email' => $_POST['email'], 'name' => $_POST['name']],
			    'cookies' => []
		    ]
		);
	}

	// redirect the user to the appropriate page
	wp_safe_redirect(site_url( '/wp-admin/admin.php?page=motionkata-panel&status=success'));
exit();
}
add_action('admin_action_motionkata', 'motionkata_admin_action');
add_action('admin_action_submitform', 'motionkata_admin_action');

function motionkata_import_page()
{
	$fields = MotionkataSync::getSqlFiles(get_template_directory() . '/settings/sync/');
    ?>
	    <div class="wrap">
		    <h1>Import ACF fields and field groups</h1>
		    <form id="motionkata-form" method="post" action="options.php">
		    	<input type="hidden" id="template_directory_uri" name="template_directory_uri" value="<?php echo get_template_directory_uri(); ?>">
		    	<?php foreach ($fields as $field): ?>
		    		<?php
		    			$file_array = explode('_', $field);
		    			$file_array = explode('.', $file_array[count($file_array) - 1]);
		    			$file_name = $file_array[0];
		    		?>
		    		<input type="checkbox" name="<?php echo $field; ?>" value="<?php echo $field; ?>" checked> <?php echo $file_name; ?><br>
		    	<?php endforeach ?>
		        <?php
		            settings_fields("section");
		            // do_settings_sections("theme-options");
		            submit_button('Import'); 
		        ?>          
		    </form>
		</div>

		<script src="<?php echo get_template_directory_uri() . "/settings/assets/motionkata-theme.js" ?>"></script>
	<?php
}

function motionkata_export_page()
{
	?>
	    <div class="wrap">
		    <h1>Export ACF fields and field groups</h1>
		    <input type="hidden" id="template_directory_uri" name="template_directory_uri" value="<?php echo get_template_directory_uri(); ?>">
		  	<div class="row">
		  		<p>When you create new groups and fields you can save them directly to the theme directory as sql files</p>
		  		<p>After export the changes you need to commit them.</p>
		  	</div>
		  	<div class="row">
		  		<span><span>
		  		<button class="button button-primary" id="motionkata-export">Export</button>
		  	</div>
		</div>

		<script src="<?php echo get_template_directory_uri() . "/settings/assets/motionkata-theme.js" ?>"></script>
	<?php
}

function add_theme_menu_item()
{
	add_menu_page("Motionkata Panel", "Motionkata Panel", "manage_options", "motionkata-panel", "motionkata_settings_page", null, 99);
//	add_submenu_page("motionkata-panel", "Import ACF Fields", "Import", "manage_options", "motionkata-import-page", 'motionkata_import_page', 99);
//	add_submenu_page("motionkata-panel", "Export ACF Fields", "Export", "manage_options", "motionkata-export-page", 'motionkata_export_page', 99);
}

add_action("admin_menu", "add_theme_menu_item");


function display_sync_front_page_element()
{
	?>
		<input type="checkbox" name="sync_front_page" value="1" <?php checked(1, get_option('sync_front_page'), true); ?> />
	<?php
}

/**
 *
 *	function display_sync_hero_section_element()
 *	{
 *		?>
 *			<input type="checkbox" name="sync_hero_section" value="1" <?php checked(1, get_option('sync_hero_section'), true); ?> />
 *		<?php
 *	}
 *
 */

function display_theme_panel_fields()
{
	add_settings_section("section", "Sync Settings", null, "theme-options");

	add_settings_field("sync_front_page", "Sync Front", "display_sync_front_page_element", "theme-options", "section");
	// add_settings_field("sync_hero_section", "Sync Hero Section", "display_sync_hero_section_element", "theme-options", "section");

	register_setting("section", "sync_front_page");
	// register_setting("section", "sync_hero_section");
}

add_action("admin_init", "display_theme_panel_fields");
