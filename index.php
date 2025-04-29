<!--
Procedura
1. Creazione del form per richiedere la lunghezza della password √
2. inviamo il risultato tramite $_GET
3. Creazione di una funzione per generare una password casuale (composta da lettere minuscole, maiuscole, numeri e/o simboli) e con la lunghezza richiesta 
-->
<?php 

// settiamo il valore iniziale della variabile 
$userPasswordLength = 0;
// ricaviamoci la lunghezza richiesta dal cliente validandola, e sostituendola nella variabile
if(isset($_GET['passwordLength']) && is_numeric($_GET['passwordLength']) && $_GET['passwordLength'] > 0){
    $userPasswordLength = (int) $_GET['passwordLength'];
};

var_dump($userPasswordLength)
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="">
    <div>
        <label for="passwordLength">Lunghezza Password</label>
    </div>
    <input type="number" name="passwordLength">
    <button type="submit">invia</button>
</form>
    
</body>
</html>