<?php require_once(".." . DIRECTORY_SEPARATOR . "resources" . DIRECTORY_SEPARATOR . "configuration.php");?>

<?php include(TEMPLATE_FRONTEND . DS . "header.php");?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <?php include(TEMPLATE_FRONTEND . DS . "side_navigation.php");?>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        
                       <?php include(TEMPLATE_FRONTEND . DS . "slider.php");?>
                        
                    </div>

                </div>

                <div class="row">
                    <h1>
                        
                        
                    </h1>
                    
                    <?php get_products(); ?>

                </div><!-- Row ends here -->

            </div>

        </div>

    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FRONTEND . DS . "footer.php");?>
