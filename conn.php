<?php
try {
    $connexion = new PDO('mysql:host=localhost;dbname=taratanin', 'root', '');
    // echo 'connexion a la base de donnee etablie ';
} catch (PDOException $th) {
    $th->getMessage();
}
?>