<?php
$html = '
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

            <table class="table">
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
    foreach ($rows as $row) {
        $html .= '.<tr>
            <td>' . $row['cust_id'] . '</td>
            <td>' . $row['first_name'] . '</td>
            <td>' . $row['Pro_title'] . '</td>
            <td>' . $row['Pro_price'] * $row['qnty'] . 'ETB' . ' </td>
            <td>' . $row['qnty'] . '</td>
            <td>' . $row['email'] .
            //  $space 
             '</td>
            <td>' . $row['address'] . '</td>
        </tr>';
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

</html>';
ob_start ();
require('./FPDF-master/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,$html);
$pdf->Output('D','dic.pdf',true);
ob_end_flush();
?>