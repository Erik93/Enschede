<html>
<head>
<meta charset="utf-8">
<title>Naamloos document</title>
</head>

<body>



<h1> All events in Enschede!</h1>

<?php 
$url = "http://www.uitinenschede.nl/api/rest/events?apikey=NpuORYzCTCDqYe4PBOCnEmTYI22F6wkK";
$response = file_get_contents($url);
$data = json_decode($response, true);

$num = count($data['events']);
#print_r($data['events'][1]);

$i = 0;
while ($i < $num)
{
  echo "Titel: " . $data['events'][$i]['title'] . "<br>";
	echo "Url: " . "<a href='" . $data['events'][$i]['url'] . "'>Link</a>" . "<br>";
	echo "Beschrijving: " . $data['events'][$i]['description'] . "<br>";
	echo "Datum: " . $data['events'][$i]['from'] . "<br><br>";
	
	
	
	$i++;
}



?>






</body>
</html>
