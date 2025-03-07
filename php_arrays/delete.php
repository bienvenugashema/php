<?php 

function delete_array_item(int $item){
	$items = array("name1", "bienvenu", "mood", "programming", "cyber security", "innovation");
	unset($items[$item]);
	print_r($items);

}
echo "<br>";
delete_array_item(1);
