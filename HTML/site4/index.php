<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Iniciando no PHP</title>
        <link rel="stylesheet" href="css/bootstrap-reboot.css" />
        <link rel="stylesheet" href="css/bootstrap.css" />                
        <link rel="stylesheet" href="css/style.css" />
        
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    </head>
    <body>
        <div class="container">
            <h1>Calculadora em PHP</h1>
            <br />
            <form action="somar.php" method="GET">
                <div class="form-group row">
                    <label for="num1" class="col-2 col-form-label">Número 1</label>
                    <div class="col-10">
                        <input class="form-control" type="text" id="num1" name="num1" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="num2" class="col-2 col-form-label">Número 2</label>
                    <div class="col-10">
                        <input class="form-control" type="text" id="num2" name="num2" />
                    </div>
                </div>
                <input type="submit" value="Calcular" class="btn btn-primary float-right" />
            </form>            
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>