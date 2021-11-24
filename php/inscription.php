<?php
    $conn = new PDO('mysql:host=localhost;dbname=projet', 'root', '');
    if (isset($_POST["formsend"])){
        $uname=$_POST['newname'];
        $email=$_POST['newmail'];
        $password=$_POST['newpassword'];
        if ($password == $_POST['cpassword']){
            $sql=$conn->prepare("INSERT INTO client(name, mail, password) VALUES (?, ?, ?)");
            $results = $sql->execute([$uname, $email, $password]);

            
            if(!$conn){echo"la connection a échoué";
                header("Refresh: 2;url='/portfolio.php'");}
            else{
                if ($results) {
                    session_start();

                    $req=$conn->prepare("SELECT * From client WHERE mail=? AND password=?");
                    $req->execute(array($email,$password));
                    $user = $req->fetch();
                    $_SESSION['logged']=true;
                    $_GET['user']=$user['userid'];
                    $_SESSION['client_id'] = $user['userid'];
                    $_SESSION['user']=$user;
                    $_SESSION['client_name']=$user['name'];
                    echo "<h1 style='text-align:center'>Votre compte a bien été crée</h1>";
                    header("Refresh: 1;url='/main_user.php'");
                }else{echo "<h2>l'inscription a échoué</h2>";
                    header("Refresh: 10;url='/portfolio.php'");
                }}}
        else{echo"Les deux mots de passe doivent etre identiques !";
            header("Refresh: 1;url='/portfolio.php'");
        }}
    else{ echo 'Veuillez bien remplir le formulaire';
        header("Refresh: 1;url='/portfolio.php'");
    }
?>


























