<?php

    require __DIR__."/authenticated.php";

    ## Prepare Connection ##

    $host = '127.0.0.1';
    $port = '3306';
    $db = 'financeDB';
    $dns = "mysql:host=$host;port=$port;dbname=$db";
    
    $username = 'root';
    $password = 'M12n2B3v4!';

    $conn = new PDO($dns, $username, $password);
    
    $query="SELECT * FROM signup;";

    $statement = $conn->prepare($query);
    $statement->execute();
    
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);

    function find_user_login($user_db) {

        $email = $_POST['login-email'];
        $password = $_POST['login-password'];
    
        foreach($user_db as $user) {
    
            if ($email == $user['email'] && $password == $user['password']) {
                return true;                
            } 
        };
        return false;
    };
    
    session_start();

    $_SESSION['logged-in'] = find_user_login($users);

    if ($_SESSION['logged-in']) {
        header('Location: /index.php');
        exit();
    } else { 
        header('Location: /frontend/html/login_page.html');
        exit();
    }

?>
