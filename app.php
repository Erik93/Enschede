<?php


error_reporting(E_ALL);
add_action("widgets_init", array('NielsDoornsWidget', 'register'));
class NielsDoornsWidget {
  function control(){
    echo 'I am a control panel for NielsDoornsWidget';
  }
  function widget($args){
    echo $args['before_widget'];
    echo $args['before_title'] . 'Enschede Events' . $args['after_title'];
	
		$url = "http://www.uitinenschede.nl/api/rest/events?apikey=NpuORYzCTCDqYe4PBOCnEmTYI22F6wkK";
		$response = file_get_contents($url);
		$data = json_decode($response, true);

		$num = count($data['events']);

		$i = 0;
		while ($i < 3)
		{
			echo "Titel: " . $data['events'][$i]['title'] . "<br>";
			echo "Url: " . "<a href='" . $data['events'][$i]['url'] . "'>Link</a>" . "<br>";
			echo "Beschrijving: " . $data['events'][$i]['description'] . "<br>";
			echo "Datum: " . $data['events'][$i]['from'] . "<br><br>";
	
			$i++;
		}
  
    echo $args['after_widget'];
  }
  function register(){
    register_sidebar_widget('Enschede Events', array('NielsDoornsWidget', 'widget'));
    register_widget_control('Enschede Events', array('NielsDoornsWidget', 'control'));
  }
}


?>
