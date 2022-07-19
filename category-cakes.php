<?php include('partials-front/menu.php'); ?>

<?php
    //Check whether id is passed or not
    if(isset($_GET['category_id']))
    {
        $category_id = $_GET['category_id'];
        //Get the category title based on category id
        $sql = "SELECT title FROM tbl_category WHERE id=$category_id";

        $res = mysqli_query($conn,$sql);

        $row = mysqli_fetch_assoc($res);
         //Get the title
         $category_title = $row['title'];


    }
    else
    {
        //Category not passed redirect to home page
        header('location:'.SITEURL);
    }

?>
    <!-- Cake SEARCH Section Starts Here -->
    <section class="cake-search text-center">
        <div class="container">
            
            <h2>Cakes on Category <a href="#" class="text-white">"<?php echo $category_title; ?> "</a></h2>

        </div>
    </section>
    <!-- Cake SEARCH Section Ends Here -->



    <!-- Cake MEnu Section Starts Here -->
    <section class="cake-menu">
        <div class="container">
            <h2 class="text-center">Cake Menu</h2>

            <?php
            
              //Sql query to get cake based on selected category
              $sql2 = "SELECT * FROM tbl_cake WHERE category_id = $category_id";

              $res2 = mysqli_query($conn,$sql2);

              $count2 = mysqli_num_rows($res2);

              if($count2>0)
              {
                 while($row2 = mysqli_fetch_assoc($res2))
                 {
                     $id = $row2['id'];
                     $title = $row2['title'];
                     $price = $row2['price'];
                     $description = $row2['description'];
                     $image_name = $row2['image_name'];

                     ?>

                       <div class="cake-menu-box">
                          <div class="cake-menu-img">
                            <?php
                              
                              if($image_name=="")
                              {
                                echo "<div class='error'>Image Not Available.</div>";
                              }
                              else
                              {
                                ?>
                                     <img src="<?php echo SITEURL; ?>cake/<?php echo $image_name; ?>" alt="Chocolate Cake" class="img-responsive img-curve">
                                <?php
                              }
                            ?>
                              
                          </div>

                          <div class="cake-menu-desc">
                              <h4><?php echo $title; ?></h4>
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
    <!-- Cake Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>
