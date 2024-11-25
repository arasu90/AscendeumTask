<?php


// Readme

/*

1. place a file in a localhost path
2. run the file name in url
3. enter the grid value
4. click the play button and move to next player
5. once the player moved the last position the game will end and show the history and winner
6. if you want to continue click reset button untill it will continue previous game  
*/



session_start();
class SnakeLadder{
    public function oddOReven($value){
        return ($value % 2 == 0) ? true : false;
    }

    public function getvalue(){
        return '10';
    }

    public function getNextPlayer($playerid){
        switch($playerid){
            case 1:
                return 2;
            case 2:
                return 3;
            case 3:
                return 1;
            default:
                return 1;
        }
    }
}

class Play {
    public $max_value;
    public $position_his = array();
    public function setMaxvalue($maxval){
        $this->max_value = $maxval;
    }
    public function getDiesValue(){
        return rand(1,6);
    }

    public function maxValue(){
       return $this->max_value;
    }

    public function oddOReven($value){
        return ($value % 2 == 0) ? true : false;
    }

}

class Player1 extends Play{
    private $dies_history = array();
    private $position_history = array();
    public function __construct($prev_history=array())
    {
        $this->dies_history = array_merge($this->dies_history,$prev_history);
    }
    public function updateDiesHistory(){
        $this->dies_history[] = $this->getDiesValue();
    }

    public function getDiesHistory(){
        return implode(",",$this->dies_history);
    }

    public function sendDiesHistory(){
        return $this->dies_history;
    }
    public function GamePlay(){
        $sum = 0;
        $dies_end_value = $this->maxValue();
        $i=0;
        foreach($this->dies_history as $value){
            $sum = $sum+$value;
            if($sum > $this->maxValue()){
                $sum = $sum-$value;
            }
            $this->position_history [] = $sum;
            $i++;
        }
        
        $sum_val = $sum;
        if($dies_end_value == $sum_val){
            return 'gameend';
        }else{
            return 'countinue';
        }
    }

    public function positionHistory($dies_history, $k){
        $sum =0;
        $i=0;
        // print_r($dies_history);
        $data_position_history = array();
        foreach($dies_history as $value){
            $sum = $sum+ $value;
            if($sum > $k){
                $sum = $sum-$value;
            }
            $data_position_history [] = $sum;
            $i++;
        }
        // print_r($data_position_history);
        return implode(",",$data_position_history);
    }

    public function getCopositions($dies_hist, $dies_grid=3,){
        $coordinate_postiton = array();
        $k=pow($dies_grid,2);
        $explode_value = explode(",",$dies_hist);
        $p=$dies_grid;
        foreach($explode_value as $values){
            $a = $this->oddOReven($p) ? $k : $k-$p+1;
            for($i=($dies_grid-1);$i>=0;$i--){
                for($j=0;$j<$dies_grid;$j++){
                    if($a == $values){
                        $coordinate_postiton [] = "('".$j."','".$i."')";
                    }
                    $this->oddOReven($i) ? $a++ : $a--;
                }

                $a = $this->oddOReven($i) ? $a-$j-1 : $a-$j+1;
            }
        }
        // print_r($coordinate_postiton);
        return implode(",",$coordinate_postiton);
    }
    
}
class Player2 extends Play{
    private $dies_history = array();
    private $position_history = array();
    public function __construct($prev_history = array())
    {
        $this->dies_history = array_merge($this->dies_history,$prev_history);
    }
    public function updateDiesHistory(){
        $this->dies_history[] = $this->getDiesValue();
    }

    public function getDiesHistory(){
        return implode(",",$this->dies_history);
    }

    public function sendDiesHistory(){
        return $this->dies_history;
    }
    public function GamePlay(){
        $sum = 0;
        $dies_end_value = $this->maxValue();
        $i=0;
        foreach($this->dies_history as $value){
            $sum = $sum+$value;
            if($sum > $this->maxValue()){
                $sum = $sum-$value;
            }
            $this->position_history [] = $sum;
            $i++;
        }
        
        $sum_val = $sum;
        if($dies_end_value == $sum_val){
            return 'gameend';
        }else{
            return 'countinue';
        }
    }

    public function positionHistory($dies_history, $k){
        $sum =0;
        $i=0;
        // print_r($dies_history);
        $data_position_history = array();
        foreach($dies_history as $value){
            $sum = $sum+ $value;
            if($sum > $k){
                $sum = $sum-$value;
            }
            $data_position_history [] = $sum;
            $i++;
        }
        // print_r($data_position_history);
        return implode(",",$data_position_history);
    }

