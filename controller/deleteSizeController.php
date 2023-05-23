<?php

    include_once "../config/dbconnect.php";
    
    $id=$_POST['record'];
    $query="DELETE FROM sizes where size_id='$id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo "La modification a bien été enregistrée.";
    }
    else{
        echo "impossible de supprimer cet enregistrement";
    }
    
?>