<?php include('partials-front/menu.php'); ?>

 <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Cakes</h2>

            <?php

            //Display all the categories thet are active
            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

            $res = mysqli_query($conn,$sql);

            $count = mysqli_num_rows($res);
            //Check whether category available or not
            if($count>0)
            {
              while($row=mysqli_fetch_assoc($res))
              {
                  //Get the values
                  $id = $row['id'];
                  $title = $row['title'];
                  $image_name = $row['image_name'];
                  ?>

                  <a href="<?php echo SITEURL; ?>category-cakes.php?category_id=<?php echo $id; ?>">
                   <div class="box-3 float-container">
                       <?php
                       if($image_name=="")
                       {
                        echo "<div class='error'>Image Not Found.</div>";
                       }
                       else
                       {
                           ?>
                            <img src="<?php echo SITEURL; ?>category/<?php echo $image_name; ?>" alt="Cake" class="img-responsive img-curve">
                           <?php
                          
                       }
                       
                       ?>
                     
                       <h3 class="float-text text-white"><?php echo $title; ?></h3>
                   </div>
                  </a>

                  <?php
                }
            }
            else
            {
                 echo "<div class='error'>Category Not Found.</div>";
            }
            
                  ?>
        <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>
