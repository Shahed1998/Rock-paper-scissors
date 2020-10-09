<?php
    if(isset($_POST['cancel'])){
        header("Location: index.php");
        exit();
    }
    // if string length less than 1 then return to login page 
    if ( strlen($_REQUEST['name']) < 1  ) {
        exit("Please enter your name to proceed further");  
    }
    // computer_choice =cc & human_choice = hc
    $cc = mt_rand(1,3); // Mersenne Twister algorithm mt_
    $res = "";
    $val = array("","Rock","Paper","Scissors");
    $hc = isset($_POST['human'])?$_POST['human']+0:0; // used ternary operation
    // To be continued....
    if($hc == 0){
        $cc = 0;
        $res = "Please enter your choice";
    }elseif($hc==$cc){
        $res = "Tie";
    }elseif($hc==1&&$cc==2||$hc==2&&$cc==3||$hc==3&&$cc==1){
        $res = "You loose ";
    }elseif($hc==1&&$cc==3||$hc==2&&$cc==1||$hc==3&&$cc=2){
        $res = "You win";
    }else{  
         $res = "Please enter your choice";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game page</title>
</head>
<body>
    <h2>Welcome to the game <?=htmlspecialchars($_REQUEST['name'])//$_REQUEST captures both post and get ?>  </h2>
    <p>
        <form method="post">
            <select name="human" >
                <option value="0">Select</option>
                <option value="1">Rock</option>
                <option value="2">Paper</option>
                <option value="3">Scissors</option>   
            </select>    
            <input type="submit" value="Play" name="play">
            <input type="submit" name="cancel" value="Cancel" > 
        </form>
    </p>
    <p>
        <?php
            echo "<pre>";
            echo "</br>Human choice = ".$val[$hc]." </br>Computer choice = ".$val[$cc];
            echo "</br>".$res;
            echo "</pre>";

        ?>
    </p>
</body>
</html>
