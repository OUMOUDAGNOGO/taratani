<?php
include 'conn.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.css">
    <title>Mot de passe oublier</title>
</head>

<body>
    <style>
        body{
           background-image:url('assets/images/tontine.png')
           background-size: cover;
           background-repeat: no-repeat;
        }
        .container{
            margin-left :400px;
        }
        h2{
            text-align:center;
            color:#2435CA;  
        }
        input{
            width:300px;
            height: 40px;
            background-color:#FEF9F9;
            border-radius 5px;
        }
    </style>
    <h2>Mot de passe oublier</h2>
    <form method="post">
        <div class="container">
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" required>
            <button type="submit">envoyer</button>
        </div>
    </form>
</body>

</html>

<?php

if (isset($_POST['email'])) {
    $password = uniqid();
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $subject = 'Mot de passe oublié';
    $message = "Bonjour, voici votre nouveau mot de passe : $password";
    $headers = 'Content-Type: text/plain; charset="UTF-8"';
    if (mail($_POST['email'], $subject, $message, $headers)) {
        $stmt = $db->prepare("UPDATE tondenw OR pariba SET password = ? WHERE email = ?");
        $stmt->execute([$hashedPassword, $_POST['email']]);
        echo "E-mail envoyé";
    } else {
        echo "Une erreur est survenue";
    }
}