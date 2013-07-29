<?php

$JSON = false;
$result = array(
  'Post Data' => $_POST,
	'Get Data' => $_GET,
	'Files' => array(),
);



if ( $_SERVER['HTTP_X_FILE_NAME'] ) {
	$result['Files'] = array(
		'name' => $_SERVER['HTTP_X_FILE_NAME'],
		'when' => $_SERVER['HTTP_X_FILE_SIZE']
	);
	$JSON = $_GET['JSON'] == 'true' ? true : false;
}
else {
	// Limit info shown
	foreach ( $_FILES as $key => $file ) {
		$result['Files'][ $key ] = array(
			'name' => $file['name'],
			'event' => $file['event'],
			'when' => $file['when'],
		);
	}
	$JSON = $_POST['JSON'] == 'true' ? true : false;
}


// Return JSON Encoded result if wanted
if ( $JSON ) {
	echo json_encode( $result );
} else {
	print_r( $result );
}

?>
