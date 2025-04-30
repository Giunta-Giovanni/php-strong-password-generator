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