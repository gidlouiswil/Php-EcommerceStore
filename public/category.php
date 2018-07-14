<?php require_once(".." . DIRECTORY_SEPARATOR . "resources" . DIRECTORY_SEPARATOR . "configuration.php");?>

<?php include(TEMPLATE_FRONTEND . DS . "header.php");?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <?php get_category_name();?>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Features</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

            <?php get_products_in_category_page();?>

        </div>
        <!-- /.row -->


    </div>
    <!-- /.container -->

    <?php include(TEMPLATE_FRONTEND . DS . "footer.php");?>