    public function getCopositions($dies_hist, $dies_grid=3,){
        $coordinate_postiton = array();
        $k=pow($dies_grid,2);
        $explode_value = explode(",",$dies_hist);
        $p=$dies_grid;
        foreach($explode_value as $values){
            $a = $this->oddOReven($p) ? $k : $k-$p+1;
            for($i=($dies_grid-1);$i>=0;$i--){
                for($j=0;$j<$dies_grid;$j++){
                    if($a == $values){
                        $coordinate_postiton [] = "('".$j."','".$i."')";
                    }
                    $this->oddOReven($i) ? $a++ : $a--;
                }

                $a = $this->oddOReven($i) ? $a-$j-1 : $a-$j+1;
            }
        }
        // print_r($coordinate_postiton);
        return implode(",",$coordinate_postiton);
    }
}
class Player3 extends Play{
    private $dies_history = array();
    private $position_history = array();
    public function __construct($prev_history = array())
    {
        $this->dies_history = array_merge($this->dies_history,$prev_history);
    }
    public function updateDiesHistory(){
        $this->dies_history[] = $this->getDiesValue();
    }

    public function getDiesHistory(){
        return implode(",",$this->dies_history);
    }

    public function sendDiesHistory(){
        return $this->dies_history;
    }
    public function GamePlay(){
        $sum = 0;
        $dies_end_value = $this->maxValue();
        $i=0;
        foreach($this->dies_history as $value){
            $sum = $sum+$value;
            if($sum > $this->maxValue()){
                $sum = $sum-$value;
            }
            $this->position_history [] = $sum;
            $i++;
        }
        
        $sum_val = $sum;
        if($dies_end_value == $sum_val){
            return 'gameend';
        }else{
            return 'countinue';
        }
    }

    public function positionHistory($dies_history, $k){
        $sum =0;
        $i=0;
        // print_r($dies_history);
        $data_position_history = array();
        foreach($dies_history as $value){
            $sum = $sum+ $value;
            if($sum > $k){
                $sum = $sum-$value;
            }
            $data_position_history [] = $sum;
            $i++;
        }
        // print_r($data_position_history);
        return implode(",",$data_position_history);
    }

    public function getCopositions($dies_hist, $dies_grid=3,){
        $coordinate_postiton = array();
        $k=pow($dies_grid,2);
        $explode_value = explode(",",$dies_hist);
        $p=$dies_grid;
        $kp=0;
        $a = $this->oddOReven($p) ? $k : $k-$p+1;
        for($i=($dies_grid-1);$i>=0;$i--){
            for($j=0;$j<$dies_grid;$j++){
                foreach($explode_value as $values){
                    if($a == $values){
                        // echo 'ssss';
                        $coordinate_postiton [$kp] = "('".$j."','".$i."')";
                    }
                    $kp++;
                }
                $this->oddOReven($i) ? $a++ : $a--;

            }
                $a = $this->oddOReven($i) ? $a-$j-1 : $a-$j+1;
        }
        return implode(",",$coordinate_postiton);
    }
}
$player = 0;
$obj = new SnakeLadder;
$game_status = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .table{
            border-collapse: collapse !important;
        }
    </style>
</head>
<body>
    <h1>Snake & Ladder Game</h1>
    <form action="" method="get">
        <P>Data Grid : <input type="text" name="grid_value" id="grid_value" value="3"></P>
        <button type="submit">Submit</button>
        <a href="task_3.php" >Reset</a>
    </form>

    <table border="1" class="table" align="center" width="50%">

    
    <?php
   
    if(isset($_GET['grid_value'])){
        $player = 1;
        $k=pow($_GET['grid_value'],2);
        $_SESSION['maxValue'] = $k;
        $p=$_GET['grid_value'];
        $a = $obj->oddOReven($p) ? $k : $k-$p+1;

        for($i=($_GET['grid_value']-1);$i>=0;$i--){
            echo '<tr>';
            for($j=0;$j<$_GET['grid_value'];$j++){
                echo '<td>';
                echo $a.'('.$j.','.$i.')';
                echo '</td>';
                $obj->oddOReven($i) ? $a++ : $a--;
            }

            $a = $obj->oddOReven($i) ? $a-$j-1 : $a-$j+1;
            
            echo '</tr>';
        }
        if($_SESSION['base_value'] == true){
            unset($_SESSION['player_one_dies']);
            unset($_SESSION['player_two_dies']);
            unset($_SESSION['player_three_dies']);
            $_SESSION['base_value'] = false;
        }

    }else{
        $_SESSION['base_value'] = true;
    }
    ?>
    </table>
