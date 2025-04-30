<?php 
    //avviamo la sessione
    session_start();

    // importiamo le funzioni
    include_once 'functions.php';


    // settiamo il valore iniziale della variabile 
    $userPasswordLength = 0;

    // ricaviamoci la lunghezza richiesta dal cliente validandola, e sostituendola nella variabile
    if(isset($_POST['passwordLength']) && is_numeric($_POST['passwordLength']) && $_POST['passwordLength'] >= 4){
        $userPasswordLength = (int) $_POST['passwordLength'];
    };

    $userGeneratedPassword = generatePassword($userPasswordLength);

    //inseriamo il risultato nella sessione 
    $_SESSION['userGeneratedPassword'] = $userGeneratedPassword;

    // se la sessione è stata riempita
    if($_SESSION['userGeneratedPassword']){
        header('Location: ./result.php');
        exit;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class= "bg-light">

    <header>
        <h1 class="text-center text-primary my-4">
            GENERA PASSWORD
        </h1>
    </header>
    
    <main>  
        <form method="POST" class="container mb-4">
            <div class="mb-3">
                <label for="passwordLength" class="form-label">Lunghezza Password</label>
                <input 
                    type="number" 
                    class="form-control" 
                    name="passwordLength" 
                    min="4" 
                    placeholder="Password minima 4 caratteri" 
                    required>
            </div>
            <div class="row justify-content-center m-3">
                <div class="col">
                    <input type="checkbox">
                    <label for="">letter</label>
                </div>
                <div class="col">
                    <input type="checkbox">
                    <label for="">number</label>
                </div>
                <div class="col">
                    <input type="checkbox">
                    <label for="">symbol</label>
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary rounded-pill">
                    Invia
                </button>
            </div>
        </form>
    </main>
</body>
</html>