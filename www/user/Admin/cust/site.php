
                    <?php

                    include 'catagory_model.php';
                    $model = new Model();
                    $rows = $model->fetch();
                    $jsons = json_encode($rows);
                    echo $jsons;
                    $fi = fopen("json.json", 'r+');


                    if (!empty($rows)) {
                        foreach ($rows as $row) {
                            $html = '{
         "firstName" : "' . $row['first_name'] . '"
,
                            },';
                        }
                    }
                    fwrite($fi, $htm);

                    ?>
                    
