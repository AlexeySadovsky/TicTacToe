<?php
$idDB = "127.0.0.1";
$name = "root";
$password = "root";
$db = "tictactoe";
$link = mysqli_connect($idDB, $name, $password, $db);
mysqli_set_charset($link, "utf8");
$query = mysqli_query($link, "SELECT * FROM `level`");
$row = mysqli_fetch_array($query);
$changeLVL = $_POST['changeLVL'];
$lvl =  $row[2];
$lvl = (int)$lvl + (int)$changeLVL;

if($lvl === 0){
    $lvl = (int)$lvl + 1;
}
mysqli_query($link, "UPDATE level SET level='{$lvl}' ");
echo json_encode((string)$lvl);

