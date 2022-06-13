<?php
try {
    $connexion = new PDO('mysql:host=localhost;dbname=taratanin', 'root', '');
    echo 'connexion a la base de donnee etablie ';
} catch (PDOException $th) {
    $th->getMessage();
}
if(isset($_POST['passe'])){
    if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['password']) ); {
       $nom = htmlspecialchars($_POST['nom']);
       $prenom = htmlspecialchars($_POST['prenom']);
       $email= htmlspecialchars($_POST['email']);
       $password = sha1($_POST['password']);
       $cpassword =sha1($_POST['password_confirm']);
    $insertTonden = $connexion->prepare('INSERT INTO tondenw ( nom, prenom, email, password, password_confirm) VALUES(?,?,?,?,?)');
    $insertTonden->execute(array($nom,$prenom, $email,$password,$cpassword));
     
    }  
    if (empty($_POST['email']) ||  !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) ) {
        echo "votre adresse mail n'est pas valide";
    }else{
        $req = $connexion->prepare('SELECT id_tonden FROM tondenw WHERE email=?');
        $req->execute([$_POST['email']]);
        $mail = $req->fetch();
        if($mail){
            echo "Cette adresse mail existe déjà. Réessayez";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/Ajoutertondenw.css">
    <title>Ajouter Tondenw</title>
</head>
<body>
    <style>
        input{
            width: 200px;
            height: 40px;
        }
        button{
            width: 100px;
        }
        body{
            width: 470px;
            height: 340px;
            margin: 360px;
            margin-top: 0px;
            background-image: url('/assets/images/tontine.png'); 
            background-size: cover;
            background-repeat: no-repeat;
}
        
       
    </style>
    
    <form action="" method="POST">
        <div class="form-group">
            <input class="form-control" type="text" name="nom" placeholder="nom">
        </div><br>
        <div class="form-group">
            <input class="form-control" type="text" name="prenom" placeholder="prenom">
        </div><br>
        <div class="form-group">
            <input class="form-control" type="email" name="email" placeholder="email">
        </div><br>
        <div class="form-group">
            <input class="form-control"  type="password" name="password" placeholder="mot de passe">
        </div><br>
        <div class="form-group">
        <input class="form-control"  type="password" name="password_confirm" placeholder="confirmer votre mot de passe">
    </div><br>
        <button type="submit" name="passe" class="btn btn-primary">Ajouter</button>
        <button type="reset" class="btn btn-danger">Annuler</button>
    </form>
    
    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>