<?php
    if(isset($_POST['player'])){
        $current_player = $_POST['player'];
        $player = $obj->getNextPlayer($_POST['player']);
        $player_one_dies = isset($_SESSION['player_one_dies']) ? $_SESSION['player_one_dies'] : array();
        $player_one = new Player1($player_one_dies);
        if($current_player == 1){
                $player_one->updateDiesHistory();
                $player_one->setMaxvalue($k);
                $player_one_dies = $player_one->sendDiesHistory();
                $_SESSION['player_one_dies'] = $player_one_dies;
                $game_status = $player_one->GamePlay();
                if($game_status == 'gameend'){
                    // goto Display;
                    $player = 0;
                }
            }

            $player_two_dies = isset($_SESSION['player_two_dies']) ? $_SESSION['player_two_dies'] : array();
            $player_two = new Player2($player_two_dies);
            if($current_player == 2){
                $player_two->updateDiesHistory();
                $player_two->setMaxvalue($k);
                $player_two_dies = $player_two->sendDiesHistory();
                $_SESSION['player_two_dies'] = $player_two_dies;
                $game_status = $player_two->GamePlay();
                if($game_status == 'gameend'){
                    // goto Display;
                    $player = 0;
                }
            }

            $player_three_dies = isset($_SESSION['player_three_dies']) ? $_SESSION['player_three_dies'] : array();
            $player_three = new Player3($player_three_dies);
            if($current_player == 3){
                $player_three->updateDiesHistory();
                $player_three->setMaxvalue($k);
                $player_three_dies = $player_three->sendDiesHistory();
                $_SESSION['player_three_dies'] = $player_three_dies;
                $game_status = $player_three->GamePlay();
                if($game_status == 'gameend'){
                    // goto Display;
                    $player = 0;
                }
            }
    }
    Display:
    ?>
    <form action="" method="post">
    <ul>
        <li style="margin: 30px;">player 1 
        <?php if($player == 1) { ?>
            <button type="submit" name="player" value="1">Play</button>
        <?php } ?>
    </li>
        <li style="margin: 30px;">player 2 
            <?php if($player == 2) { ?>
            <button type="submit" name="player" value="2">Play</button>
        <?php } ?>
    </li>
        <li style="margin: 30px;">player 3 
            <?php if($player == 3) { ?>
                <button type="submit" name="player" value="3">Play</button>
                <?php } ?>
        </li>
    </ul>
    </form>
    <?php
   // print_r($player_two->positionHistory($player_two_dies, $k));
        
                if($game_status == 'gameend'){
                    // $player_one = $player_one->getDiesHistory();
                    // $player_two = $player_two->getDiesHistory();
                    // $player_three = $player_three->getDiesHistory();
                    $winner_player_1 = '';
                    $winner_player_2= '';
                    $winner_player_3 = '';
                    if($current_player == 1){
                        $winner_player_1 = 'Winner';
                    }
                    
                    if($current_player == 2){
                        $winner_player_2 = 'Winner';
                    }
                    
                    if($current_player == 3){
                        $winner_player_3 = 'Winner';
                    }


                    echo '<table border="1" width="50%">';
                    echo '<tr>';
                    echo '<td> PlayerNO</td>';
                    echo '<td>Dice Roll History</td>';
                    echo '<td>Position History</td>';
                    echo '<td>CoordinateHistory</td>';
                    echo '<td>WinnerStatus</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td> Player 1</td>';
                    echo '<td>'.$player_one->getDiesHistory().'</td>';
                    echo '<td>'.$dies_hist_one = $player_one->positionHistory($player_one_dies, $k).'</td>';
                    echo '<td>'.$player_one->getCopositions($dies_hist_one, $p).'</td>';
                    echo '<td>'.$winner_player_1.'</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td> Player 2</td>';
                    echo '<td>'.$player_two->getDiesHistory().'</td>';
                    echo '<td>'.$dies_hist_two = $player_two->positionHistory($player_two_dies, $k).'</td>';
                    echo '<td>'.$player_one->getCopositions($dies_hist_two, $p).'</td>';
                    echo '<td>'.$winner_player_2.'</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td> Player 2</td>';
                    echo '<td>'.$player_three->getDiesHistory().'</td>';
                    echo '<td>'.$dies_hist_three = $player_three->positionHistory($player_three_dies, $k).'</td>';
                    echo '<td>'.$player_three->getCopositions($dies_hist_three, $p).'</td>';
                   
                    echo '<td>'.$winner_player_3.'</td>';
                    echo '</tr>';
                    echo '</table>';
                }
    ?>
</body>
</html>