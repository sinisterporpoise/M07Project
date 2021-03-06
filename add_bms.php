<?php
	require_once('bookmark_fns.php');
	session_start();
	
	//create short variable name
	$new_url = $_POST['new_url'];
	
	do_html_header('Adding Bookmarks');
	
	try {
		check_valid_user;
		if (!filled_out($_POST) {
			throw new Exception('Form not completely filled out.');
		}
		// check URL format
		if (strstr($new_url, 'http://' === false) {
		$new_url = "http://'.$new_url;
	    }
	    
	}
	
// check URL is valid.
if (!(@fopen($new_url, 'r'))) {
	throw new Exception('Not a valid URL.');
	}
// trad to add bm
add_bm($new_url);
echo 'Bookmark added.';

// get the bookmarks this user has savd
if ($url_array = get_user_urls($_SESSION['valid_user'])) {
	display_user_urls_($url_array);
	}
}
catch (Exception $e) {
	echo $e->getMessage();
}

display_user_menu();
do_html_footer();

