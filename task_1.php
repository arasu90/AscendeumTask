<?php
$wallet_balance = 100;
$dies_1 = $dies_2 = $sum_value = $bet_type_value = $msg_alert = '';
if(isset($_POST['submit_bet'])){
    $bet_type = $_POST['bet_type'];
    $wallet_balance = (isset($_POST['current_wallet'])) ? $_POST['current_wallet'] : $wallet_balance;
    if($wallet_balance <= 0){
        $msg_alert = "Sorry You don't have balance please reset the Game";
    }else{
        $dies_1 = rand(1,6);
        $dies_2 = rand(1,6);
        $sum_value = $dies_1 + $dies_2;
        $wallet_balance = $wallet_balance-10;
        if($bet_type == 7){
            if($sum_value == 7){
                $wallet_balance = $wallet_balance + 30;
                $msg_alert = "Congratulations You Win! Your balance is now Rs.".$wallet_balance;
            }
            $bet_type_value = "7";
        }
        
        if($bet_type == 6){ 
            if($sum_value < 7){
            $wallet_balance = $wallet_balance + 20;
            $msg_alert = "Congratulations You Win! Your balance is now Rs.".$wallet_balance;
            }
            $bet_type_value = "Below 7";
        }

        if($bet_type == 8 ){
            if($sum_value > 7){
                $wallet_balance = $wallet_balance + 20;
                $msg_alert = "Congratulations You Win! Your balance is now Rs.".$wallet_balance;
            }
            $bet_type_value = "Above 7";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to lucky 7 Game</h1>

    <p>Current Balance : <strong><?php echo $wallet_balance; ?></p></strong>
    <h5>Place your Bet (Rs.10 )</h5>
    <form action="" method="post">
        <input type="hidden" name="current_wallet" value="<?php echo $wallet_balance; ?>">
        <p>Your Bet Options:</p>
        <input type="radio" name="bet_type" value="6" required> Below 7 <br />
        <input type="radio" name="bet_type" value="7" required> 7<br />
        <input type="radio" name="bet_type" value="8" required> Above 7<br />
        <p>
            <button type="submit" name="submit_bet">Play</button>
            <a href="" >Reset</a>
        </p>
    </form>
    <?php
    if(isset($_POST['submit_bet'])){
        if($wallet_balance >0){
        ?>
        <p><strong>Game result:</strong></p>
        <p>Dies 1 : <?php echo $dies_1 ?></p>
        <p>Dies 1 : <?php echo $dies_2 ?></p>
        <p>Total : <?php echo $sum_value ?></p>
        <p>Your Option is : <?php echo $bet_type_value ?></p>
        <br />
        <br />
        
        <?php
        }
        echo '<p>'.$msg_alert.'</p>';
    }
    ?>
</body>
</html>