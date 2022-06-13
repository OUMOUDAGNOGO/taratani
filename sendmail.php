<?php
  $dest = "papuskone43@gmail.com";
  $sujet = "Un bon essaie";
  $corp = "Salut ceci est un email de test envoyer par un script PHP na son na anga yailai doni";
  $headers = "From: dagnogooumou@yopmail.com";
  if (mail($dest, $sujet, $corp, $headers)) {
    echo "Email envoyé avec succès à $dest ...";
  } else {
    echo "Échec de l'envoi de l'email...";
    var_dump();
  }
?>