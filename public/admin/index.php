<?php require_once("../../resources/configuration.php"); ?>
<?php include(TEMPLATE_BACKEND . "/header.php"); ?>

<?php if(!isset($_SESSION['username']))
{
    redirect("../../public");
}

?>

<div id="page-wrapper">

    <div class="container-fluid">



        <?php 
                if($_SERVER['REQUEST_URI'] == "/Php-EcommerceStore/public/admin/" || $_SERVER['REQUEST_URI'] == "/Php-EcommerceStore/public/admin/index.php")  
                {
                    include(TEMPLATE_BACKEND . "/admin_content.php");
                }
                
                if(isset($_GET['orders']))
                {
                    include(TEMPLATE_BACKEND . "/orders.php");
                }
        
                if(isset($_GET['products']))
                {
                    include(TEMPLATE_BACKEND . "/products.php");
                }
        
                if(isset($_GET['add_product']))
                {
                    include(TEMPLATE_BACKEND . "/add_product.php");
                }
        
                if(isset($_GET['categories']))
                {
                    include(TEMPLATE_BACKEND . "/categories.php");
                }
        
                if(isset($_GET['users']))
                {
                    include(TEMPLATE_BACKEND . "/users.php");
                }
        
                if(isset($_GET['add_user']))
                {
                    include(TEMPLATE_BACKEND . "/add_user.php");
                }
        
                if(isset($_GET['reports']))
                {
                    include(TEMPLATE_BACKEND . "/reports.php");
                }
        
                if(isset($_GET['slides']))
                {
                    include(TEMPLATE_BACKEND . "/slides.php");
                }
        
                if(isset($_GET['delete_slide_id']))
                {
                    include(TEMPLATE_BACKEND . "/delete_slide.php");
                }
                
                ?>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<?php include(TEMPLATE_BACKEND . "/footer.php"); ?>