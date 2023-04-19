<?php

function getPassword($length) {

    $letters = 'abcdefghijklmnopqrstuvwyz';
    $numbers = '0123456789';
    $simbols = '+-*/@[]{}#_=$?!%';
    
    $string = $letters. strtoupper($letters). $numbers. $simbols;
    
    $total_string = mb_strlen($string);
    
    $password = '';

    while(mb_strlen($password) < $length) {

        $random = rand(0, $total_string - 1) ;

        $random_string = $string[$random];

        $password.= $random_string;
    }

    return $password;
}

if(isset($_GET['length'])) {
    $element = getPassword($_GET['length']);
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <title>PHP Strong Password Generator</title>
    </head>

    <body class="bg-primary">
        
        <div class="container text-center col-6 mt-5">
            <div class="row justify-content-center mb-5">
                <div class="col-8 text-center">
                    <h1 class="text-dark fw-bold">Strong Password Generator</h1>
                    <h2 class="text-white">Genera una password sicura</h2>
                </div>
            </div>

            <?php if (isset($element)) { ?>
                <div class="col-12">
                    <div class="alert alert-success" role="alert">
                   La tua password è : <strong><?php echo $element ?></strong>
                   </div>
                </div>
            <?php } ?>

            <main class="border border-2 rounded-2 bg-white">
                <form action="index.php" method="GET">
                    <div class="d-flex justify-content-between mt-5 mb-5 ms-3 me-3">
                        <label class="form-label" for="length">
                            <strong>Lunghezza password:</strong>
                        </label>
                        <input class="form-label" type="number" id="length" name="length" min="6" value="6" step="1">     
                    </div>
                    <div class="d-flex">
                        <div class="d-flex justify-content-start ms-3 me-3 mb-5">
                            <button class="btn btn-secondary me-2">Invia</button>
                            <a href="index.php" class="btn btn-primary">Annulla</a>
                        </div>  
                    </div>            
                </form>
            </main>
        </div>
    </body>
</html>