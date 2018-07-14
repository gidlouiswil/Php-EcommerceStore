<?php require_once(".." . DIRECTORY_SEPARATOR . "resources" . DIRECTORY_SEPARATOR . "configuration.php");?>

<?php include(TEMPLATE_FRONTEND . DS . "header.php");?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header>
            <h1>Shop</h1>
        </header>

        <hr>

        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

            <?php get_products_in_shop_page();?>

        </div>
        <!-- /.row -->


    </div>
    <!-- /.container -->

    <?php include(TEMPLATE_FRONTEND . DS . "footer.php");?>
