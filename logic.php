<?php

session_start();
include 'store.php';

$game = new Field;
$_SESSION['game'] = $game;

