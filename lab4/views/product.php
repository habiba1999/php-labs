<?php
$id = isset($_GET["item"]) ? intval($_GET["item"]) : 0;
$item = $mySql->get_record_by_id($id)[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: linear-gradient(to right,#3c4599,#9698d5);
            background-attachment: fixed;
            font-family: 'Lato', sans-serif;
            color: #8D7B68;
            height: 100vh;
        }
        .rigthDiv{
            background: linear-gradient(to right,#3c4599,#9698d5);
            background-attachment: fixed;
        }

        .box {
            position: relative;
            overflow: hidden;
        }

        .ribbon {
            position: absolute;
            display: inline-block;
            top: 0.3em;
            right: 0.8em;
            max-width: 5em;
            color: #fff;
            z-index: 1;
            font-size: 12px;
        }

        .ribbon::after {
            position: absolute;
            top: -1.3em;
            right: -6em;
            content: "";
            height: 5em;
            width: 12em;
            transform: rotatez(45deg);
            background-color: #bf0f0f;
            z-index: -1;
        }

        #category,
        #code,
        #prev_purchase,
        #stock{
            font-size: 0.9rem !important;
        }
    </style>
</head>

<body class="d-flex align-items-center">
    <div class="wrapper container mt-5 mb-5 ">
        <div class="box card border-0 rounded-4 shadow-lg">
            <div class="row g-0">
                <div class="col-md-5 py-4 d-flex justify-content-center">
                    <?php
                    $image_url = "/Lab4/images/" . $item['photo'];
                    ?>
                    <img src="<?php echo $image_url ?>" id="main_product_image" width="380" height="230" class="mx-auto">
                </div>
                <div class="col-md-4 py-4 ">
                    <div class="mb-0">
                        <p class="mb-0" id="code"><?php echo $item['product_code'] ?></p>
                    </div>
                    <div class="mt-2 mb-5">
                        <h3 id="title" style="letter-spacing: 2px; color:rgb(153, 130, 97)"><?php echo $item['product_name'] ?></h3>
                    </div>
                    
                    <div class="d-flex flex-row align-items-center mt-5">
                        <i class='bi bi-star-fill me-1'></i>
                        <span class="ms-1 fs-6" id="rating"><?php echo $item['rating'] ?>/5.00</span>
                    </div>

                    <div class="mt-2">
                        <p class="fs-6"><i class="bi bi-geo-alt-fill"></i> Made In <?php echo $item['country'] ?></p>
                    </div>
                    <div class="mt-2">
                    <p class="fs-6"><p id="category"><?php echo $item['category'] ?></p></p>
                    </div>
                    <div class="mt-2">
                     <p id="price" class="fs-5">$<?php echo $item['list_price'] ?></p>
                    </div>
                    <div class="mt-2">
                    <p id="stock" class="">Available Stock: <?php echo $item['units_in_stock'] ?> items</p>
                    </div>
                    <div class="mt-2">
                    <p id="prev_purchase">previous purchases: <?php echo $item['reorder_level'] ?></p>
                    </div>
                  
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>