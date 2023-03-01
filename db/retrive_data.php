<?php

require_once('db.php');

function isRoomAvailiable(int $roomNumber, string $dateToBook):bool{
	
	global $conn;
	
	$dtime = strtotime($dateToBook);
	
	$sql = "SELECT * FROM `booked_rooms` 
	INNER JOIN rooms on rooms.id = booked_rooms.room_id 
	INNER JOIN employees on employees.id = booked_rooms.employee_id 	
	WHERE rooms.number = $roomNumber and booked_datetime_start = $dtime";
	
	$result = $conn->query($sql);

	if($result->num_rows > 0) {
		return false;
	}
	return true;
	
}

function saveData(int $roomNumber, string $dateToBook, int $employeeID, int $duration):bool{

	global $conn;
	
	$bookedStart = strtotime($dateToBook);
	$bookedEnd = strtotime($dateToBook."+ $duration hour");
	$roomID = getSingleValue("SELECT id FROM rooms WHERE number=?", $roomNumber);
	$sql = "INSERT INTO booked_rooms(room_id, employee_id,booked_datetime_start,booked_datetime_end)
	VALUES ($roomID,$employeeID,$bookedStart,$bookedEnd)";
	$result = $conn->query($sql);
	return $result;
	$conn->close();
}

function getAvailableRooms(string $dateToBook):string{
	
	global $conn;
	
	$dtime = strtotime($dateToBook);
	$rooms = "Rooms available at given time \n";
	$sql = "SELECT  rooms.* FROM `booked_rooms`  
	RIGHT OUTER JOIN rooms on rooms.id = booked_rooms.room_id 
	WHERE booked_datetime_start != $dtime OR booked_datetime_start is NULL";
	
	$result = $conn->query($sql);
	
	if($result->num_rows > 0) {
		  while($row = $result->fetch_assoc()) {
    		$rooms .= "Floor ".$row["floor"]." - ".$row["number"].",".$row["name"]."\n";
  		}
		return $rooms;
	}
	return $rooms."None";
};

function getRoomID(int $roomNumber){
	
	$roomID = getSingleValue("SELECT id FROM rooms WHERE number=?", $roomNumber);
	
	return $roomID;
}

function getEmployeeID(int $employeeID) {
	
	$empID = getSingleValue("SELECT id FROM employees WHERE id=?", $employeeID);
	
	return $empID;

}
function getSingleValue($sql, $parameters){

	global $conn;	
	
    $q = $conn->prepare($sql);
    $q->bind_param('i', $parameters);
    $q->execute();
    return $q->fetch();
    $conn->close();
}
?>
