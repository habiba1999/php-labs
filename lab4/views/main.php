<?php
$current_index = isset($_GET["current"]) ? intval($_GET["current"]) : 0;
$result = $mySql->get_data_all_records_paginated(array(), $current_index);
$total_items = $mySql->get_no_data_in_db();
$next_index = ($current_index + __RECORDS_PER_PAGE__ > $total_items) ? $current_index : $current_index + __RECORDS_PER_PAGE__;
$prev_index = ($current_index - __RECORDS_PER_PAGE__ > 0) ? $current_index - __RECORDS_PER_PAGE__ : 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
body {
    background-image: linear-gradient(to right,#3c4599,#9698d5);
    background-attachment: fixed;
    font-family: 'Lato', sans-serif;
}

h1 {
    color: white;
}

.details,
.pag-btn:hover {
    background-color: #3c4599;
    color: white !important;
}

.details:hover,
.pag-btn {
    color: #8D7B68 !important;
    background-color: white !important;
}

i {
    color: #8D7B68 !important;
}

.code {
    font-size: 11px;
    color: #8D7B68 !important;
}

.muted {
    color: #8D7B68 !important;
    background-color: gray !important;
}
    </style>
</head>

<body>
    <section class="container">
        <h1 class=" mt-3 mb-0 text-center">Sunglasses</h1>
        <?php
        foreach ($result as $item) {
            $image_url = "/Lab4/images/" . $item['photo'];
            $html_div = "
            <div class='row p-3 my-3 bg-white border rounded-4 shadow-lg list-item w-75 mx-auto'>
             <div class='col-md-3 mt-1'>
                <img class='img-fluid img-responsive rounded product-image' style='height:100px;' src=$image_url>
             </div>
             <div class='col-md-6 mt-3'>
               <div class='mt-1 mb-1 spec-1 code'><span>" . $item["product_code"] . "</span></div>
               <h5 class='title'>" . $item['product_name'] . "</h5>
               <div class='d-flex flex-row'>
                 <div class='ratings mr-2'><i class='bi bi-star-fill me-1'></i><span>" . $item["rating"] . "/5.00</span></div>
               </div>
             </div>
             <div class='align-items-center align-content-center col-md-3 border-left mt-1'>
              <div class='d-flex flex-column align-items-center mt-3'>
                <h4 class='mr-1'>$" . $item["list_price"] . "</h4>
                <a href=" . $_SERVER['PHP_SELF'] . "?item=" . $item['id'] . " class='btn btn-sm details mt-2 details'  type='button'>Details</a>
              </div>
             </div>
            </div>
            ";
            echo $html_div;
        }
        ?>
        <div class='text-center mt-4 '>
            <a id="prev" class="btn btn-sm  text-white d-inline px-5 me-5 pag-btn" type="button" href=<?php echo $_SERVER["PHP_SELF"] . "?current=" . $prev_index; ?>>prev</a>
            <a id="next" class="btn btn-sm  text-white d-inline px-5 pag-btn" type="button" href=<?php echo $_SERVER["PHP_SELF"] . "?current=" . $next_index; ?>>next</a>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var current_index = <?php echo $current_index ?>;
        var total_items = <?php echo $total_items ?>;
        var RECORDS_PER_PAGE = <?php echo __RECORDS_PER_PAGE__ ?>;
        var prev = document.getElementById("prev");
        var next = document.getElementById("next");
        console.log(current_index, total_items, RECORDS_PER_PAGE);
        if (current_index == 0) {
            prev.setAttribute("href", "javascript: void(0)");
            prev.style.pointerEvents = "none";
            prev.style.opacity = "0.5";

        } else if ((current_index + RECORDS_PER_PAGE) > total_items) {
            next.setAttribute("href", "javascript: void(0)");
            next.style.pointerEvents = "none";
            next.style.opacity = "0.5";
        }
    </script>
</body>

</html>