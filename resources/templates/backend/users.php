<div class="col-lg-12">

    <h1 class="page-header">
        Users

    </h1>
    
    <h3 class="bg-success"><?php display_message(); ?></h3>
   

    <a href="index.php?add_user" class="btn btn-primary">Add User</a>


    <div class="col-md-12">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
                <?php display_users(); ?>
            </thead>
            <tbody>

            </tbody>
        </table>
        <!--End of Table-->

    </div>
</div>