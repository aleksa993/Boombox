<?php
    session_start();
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style/style4.css">
    <title>Boombox</title>
</head>
<body>
    
    <div class="container">
        <div class="login-box">
        <div class="row">
        <div class="col-md-6 login-left">
            <h2>Login Here</h2>
            <form action="validationAdmin.php" method="POST">
                <div class="form-group">
                    <label>Ime</label>
                    <input type="text" name="name" class="form-control" required> 
                </div>
                <div class="form-group">
                    <label>Lozinka</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div id="errMsg" style="color: black; margin: 5px; font-weight: bold;">
                <?php if(!empty($_SESSION['errMsg'])) { echo $_SESSION['errMsg']; } ?>
                </div>
                <?php unset($_SESSION['errMsg']); ?>
                <button type="submit" name="login-submit" class="btn btn-primary">Login</button>
            </form>
        </div>
        </div>
        </div>
    </div>





</body>
</html>