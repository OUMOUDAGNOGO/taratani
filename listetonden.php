<!DOCTYPE html>
<html lang="en">
<head>
<style>
        table{
            border-collapse:collapse;
            width: 300px;
           
            
        }
        body{
            background-image:url('assets/images/tontine.png');
            background-size:cover;
        }
        h2{
            
            color: #2435CA;
        }
        
        
        
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/listetondew.css">
    <title>Liste Tondenw</title>
</head>
<body>
   
    <div class="head">
        <img id="" src="assets/images/logo.png" width="100px;" height="100px;">
        <h2 style="text-align: center;">Liste Tondenw</h2>
    </div>
       
    <div class="container">
      
      <table class="table table-bordered">
        <thead>
          <tr>
             <th>ID</th>
             <th>NOM</th>
             <th>PRENOM</th>
             <th>EMAIL</th>
          </tr>
        </thead> 
<?php
       include("conn.php");
   $req= "SELECT * FROM tondenw";
        $ps=$connexion->prepare($req);
         $ps->execute();

?>
<?php while ($et=$ps->fetch()) {?>

<tr>
    <td><?php echo ($et['id_tonden'])?></td>
    <td><?php echo ($et['nom'])?></td>
    <td><?php echo ($et['prenom'])?></td>
    <td><?php echo ($et['email'])?></td>
<tr>
<?php } ?> 

            
  </table>                   
 </body>
</html>