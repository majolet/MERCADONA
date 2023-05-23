<div class="row">
  <?php
  include_once "../config/dbconnect.php";
  $sql = "SELECT * FROM product, category WHERE product.category_id=category.category_id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      // Désignations personnalisées pour chaque carte
      $designation = 'Product ' . $row['product_id'];
      $description = 'Description of ' . $row['product_name'];
      $category = 'catégorie : ' . $row['product_name'];
  ?>
      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="<?= $row['product_image'] ?>" alt="<?= $designation ?>">
          <div class="card-body">
            
            <p class="card-text"><?= $row['product_name'] ?></p>
            <p class="card-text">catégorie : <?= $row['category_name'] ?></p>
            <p class="card-text"><?= $row['price'] ?> €</p>
            
            <?php
            $sqlPromotion = "SELECT * FROM promotion WHERE id_product = " . $row['product_id'];
            $resultPromotion = $conn->query($sqlPromotion);

            if ($resultPromotion->num_rows > 0) {
              while ($rowPromotion = $resultPromotion->fetch_assoc()) {
                // Afficher les informations sur la promotion
                $discount = 'réduction ' .$rowPromotion['discount'] . '% ';
                $newPrice = 'Nouveau prix: ' . $rowPromotion['new_price']. '€';


                echo '<p class="card-text">' . $discount . '</p>';
                echo '<p class="card-text" style="color:red">' . $newPrice . '</p>';

              }
            }
            ?>
          </div>
        </div>
      </div>
  <?php
    }
  } else {
    echo '<p>Aucun produit trouvé.</p>';
  }
  ?>
</div>

<style>
  .card {
    height: 400px;
  }
  .card-img-top {
    height: 200px;
    object-fit: cover;
    
  }
  .card-body {
    height: 200px;
    color: white;
    text-align: center;
  }
  
</style>
