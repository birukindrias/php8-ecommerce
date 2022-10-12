<?php
// include_once "../header.php";
?>
<!-- <style lang="">
  a {
    color: white;
  }
</style> -->
<?php
include_once "../../../vendor/autoload.php";
use Dompdf\Dompdf;
$gt =0;
$t =1;
$html .='
<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5">
      <h1 class="text-center">Products</h1>
      <hr style="height: 1px;color: black;background-color: black;">
    </div>

    <div><a href="./create_product.php" style="color: blue;">create Product</a></div>

  </div>
  <div><a href="../index.php" style="color: blue;">Go Back</a></div>

  <div class="row">
    <div class="col-md-12">

      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Product title</th>
            <th>Product price</th>
            <th>Product description</th>
            <th>Product image</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>';
      

          include "product_model.php";
          $model = new Model();
          $rows = $model->fetch();
          $i = 1;
          if (!empty($rows)) {
            foreach ($rows as $row) {
     
            $html .= '. <tr>
                <td>'. $i++.'</td>
                <td> '.$row['Pro_title'].'</td>
                <td> '.$row['Pro_price'].'</td>
                <td> '.$row['Pro_desc'].'</td>
                <td>
                  <img src="images/'.$row['Pro_image'].'" width="185rem" height="120rem" >
                </td>
                <td>
                  <a href="product.php?id='. $row['Pro_id'] .'" class="badge badge-info">Read</a>
                  <a href="delete_product.php?id='. $row['Pro_id'] .'" class="badge badge-danger">Delete</a>
                  <a href="edit_product.php?id='. $row['Pro_id'] .'" class="badge badge-success">Edit</a>
                </td>
              </tr>.';


            }
          } else {
            echo "no data";
          }

          $html .='
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>

';
$dompdf= new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4','portrait');
$dompdf->render();
$dompdf->stream('invoce.pdf');

// echo $html;
?>


// $dua='

