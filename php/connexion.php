<?php 
    $conn = new PDO('mysql:host=localhost;dbname=projet', 'root', '');
    $error="";
    if(isset($_POST['submit_connexion'])){
        $mail = htmlspecialchars($_POST['session_mail']); 
        $password=$_POST['session_password'];
        $req=$conn->prepare("SELECT * From client WHERE mail=? AND password=?");
        $req->execute(array($mail,$password));
        $request = "SELECT * From client WHERE mail='$_POST[session_mail]'
        AND `password`='$_POST[session_password]';";
        $result = $conn->query($request);
        
        if(!$conn){
            echo "la connection a échoué. Veuillez réessayer";
        }else{
            if($req->rowCount() ==1){
                $user = $req->fetch();
                $_GET['user']=$user['userid'];
                $_SESSION['client_id'] = $user['userid'];
                $_SESSION['user']=$user;
                $_SESSION['client_name']=$user['name'];
                $_SESSION['logged']=true;
                header("location:/main_user.php");
            } else{
                $error ="nom d'utilasateur ou mot de passe incorrect";
                header("location:/portfolio.php");

            }
        }
    }
?>