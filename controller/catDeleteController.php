<?php

    include_once "../config/dbconnect.php";
    
    $c_id=$_POST['record'];
    $query="DELETE FROM category where category_id='$c_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo "La modification a bien été enregistrée.";
    }
    else{
        echo"impossible de supprimer cet enregistrement";
    }
    
?>