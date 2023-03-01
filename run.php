<?php
require_once("src/functions.php");
// Get data from input 
$roomNumber = (int)readline("Please, enter room number(example: 222,367:");
$empBooked  =	(int)readline("Please, enter your employeeID to book (e:1,2): ");
$dayToBook = (string)readline("Please, enter day you want to book room format YYYY-mm-dd \n (Example:2023-03-01) : -$roomNumber- :");
$timeToBook = (string)readline("Please, enter time you want to book room 24 hours format \n (Example:14:34)-$roomNumber- :");
$duration 	= (int)readline("Please, enter how long you want to book the room (only integer format) (example: 1 for 1h and etc):");

$dateToBook = $dayToBook." ".$timeToBook;

/*
$unix_time = date('Y-m-d H:i', strtotime($dateToBook."+ $duration hour"));

echo $unix_time;

die();
*/


//Validatian of input data

if(!validRoomNumber($roomNumber)){
	die("Not A Valid Room Number\n");
}
if(!validEmployeeID($empBooked)){
	die("Employee with the current ID does not exist\n");
}
if(!validDateFormat($dateToBook)){
	die("Date input format not valid\n");
}

//Check the availabilities
$canBeBooked = checkRoom($roomNumber, $dateToBook,$empBooked,$duration);

if($canBeBooked){

		print_r("You have booked $roomNumber at $dateToBook.");
		
		$bookIt = readline("please enter \"Y\" to send confirmation  and other char for cancel : ");
		
		if($bookIt == "Y") {
		
			sendConformation($empBooked);
			
		}
		
} else {

			print_r("Sorry room is busy \n");
			$otherRooms = checkOtherAvailables($dateToBook);			
}
?>
