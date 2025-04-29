<!-- ricaviamo i dati utente -->
<?php 
    // settiamo il valore iniziale della variabile 
    $userPasswordLength = 0;

    // ricaviamoci la lunghezza richiesta dal cliente validandola, e sostituendola nella variabile
    if(isset($_GET['passwordLength']) && is_numeric($_GET['passwordLength']) && $_GET['passwordLength'] >= 4){
        $userPasswordLength = (int) $_GET['passwordLength'];
    };

    // var_dump($userPasswordLength)
?>


<!-- creiamo la funzione per generare password casuale -->
<?php

//creiamo una funzione generica che mi estrapola un carattere random
function randomChars(string $stringChars) :string {
    return $chars = $stringChars[rand(0,strlen($stringChars) -1 )];
};

function generatePassword(int $passwordlength){
    //creiamo le stringhe contenenti i caratteri
    $lowercaseChars = 'abcdefghijklmnopqrstuvwxyz';
    $uppercaseChars= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers = '123456789';
    $specialChars = '!\"#$%&\'()*+,-./:;<=>?@[\]^_`{|}~';

    // creiamo la stringa password inizialmente vuota
    $password = '';

    for($i = 0; $i < $passwordlength; $i++){
    // creiamoci un numero casuale in base alle possibilità dei caratteri e lo salviamo in variabile
    $randomselectionChars = rand(1,4);

        //se il numero casuale è 1 
        if($randomselectionChars === 1){
            //inseriamo un carattere minuscolo
            $password .= randomChars($lowercaseChars);
        }
        //se il numero casuale è 2
        elseif($randomselectionChars === 2){
            //inseriamo un carattere maiscolo
            $password .= randomChars($uppercaseChars);

        }
        //se il numero casuale è 3
        elseif($randomselectionChars === 3){
            //inseriamo un numero
            $password .= randomChars($numbers);
        }
        //se il numero casuale è 4
        else{
            //inseriamo un carattere speciale
            $password .= randomChars($specialChars);
        }
    }
    return $password;
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>
    GENERA PASSWORD
</h1>
<form action="">
    <div>
        <label for="passwordLength">Lunghezza Password</label>
    </div>
    <input 
        type="number" 
        name="passwordLength" 
        min="4" 
        placeholder="password minima 4 caratteri" >
    <button type="submit">invia</button>
</form>


<div>
    <h2>La tua Password</h2>
    <p>
        <?php 
            if($userPasswordLength === 0 || $userPasswordLength === null){
                echo "Non hai generato nessuna password";
            }else{
                echo (generatePassword($userPasswordLength));
            }
        ?>
    </p>

</div>
    
</body>
</html>