


window.onload = function(){
	var button = document.getElementById('gets');
	button.onclick = loadnew;
	loadnew();
}



function loadnew () {
	var url="https://www.uitinenschede.nl/api/rest/locations?apikey=38459234y5wefcgejrkukju";
	
	return: $JSON;
	
}

<?php
$url = "http://www.uitinenschede.nl/api/rest/events?apikey=NpuORYzCTCDqYe4PBOCnEmTYI22F6wkK";
$response = file_get_contents($url);
echo $response;

#$JSON = false;
#$result = array(
#  'Post Data' => $_POST,
#	'Get Data' => $_GET,
#	'Files' => array(),
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
