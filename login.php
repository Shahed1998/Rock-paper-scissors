<?php 
    $nameErr=$name=$passErr=$pass="";

    if(isset($_POST["cancel"])){
        header("Location: index.php");
        exit;
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){

        if(empty($_POST['name'])){
            $nameErr = " input field required";
        }
        else{
            $name = test_input($_POST['name']);
             if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                $name="";
                $nameErr = "Only letters and white space allowed";
                exit("Wrong name, Only letters and white space allowed ");
            }
        }
        // stored values 
        $salt = "Xa~b_q1@2#657";
        $stored_hash = "1b8196e7ac2c118d431de477279cdcd1";

        if(empty($_POST['pwd'])){
            $passErr = " input field required";
        }else{
            $pass = htmlspecialchars($_POST['pwd']);
            $check = hash('md5',$salt.$pass);
             if($check == $stored_hash){
                header("Location: game.php?name=".urlencode($_POST['name']));
                exit;
             }else{
                 $passErr = "Wrong password";
             }
            
        }
    }


    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page </title>
</head>
<body>
    <form method="POST">
        <label for="name">Enter your name :</label><br>
        <input type="text" name="name" id="name" value="<?=$name?>" ><span>*<?= $nameErr ?></span><br><br>
        <label for="pass">Enter your password :</label><br>
        <input type="password" name="pwd" id="pass"><span>*<?= $passErr ?></span><br><br>
        <input type="submit" value="Log In">
        <input type="submit" name="cancel" value="Cancel" >
    </form>
</body>
</html>

