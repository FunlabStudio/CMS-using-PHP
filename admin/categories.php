   <?php include "includes/admin_header.php"; ?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                         <h1 class="page-header">
                            Welcome To Admin
                            <small>Hozi.pk</small>
                        </h1>

                        <div class="col-xs-6">
        <?php  insert_categories (); ?>


                            <form action="" method="post">

                                <div class="form-group">
                                    <label for="cat_title"> Add Category </label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>

                                <div class="form-group">
                                    <input type="Submit" class="btn btn-primary" name="submit" value="Add Category">
                                </div>

                            </form>


            <?php           // Update & Include Category Querry

            if (isset($_GET['edit'])){

                $cat_id = $_GET['edit'];
                include "includes/update_categories.php"; 
                
            }


            ?>

                           </div>

                             <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            
                            <thead>

                            <tr>
                            <th>ID</th>
                            <th>Category</th>
                            </tr>

                            </thead>
                            <tbody>
                            <tr>


<?php find_all_categories(); ?> 


<?php delete_categories(); ?>

                                </tr>

                            </tbody>
                        </table>

                        </div>
                       
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

         <?php include "includes/admin_footer.php"; ?>