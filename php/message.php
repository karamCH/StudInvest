<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nuitinfo";
    $conn = new PDO('mysql:host=localhost;dbname=nuitinfo', 'root', '');

    if (isset($_POST["envoyer"])){
        $problem=$_POST['nature'];
        $level=$_POST['level'];
        $sql = "INSERT INTO problem(problem,level) VALUES ('$problem','$level')";
        echo "<h2>Votre message a bien éte recu.....</h2>";
?>