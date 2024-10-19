<?php

    $host = '127.0.0.1';
    $port = '3306';
    $db = 'financeDB';
    $dns = "mysql:host=$host;port=$port;dbname=$db";

    $username = 'root';
    $password = 'M12n2B3v4!';

    $conn = new PDO($dns, $username, $password);

    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = 'INSERT INTO signup(firstName, lastName, email, password) values (:firstName, :lastName, :email, :password)';

    $statement = $conn->prepare($query);

    $statement->bindValue(":firstName", $firstName);
    $statement->bindValue(":lastName", $lastName);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":password", $password);

    $statement->execute();
    
    header('Location: /frontend/html/login_page.html');
    exit();

?>