<?php

class TicTacToe
{
    private $field = array(
        "cage11" => 2,
        "cage12" => 2,
        "cage13" => 2,
        "cage21" => 2,
        "cage22" => 2,
        "cage23" => 2,
        "cage31" => 2,
        "cage32" => 2,
        "cage33" => 2
    );

    public function getArray(){
        return $this->field;
    }

    public function fillArray(){
        $id = "127.0.0.1";
        $name = "root";
        $password = "root";
        $db = "tictactoe";

        $connect = mysqli_connect($id, $name, $password, $db);
        $query = mysqli_query($connect, "SELECT Ключ, Значение FROM `field`");
        while($row = mysqli_fetch_array($query)){
            $this->field[$row['Ключ']] = $row['Значение'];
        }

    }

    public function winner(){
        if(($this->field["cage11"] == 'x' &&  $this->field["cage12"] == 'x' && $this->field["cage13"] == 'x') || ($this->field["cage21"] == 'x' &&  $this->field["cage22"] == 'x' && $this->field["cage23"] == 'x') || ($this->field["cage31"] == 'x' &&  $this->field["cage32"] == 'x' && $this->field["cage33"] == 'x')){
            return 'x';
        }
        if(($this->field["cage11"] == 'o' &&  $this->field["cage12"] == 'o' && $this->field["cage13"] == 'o') || ($this->field["cage21"] == 'o' &&  $this->field["cage22"] == 'o' && $this->field["cage23"] == 'o') || ($this->field["cage31"] == 'o' &&  $this->field["cage32"] == 'o' && $this->field["cage33"] == 'o')){
            return 'o';
        }
        if (($this->field["cage11"] == 'x' &&  $this->field["cage21"] == 'x' && $this->field["cage23"] == 'x')|| ($this->field["cage12"] == 'x' &&  $this->field["cage22"] == 'x' && $this->field["cage32"] == 'x') || ($this->field["cage13"] == 'x' &&  $this->field["cage23"] == 'x' && $this->field["cage33"] == 'x')){
            return 'x';
        }
        if (($this->field["cage11"] == 'o' &&  $this->field["cage21"] == 'o' && $this->field["cage23"] == 'o')|| ($this->field["cage12"] == 'o' &&  $this->field["cage22"] == 'o' && $this->field["cage32"] == 'o') || ($this->field["cage13"] == 'o' &&  $this->field["cage23"] == 'o' && $this->field["cage33"] == 'o')){
            return '0';
        }
        if (($this->field["cage11"] == 'x' &&  $this->field["cage22"] == 'x' && $this->field["cage33"] == 'x')|| ($this->field["cage13"] == 'x' &&  $this->field["cage22"] == 'x' && $this->field["cage31"] == 'x')){
            return 'x';
        }
        if (($this->field["cage11"] == '0' &&  $this->field["cage22"] == 'o' && $this->field["cage33"] == 'o')|| ($this->field["cage13"] == 'o' &&  $this->field["cage22"] == 'o' && $this->field["cage31"] == 'o')){
            return 'o';
        }
        return 'noWinner';
    }

    public function fillCage($id, $i){
        $send = array(false, '');
        $res = array(
            'status' => false,
            'symbol' => ''
        );
        $idDB = "127.0.0.1";
        $name = "root";
        $password = "root";
        $db = "tictactoe";
        $link = mysqli_connect($idDB, $name, $password, $db);
        mysqli_set_charset($link, "utf8");

        if($this->field[$id] === NULL){
            if ($i % 2 === 1){
                $this->field[$id] = 'x';
                $sql = "UPDATE field SET Значение='{$this->field[$id]}' WHERE Ключ='{$id}' ";
                $res = ['status' => true, 'symbol' => 'x'];
                return $res;
            }
            else{
                $this->field[$id] = 'o';
                $sql = "UPDATE field SET Значение='{$this->field[$id]}' WHERE Ключ='{$id}' "; //
                $res = ['status' => true, 'symbol' => 'o'];
                return $res;
            }

        }
        else{

            return $res;
        }
    }

}