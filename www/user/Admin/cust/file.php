if (isset($_FILES['cust_image'])) {
$img_name = $_FILES['cust_image']['name'];
$img_type = $_FILES['cust_image']['type'];
$tmp_name = $_FILES['cust_image']['tmp_name'];
$img_explode = explode('.', $img_name);
$img_ext = end($img_explode);
$extensions = ["jpeg", "png", "jpg"];
if (in_array($img_ext, $extensions) === true) {
$types = ["image/jpeg", "image/jpg", "image/png"];
if (in_array($img_type, $types) === true) {
$time = time();
$new_img_name = $time . $img_name;
if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) {
$ran_id = rand(time(), 100000000);
move_uploaded_file($tmp_image,"/Auth/customer/images/".$cust_image);