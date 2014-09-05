<?php
/*
 * This file is part of pluck, the easy content management system
 * Copyright (c) pluck team
 * http://www.pluck-cms.org

 * Pluck is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * See docs/COPYING for the complete license.
*/

//Make sure the file isn't accessed directly.

defined('IN_PLUCK') or exit('Access denied!');
function tinymce_display_code() { ?>
	<script type="text/javascript" src="<?php echo TINYMCE_DIR; ?>/tinymce.min.js"></script>
	<?php run_hook('tinymce_scripts'); ?>
	<script type="text/javascript">

	tinymce.init({
		selector: "textarea#content-form",
		theme: "modern",
		menubar: "tools table format view insert edit <?php run_hook('tinymce_buttons1'); ?>",
		width: 600,
		height: 300,
		<?php
		//Check if we need to set the direction to rtl.
		if (DIRECTION_RTL)
			echo "directionality : 'rtl', \n";
		//Set the language
		if (file_exists(TINYMCE_DIR.'/langs/'.LANG.'.js'))
			echo "language : '".LANG."', \n";
		else
			echo "language : 'en', \n";
		?>
		plugins: [
			"advlist autolink link lists charmap preview hr anchor pagebreak spellchecker",
			"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
			"save table contextmenu directionality emoticons template paste textcolor <?php run_hook('tinymce_plugins'); ?>"
   ],
   content_css: "css/content.css",
   <?php run_hook('tinymce_options'); ?>
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | preview media fullpage | forecolor backcolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
	}); 

	</script>
	<?php
}
?>