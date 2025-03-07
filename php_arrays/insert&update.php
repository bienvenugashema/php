<?php 

function insert_array_value($value){
	$customer_Record = array("bienvenu","names");
	array_push($customer_Record, $value);
	print_r($customer_Record);
}

insert_array_value("programming");

// this approach of using arra_push it inserts item on the end of an array


function update_user_list(int $position, $value2){
	$customer_record2 = array("peter","smith", "john");
	$customer_record2[$position] = $value2;
	print_r($customer_record2);
}

update_user_list(0,'Bienvenu');

?>

