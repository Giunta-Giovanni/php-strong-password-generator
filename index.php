<!-- importiamo i file necessari -->
<?php 
// file functions
require_once 'functions.php';
?>

<!-- dati utente dall'url -->
<?php 
    // settiamo il valore iniziale della variabile 
    $userPasswordLength = 0;

    // ricaviamoci la lunghezza richiesta dal cliente validandola, e sostituendola nella variabile
    if(isset($_GET['passwordLength']) && is_numeric($_GET['passwordLength']) && $_GET['passwordLength'] >= 4){
        $userPasswordLength = (int) $_GET['passwordLength'];
    };

    // var_dump($userPasswordLength)
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
        
        <form method="GET" class="container mb-4">
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
            <div class="d-grid">
                <button type="submit" class="btn btn-primary rounded-pill">
                    Invia
                </button>
            </div>
        </form>

        <div class="container text-center">
            <h2 class="h5 mb-3">La tua Password</h2>
            <div class="alert alert-info fw-bold">
                <?php 
                    if($userPasswordLength === 0 || $userPasswordLength === null){
                        echo "Non hai generato nessuna password";
                    } else {
                        echo generatePassword($userPasswordLength);
                    }
                ?>
            </div>
        </div>
    </main>
    
    
</body>
</html>