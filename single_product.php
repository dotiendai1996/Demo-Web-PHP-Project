<?php 
    include "controller/SingleProductController.php";

    $detail = new SingleProductController;
    return $detail->getSingleProductPage();
 ?>