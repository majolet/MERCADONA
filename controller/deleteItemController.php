<?php

    include_once "../config/dbconnect.php";
    
    $p_id=$_POST['record'];
    $query="DELETE FROM product where product_id='$p_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo "La modification a bien été enregistrée.";
    }
    else{
        echo "impossible de supprimer cet enregistrement";
    }
    
?>