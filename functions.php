<?php
include 'store.php';
session_start();

$x = $_POST['x'];
$y = $_POST['y'];




$result = $_SESSION['game']->check($x, $y);


if ($result){
    $_SESSION['game']->setCross($x, $y);
    $_SESSION['game']->pcMove();
    if ($_SESSION['game']->checkWin() === 'continue'){

        echo json_encode($_SESSION['game']->getArray());
    }
    if($_SESSION['game']->checkWin() === 'nothing'){
        $arr = "draw";
        echo json_encode($arr);

    }
    if($_SESSION['game']->checkWin() === 'win cross'){
        $arr = "win cross";
        echo json_encode($arr);

    }
    if($_SESSION['game']->checkWin() === 'win zero'){
        $arr = "win zero";
        echo json_encode($arr);

    }
}
else{


    $arr = array(['status' => false]);;
    echo json_encode($arr);
}

