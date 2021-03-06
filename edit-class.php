<?php require('core/init.php'); ?>
<?php

if (isLoggedIn()) {
	if (isset($_POST['delete_class'])) {
		$class_id = $_POST['class_id'];
		
		// Create User object
		$user = new User();
		
		if ($user->deleteClass($class_id)) {
			redirect(BASE_URI, 'Your class has been deleted.', 'success');
		} else {
			redirect('./', "We're having technical difficulties on our end. Please try again.", 'error');
		}
		
	} else if(isset($_POST['do_update'])){ 
		$assign_ids = $_POST['assign_ids'];
		$weeks = $_POST['week'];        	
		$names = $_POST['name'];	   				
		$duedates = $_POST['due-date'];  
		$points = $_POST['points'];	 
		$class_name = $_POST['className'];
		$term_name = $_POST['termName'];
		$class_id = $_POST['class_id'];
		
		// Create User object
		$user = new User();
		
		if ($user->updateClass($assign_ids, $weeks, $names, $duedates, $points, $class_name, $term_name, $class_id)) {
			redirect(BASE_URI, 'Your class has been updated.', 'success');
		} else {
			redirect('./', "We're having technical difficulties on our end. Please try again.", 'error');
		}
		
	}	


	// Get template and assign vars
	$template = new Template('templates/edit_class.php');

	// Assign vars
	$template->title = 'Edit Class Name';

	// Display template
	echo $template;
} else {
	redirect(BASE_URI, 'Please sign-in', 'error');
}
?>