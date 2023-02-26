<?php
// Vérifier si un fichier a été téléchargé
if(isset($_FILES["file"])) {
  // Vérifier si le fichier est valide
  $file_name = $_FILES["file"]["name"];
  $file_size = $_FILES["file"]["size"];
  $file_tmp = $_FILES["file"]["tmp_name"];
  $file_type = $_FILES["file"]["type"];
  $file_ext = strtolower(end(explode('.',$_FILES["file"]["name"])));
  
  // Si tous les types de fichiers sont autorisés, vous pouvez ignorer la vérification d'extension
  $allowed_ext = array();
  
  if($file_size <= 1000000000) { // 1 To = 1000000000 octets
    // Si le fichier est valide, déplacez-le vers le dossier de téléchargement
    $new_file_name = uniqid("", true) . "." . $file_ext;
    move_uploaded_file($file_tmp, "uploads/" . $new_file_name);
    echo "Le fichier $file_name a été téléchargé avec succès.<br />";
    echo "Lien de téléchargement : <a href='http://uploads.slohweb.ml/uploads/$new_file_name' target='_blank'>http://uploads.slohweb.ml/uploads/$new_file_name</a>";



  } else {
    // Si le fichier n'est pas valide, affichez un message d'erreur
    echo "Le fichier ne doit pas dépasser 1 To.";
  }
}
?>

