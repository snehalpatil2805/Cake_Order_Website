<?php include('partials-front/menu.php'); ?>

    <!--cake search section starts here-->
    <section class="cake-search text-center">
      <div class="container">
        <div class="searchImage">
          <background-image src="search.jpg" alt="Search Background Image">
        </div>
        <form action="<?php echo SITEURL; ?>cake-search.php" method="POST">
          <input type="search" name="search" placeholder="Search for cake.." required>
          <input type="submit" name="submit" value="search" class="btn btn-primary">
        </form>
      </div>
    </section>
    <!--cake search section ends here-->

    <?php
          if(isset($_SESSION['order']))
          {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
          }
    ?>

    <!-- categories section starts here-->
    <section class="category">
      <div class="container">
        <h2 class="text-center">Explore Cakes</h2>

        <?php 
        //Create sql query to display categories from database
        $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured ='Yes' LIMIT 3";
        //Execute the query
        $res = mysqli_query($conn,$sql);
         //Count rows to check whether the category is available or not
        $count = mysqli_num_rows($res);

        if($count>0)
        {
          //Category available
          while($row=mysqli_fetch_assoc($res))
          {
            //Get title ,image name and id
            $id = $row['id'];
            $title = $row['title'];
            $image_name = $row['image_name'];
            ?>
            <a href="<?php echo SITEURL; ?>category-cakes.php?category_id=<?php echo $id; ?>">
               <div class="box-3 float-container">
                 <?php
                    if($image_name=="")
                    {
                      echo "<div class='error'>Image Not Available.</div>";
                    }
                    else
                    {
                      ?>
                       <img src="<?php echo SITEURL; ?>category/<?php echo $image_name; ?>" alt="cake" class="img-responsive img-curve">
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
           //Category not available
           echo "<div class='error'>Category Not Added.</div>";
        }
        ?>

       <div class="clearfix"></div>
      </div>
    </section>
    <!--Navbar section ends here-->

    <!-- cake menu section starts here-->
    <section class="cake-menu">
      <div class="container">
        <h2 class="text-center">Cake Menu</h2>

        <?php
           
           //Getting cakes from database that are active and featured
           $sql2 = "SELECT * FROM tbl_cake WHERE active='Yes' AND featured='Yes'LIMIT 6";
           $res2 = mysqli_query($conn,$sql2);
           $count2 = mysqli_num_rows($res2);
           //Check whether cake available or not
           if($count2>0)
           {
             while($row = mysqli_fetch_assoc($res2))
             {
               $id = $row['id'];
               $title = $row['title'];
               $price = $row['price'];
               $description = $row['description'];
               $image_name = $row['image_name'];
               ?>
                   <div class="cake-menu-box">
                      <div class="cake-menu-img">
                        <?php
                           //Check whether image available or not
                           if($image_name=="")
                           {
                              echo "<div class='error'>Image Not Available.</div>";
                           }
                          else
                          {
                               ?>
                               <img src="<?php echo SITEURL; ?>cake/<?php echo $image_name; ?>" alt="chocolate cake" class="img-responsive img-curve" >
                               <?php
                          }
                        ?>
                         
                      </div>

                      <div class="cake-menu-desc">
                         <h4><?php echo $title;?></h4>
                         <p class="cake-price">Rs.<?php echo $price; ?></p>
                         <p class="cake-detail">
                            <?php echo $description; ?>
                         </p>
                              <br>

                         <a href="<?php echo SITEURL; ?>order.php?cake_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                      </div>
                    </div>

               <?php

             }

           }
           else
           {
             echo "<div class='error'>Cake Not Available.</div>";

           }

        ?>
        

        

        
        
        <div class="clearfix"></div>
      </div>
    </section>
    <!-- cake menu section ends here-->

    <?php include('partials-front/footer.php');?>