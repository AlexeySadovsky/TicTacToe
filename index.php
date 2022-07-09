<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>TicTacToe</title>
</head>
<body>
<div class="wrapper" id = "wrapper">
    <p>TIC TAC TOE</p>
    <p id="lvl" >Level: 1</p>
    <div class = "row" id = "firstRow">
        <button id = "00" class="cage" onclick="buttonClick(0, 0)"></button>
        <button id = "01" class="cage" onclick="buttonClick(0, 1)"></button>
        <button id = "02" class="cage" onclick="buttonClick(0, 2)"></button>
    </div>
    <div class = "row" id = "secondRow">
        <button id = "10" class="cage" onclick="buttonClick(1, 0)"></button>
        <button id = "11" class="cage" onclick="buttonClick(1, 1)"> </button>
        <button id = "12" class="cage" onclick="buttonClick(1, 2)"></button>
    </div>
    <div class = "row" id = "thirdRow">
        <button id = "20" class="cage" onclick="buttonClick(2, 0)"></button>
        <button id = "21" class="cage" onclick="buttonClick(2, 1)"></button>
        <button id = "22" class="cage" onclick="buttonClick(2, 2)"></button>
    </div>
    <div class = "row" id = "thirdRow">
    <button class="startButton" onclick="startGame()">Go</button>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.1.1.min.js"
         crossOrigin="anonymous"></script>

<script src="script.js"> </script>


</body>
</html>