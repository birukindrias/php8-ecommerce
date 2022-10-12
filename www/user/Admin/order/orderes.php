<style lang="css">
    table{
        border-collapse: collapse;
    }
    .tr {
        width: 3rem;
        color: yellow;
    }
</style>
<?php
include_once "../../../vendor/autoload.php";

use Dompdf\Css\Style;
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();

$options->set('defaultFont', 'Segoe UI, Roboto, Oxygen, Ubuntu, Cantarell, Open Sans, Helvetica Neue, sans-serif');
$gt = 0;
$t = 1;
$html .= '
<div class="container">

    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center">Orders</h1>

            <hr style="height: 1px;font-wight: italic;width: 20px;color: black;background-color: black;">
        </div>

        <div>
        </div>

    </div>
    <div>

    <div class="row">
        <div class="col-md-12">

            <table class="table" border="0.01px solid black" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>first_name</th>
                        <th>Product Title</th>
                        <th>Product Price</th>
                        <th>Quantuty</th>
                        <th>E-mail</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>';


include "catagory_model.php";
$model = new order();
$rows = $model->fetch_order();
$i = 1;
if (!empty($rows)) {
    foreach ($rows as $row) {
        $space = ".   .";
        $html .= '.<tr>
            <td>' . $row['cust_id'] . '</td>
            <td>' . $row['first_name'] . '</td>
            <td>' . $row['Pro_title'] . '</td>
            <td>' . $row['Pro_price'] * $row['qnty'] . 'ETB' . ' </td>
            <td>' . $row['qnty'] . '</td>
            <td>' . $row['email'] . $space . '</td>
            <td>' . $row['address'] . '</td>
        </tr>';
    }
} else {
    echo "no users until";
}


$html .= '
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
ob_end_clean();
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('report.pdf');

// echo $html;
?>
