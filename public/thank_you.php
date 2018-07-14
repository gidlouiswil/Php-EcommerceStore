<?php require_once(".." . DIRECTORY_SEPARATOR . "resources" . DIRECTORY_SEPARATOR . "configuration.php"); ?>
<?php require_once("../resources/cart.php"); ?>
<?php include(TEMPLATE_FRONTEND . DS . "header.php"); ?>

<?php
process_transaction(); 
?>

<!-- Page Content -->
<div class="container">
    <h1 class="text-center">THANK YOU</h1>

</div>
<!-- /.container -->

<?php include(TEMPLATE_FRONTEND . DS . "footer.php");?>