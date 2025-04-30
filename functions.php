<?php

//creiamo una funzione generica che mi estrapola un carattere random
function randomChars(string $stringChars) :string {
    return $stringChars[random_int(0,strlen($stringChars) -1 )];
};

function generatePassword($passwordlength, $include_lowercaseChars, $include_uppercaseChars, $include_numbers, $include_specialChars){
    //creiamo le stringhe contenenti i caratteri
    $lowercaseChars = 'abcdefghijklmnopqrstuvwxyz';
    $uppercaseChars= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers = '123456789';
    $specialChars = '!\"#$%&\'()*+,-./:;<=>?@[\]^_`{|}~';

    $selectedChars = '';
    // creiamo la stringa password inizialmente vuota
    $password = '';

    // include le minuscole nei caratteri selezionati se abilitate
    if($include_lowercaseChars){
        $selectedChars = $selectedChars . $lowercaseChars;
    }
    // include le maiuscole nei caratteri selezionati se abilitate
    if($include_uppercaseChars){
        $selectedChars .= $uppercaseChars;
    }
    // include i numeri nei caratteri selezionati se abilitate
    if($include_numbers){
        $selectedChars .= $numbers;
    }
    // include i speciali nei caratteri selezionati se abilitate
    if($include_specialChars){
        $selectedChars .= $specialChars;
    }
    
    // se nessun carattere è stato selezionato includili tutti
    if(empty($selectedChars)){
        $selectedChars .= $lowercaseChars . $uppercaseChars . $numbers . $specialChars;
    }

    //mischiamo i caratteri per un maggior rendimento
    $selectedChars = str_shuffle($selectedChars);

    // effettuiamo un ciclo per la lunghezza richiesta
    for($i = 0; $i < $passwordlength; $i++){
    
    // inseriamo ad ogni iterazione un carattere da quelli selezionati
    $password .= randomChars($selectedChars);
    


    // PRIMA PROVA
    // creiamoci un numero casuale in base alle possibilità dei caratteri e lo salviamo in variabile
   
    // $randomselectionChars = rand(1,4);

    //     //se il numero casuale è 1 
    //     if($randomselectionChars === 1){
    //         //inseriamo un carattere minuscolo
    //         $password .= randomChars($lowercaseChars);
    //     }
    //     //se il numero casuale è 2
    //     elseif($randomselectionChars === 2){
    //         //inseriamo un carattere maiscolo
    //         $password .= randomChars($uppercaseChars);
    //     }
    //     //se il numero casuale è 3
    //     elseif($randomselectionChars === 3){
    //         //inseriamo un numero
    //         $password .= randomChars($numbers);
    //     }
    //     //se il numero casuale è 4
    //     else{
    //         //inseriamo un carattere speciale
    //         $password .= randomChars($specialChars);
    //     }


    }
    return $password;
}

?>