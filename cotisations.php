<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/listetondews.css">
    <title>Cotisation</title>
</head>
<body>
    <style>
        table{ 
         border-collapse: collapse;
          margin-left: 100px; 
          width: 1000px;
          height: 220px; 
         text-align: center; 
         background-color: rgb(253, 214, 214); 
       } 
       
    </style>
   
       <div class="heade">
            <a href="#" id="logo"><img src="assets/images/logo.png" width="100px;" height="100px;"></a>
            <h2 style="text-align: center;">COTISATIONS</h2>
       </div>
        <table>
            <thead>
                
                <tr>
                    <th>ID</th>
                    <th>montant</th>
                    <th>date</th>
                    <th>pariba</th>
                    <th>tonden</th>
                </tr>
            </thead>

            <?php
       include("conn.php");
   $req= "SELECT * FROM cotisations";
        $ps=$connexion->prepare($req);
         $ps->execute();

?>
<?php while ($et=$ps->fetch()) {?>

<tr>
    <td><?php echo ($et['id_cotisations'])?></td>
    <td><?php echo ($et['montant_cotisations'])?></td>
    <td><?php echo ($et['date_cotisations'])?></td>
    <td><?php echo ($et['id_pariba'])?></td>
    <td><?php echo ($et['id_tondenw'])?></td>
<tr>
<?php } ?> 

  
</body>
</html>