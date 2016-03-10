<?php 
 $json_string = file_get_contents("http://api.wunderground.com/api/9bf2655c50459545/geolookup/conditions/q/UK/Leeds.json");

$parsed_json = json_decode($json_string);

$location = $parsed_json->{'location'}->{'city'};

$temp_c = $parsed_json->{'current_observation'}->{'temp_c'};

$icon_url = $parsed_json->{'current_observation'}->{'icon_url'};

$image = $parsed_json->{'current_observation'}->{'icon_url'} ;

echo "Current temperature in ${location} is: ${temp_c}";

echo "<img src='".$image."'>";

?>