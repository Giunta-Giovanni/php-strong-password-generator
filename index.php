<?php 
    //avviamo la sessione
    session_start();

    // importiamo le funzioni
    include_once 'functions.php';


    // settiamo il valore iniziale della variabile 
    $userPasswordLength = 0;
    $need_lowerletters =false;
    $need_upperletters =false;
    $need_numbers =false;
    $need_symbols =false;


    // ricaviamoci la lunghezza richiesta dal cliente validandola, e sostituendola nella variabile
    if(isset($_POST['passwordLength']) && is_numeric($_POST['passwordLength']) && $_POST['passwordLength'] >= 4){
        $userPasswordLength = (int) $_POST['passwordLength'];

        $need_lowerletters =isset($_POST['lowerLetters']);
        $need_upperletters =isset($_POST['upperLetters']);
        $need_numbers =isset($_POST['number']);
        $need_symbols =isset($_POST['symbol']);
    };

    // var_dump($_POST);

    $userGeneratedPassword = generatePassword($userPasswordLength, $need_lowerletters, $need_upperletters, $need_numbers, $need_symbols );

    // var_dump($userGeneratedPassword);
    
    // inseriamo il risultato nella sessione 
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
    <link rel="stylesheet" href="./style.css">
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
                    value="4"
                    min="4" 
                    placeholder="Password minima 4 caratteri" 
                    required>
            </div>

            <div class="selection">
                    <input type="checkbox" id="lowerLetters" name="lowerLetters">
                    <label for="lowerLetters">lowerLetters</label>

                    <input type="checkbox" id="upperLetters" name="upperLetters">
                    <label for="upperLetters">upperLetters</label>

                    <input type="checkbox"id="number" name="number">
                    <label for="number">number</label>

                    <input type="checkbox" id="symbol" name="symbol">
                    <label for="symbol">symbol</label>
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