<?php
echo "<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>";
?>

<body>
<div >
  <h2>Product Items</h2>
  <table class="table" id="productTable">
    <thead>
      <tr>
        <th class="text-center">id</th>
        <th class="text-center">image du produit</th>
        <th class="text-center">Nom</th>
        <th class="text-center">Description produit</th>
        <th class="text-center">Catégories</th>
        <th class="text-center">Prix unitaire</th>
        <th class="text-center">taux discount appliqué</th>
        <th class="text-center">nouveau prix</th>
        <th class="text-center">date de début</th>
        <th class="text-center">Date de fin</th>
        <th class="text-center" colspan="3">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from product, category WHERE product.category_id=category.category_id";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><img height='100px' src='<?=$row["product_image"]?>'></td>
      <td><?=$row["product_name"]?></td>
      <td><?=$row["product_desc"]?></td>      
      <td><?=$row["category_name"]?></td> 
      <td class="table-price"><?=$row["price"]?></td>     
      <td id="disountfield"></td>     
      <td id="newpricefield"></td>     
      <td id="stardatefield"></td>     
      <td id="endatefield"></td>     
      <td><button class="btn btn-primary" style="height:40px" onclick="itemEditForm('<?=$row['product_id']?>')">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="itemDelete('<?=$row['product_id']?>')">Delete</button></td>
      <td><button type="button" class="btn btn-warning " style="height:40px" data-toggle="modal" data-target="#myModalpromotion" data-price="<?= $row['price'] ?>" >
    Ajouter promotion</button></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Product
  </button>

  <!-- Modal add product -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Nouveau produit</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' onsubmit="send" method="POST">
            <div class="form-group">
              <label for="name">Nom du produit:</label>
              <input type="text" class="form-control" id="p_name" required>
            </div>
            <div class="form-group">
              <label for="price">Prix:</label>
              <input type="number" class="form-control" id="p_price" required>
            </div>
            <div class="form-group">
              <label for="qty">Description:</label>
              <input type="text" class="form-control" id="p_desc" required>
            </div>
            <div class="form-group">
              <label>Categorie:</label>
              <select id="category" >
                <option disabled selected>choisir une catégorie</option>
                <?php

                  $sql="SELECT * from category";
                  $result = $conn-> query($sql);

                  if ($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                      echo"<option value='".$row['category_id']."'>".$row['category_name'] ."</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
                <label for="file">Choisir une image:</label>
                <input type="file" class="form-control-file" id="file">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Ajouter produit</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Fermer</button>
        </div>
      </div>
      
    </div>
  </div>





  <!-- Modal Add promotion -->
<div class="modal fade" id="myModalpromotion" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">

      <h4 class="modal-title">Nouvelle promotion</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
      <div class="modal-body">
        
        <form  enctype='multipart/form-data'method="POST" enctype='multipart/form-data' id="addpromotion" >
          <div class="form-group">
 
          <input type="text" class="form-control" id="product_id" value="" hidden>
          </div>

          <div class="form-group">          
            <label for="price">Prix:</label>
            <input type="number" class="form-control" id="price">
          </div>
          <script>
            // Fonction appelée lorsqu'on ouvre la modal
            $('#myModalpromotion').on('show.bs.modal', function(event) {
              var button = $(event.relatedTarget); // Bouton qui a ouvert la modal
              var price = button.data('price'); // Récupérer la valeur du prix

              // Mettre à jour la valeur du champ "price" dans la modal avec le prix récupéré
              var modal = $(this);
              modal.find('#price').val(price);
            });
          </script>

          <div class="form-group">
            <label for="discount">Taux de promotion (%):</label>
            <input type="number" class="form-control" id="p_discount">
          </div>

          <div class="form-group">
            <button type="button" class="btn btn-primary" onclick="calculateDiscount()">Calculer le discount</button>
            <button type="button" class="btn btn-secondary" onclick="cancelDiscount()">Annuler le discount</button>
          </div>

          <div class="form-group">
            <label for="date">Prix avec réduction:</label>
            <input type="number" class="form-control" id="discountprice" readonly>
          </div>
          <script>
              function calculateDiscount() {
                var price = document.getElementById("price").value;
                var discount = document.getElementById("p_discount").value;
                var discountPrice = 0;

                if (discount !== "") {
                  discountPrice = price - (price * discount / 100);
                }

                document.getElementById("discountprice").value = discountPrice.toFixed(2);
              }

              function cancelDiscount() {
                document.getElementById("discountprice").value = "";
                document.getElementById("p_discount").value = "";
                document.getElementById("p_startdate").value = "";
                document.getElementById("p_enddate").value = "";
              }
          </script>

          <div class="form-group">
            <label for="date">Date de début de la promotion:</label>
            <input type="date" class="form-control" min="<?php echo date('Y-m-d'); ?>" id="p_startdate">
          </div>

          <div class="form-group">
            <label for="date">Date de fin de la promotion:</label>
            <input type="date" class="form-control" id="p_enddate">
          </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-secondary" id="upload" style="height:40px" >Ajouter promotion</button>
          </div>
          
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Fermer</button>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
