<?php 

$data = [];
$flag = true;

$room_length = trim($_POST['room_length']);
$room_width = trim($_POST['room_width']);
$board_length = trim($_POST['board_length']);
$board_width = trim($_POST['board_width']);

if ($room_length == '' || $room_width == '' || $board_length == '' || $board_width == '')
{
	$data['not_all'] = "Fill in all the fields!";
	$flag = false;
}

if ($room_length <= 0)
{
	$data['room_length'] = "Room length cannot be negative or zero or empty!";
	$flag = false;
}

if ($room_width <= 0)
{
	$data['room_width'] = "Room width cannot be negative or zero or empty!";
	$flag = false;
}

if ($board_length <= 0)
{
	$data['board_length'] = "Board length cannot be negative or zero or empty!";
	$flag = false;
}

if ($board_width <= 0)
{
	$data['board_width'] = "Board width cannot be negative or zero or empty!";
	$flag = false;
}

if ($flag)
{
	$data['result_mess'] = "The calculation has been made. See the result at the bottom of the page.";
	$data['result'] = ceil(($room_length*$room_width)/($board_length*$board_width));
}	

echo json_encode($data);
?>