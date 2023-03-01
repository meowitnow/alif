<?php
require_once('db/retrive_data.php');

//Check functions

function checkRoom(int $roomNumber, string $dateToBook, int $employeeID, int $duration):bool{

	//Get data from database
	$resultOftheSearch =isRoomAvailiable($roomNumber, $dateToBook);
	
	if($resultOftheSearch) {
		$saved = saveData($roomNumber, $dateToBook, $employeeID, $duration);
		return true; 
	} else {

		checkOtherAvailables($dateToBook);
	}
	return false;
}

function checkOtherAvailables(string $dateToBook):string{
	
	$availiable = getAvailableRooms($dateToBook);
	return $availiable;

}

function sendConformation(string $name, string $email, string $phonenumber):void{

print_r("$name, email was send to $email and sms was send to $phonenumber");

}

//Validation functions

function validRoomNumber(int $roomNumber):bool{
	
	$roomID = getRoomID($roomNumber);
	
	if($roomID){
		return true;
	}
	return false;	

}

function validEmployeeID(int $employeeID):bool{
	
	$empID = getEmployeeID($employeeID);
	
	if($empID){
		return true;
	}
	return false;

}

function validDateFormat(string $dateString):bool{
	
	$format = 'Y-m-d H:i';
    $d = DateTime::createFromFormat($format, $dateString);
	if ($d && $d->format($format) == $dateString){
		return true;
	}
	return false;

}

?>
