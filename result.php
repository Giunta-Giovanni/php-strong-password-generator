<?php
session_start();

// se la password non è stata generata
if(!isset($_SESSION['userGeneratedPassword'])){
    // portiamo l'utente alla home
    header('Location: ./index.php');
}

$userPassword = $_SESSION['userGeneratedPassword'];

// var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<div class="container text-center">
        <h2 class="h5 mb-3">La tua Password</h2>
        <div class="alert alert-info fw-bold">
            <?php 
                if(strlen($userPassword) === 0){
                    echo "Non hai generato nessuna password";
                } else {
                    echo $userPassword;
                }
            ?>
        </div>
        <div>
            <a href="./index.php">Torna alla home</a>
        </div>
    </div>
    
</body>
</html>