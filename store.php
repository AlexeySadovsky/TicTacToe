<?php

const empt = 10;
const cross = 1;
const zero = 0;

class Field{
    public $field = array(
        array(empt, empt, empt),
        array(empt, empt, empt),
        array(empt, empt, empt),
    );

    function getArray()
    {
        return $this->field;
    }

    function check($x, $y)
    {
        if($this->field[$x][$y] == 10){
            return true;
        }

        return false;
    }

    function setCross($x, $y){
        $this->field[$x][$y] = cross;
    }

    function setZero($x, $y){
        $this->field[$x][$y] = zero;
    }

    function checkWin(){
        $winSumLine = 0;
        $winSumStolb = 0;

        $winDiagonal = $this->field[0][0] + $this->field[1][1] + $this->field[2][2];
        $winDiagonal2 = $this->field[0][2] + $this->field[1][1] + $this->field[2][0];
        if($winDiagonal === 0 || $winDiagonal2 === 0){
            return 'win zero';
        }
        if($winDiagonal === 3 || $winDiagonal2 === 3){
            return 'win cross';
        }
        for($i = 0; $i < 3; $i++){
            for($j = 0; $j < 3; $j++){
                $winSumLine += $this->field[$i][$j];
                $winSumStolb += $this->field[$j][$i];
            }
            if($winSumLine === 0 || $winSumStolb === 0){
                return 'win zero';
            }
            if($winSumLine === 3 || $winSumStolb === 3){
                return 'win cross';
            }
            $winSumLine = 0;
            $winSumStolb = 0;
        }

        $sum = 0;
        for($i = 0; $i < 3; $i++) {
            for($j = 0; $j < 3; $j++){
                $sum += $this->field[$i][$j];
            }
        }
        if($sum < 10) {
            return 'nothing';
        }

            return 'continue';
    }

    function pcMove(){
        $diagonal = $this->field[0][0] + $this->field[1][1] + $this->field[2][2];
        if($diagonal === 12) {
            if($this->check(0, 0)) {
                $this->setZero(0, 0);
                return;
            }
            if($this->check(1, 1)) {
                $this->setZero(1, 1);
                return;
            }
            if($this->check(2, 2)) {
                $this->setZero(2, 2);
                return;
            }
        }

        $diagonal2 = $this->field[0][2] + $this->field[1][1] + $this->field[2][0];
        if($diagonal2 === 12) {
            if($this->check(0, 2)) {
                $this->setZero(0, 2);
                return;
            }
            if($this->check(1, 1)) {
                $this->setZero(1, 1);
                return;
            }
            if($this->check(2, 0)) {
                $this->setZero(2, 0);
                return;
            }
        }

        for($i = 0; $i < 3; $i ++){
            $sum = 0;
            $sum2 = 0;
            for($j = 0; $j < 3; $j ++){
                $sum += $this->field[$i][$j];
                $sum2 += $this->field[$j][$i];
            }
            if($sum === 12){
                $this->setPcInLine($i);
                return;
            }
            if($sum2 === 12){
                $this->setPcInStolb($i);
                return;
            }
            $sum = 0;
            $sum2 = 0;
        }
        $randX = 1;
        $randY = 1;

        while(!$this->check($randX, $randY)){
            $randY = rand(0, 2);
            $randX = rand(0, 2);
        }

        $this->setZero($randX, $randY);
    }

    function setPcInLine($line){
        for($i = 0; $i < 3; $i++){
            if($this->field[$line][$i] === 10){
                $this->setZero($line, $i);
            }
        }
    }

    function setPcInStolb($stolb){
        for($i = 0; $i < 3; $i++){
            if($this->field[$i][$stolb] === 10){
                $this->setZero($stolb, $i);
            }
        }
    }

}






?>