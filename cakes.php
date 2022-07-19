<?php include('partials-front/menu.php'); ?>

    <!-- Cake SEARCH Section Starts Here -->
    <section class="cake-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>cake-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Cake.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- Cake SEARCH Section Ends Here -->



    <!-- Cake MENU Section Starts Here -->
    <section class="cake-menu">
        <div class="container">
            <h2 class="text-center">Cake Menu</h2>

            <?php

                //Display Food That are active
                $sql = "SELECT * FROM tbl_cake WHERE active='Yes'";
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);

                //Check whether the cake is available or not
                if($count>0)
                {
                   while($row = mysqli_fetch_assoc($res))
                   {
                       $id = $row['id'];
                       $title = $row['title'];
                       $description = $row['description'];
                       $price = $row['price'];
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
                                         <img src="<?php echo SITEURL;?>cake/<?php echo $image_name; ?>" alt="Chocolate cake" class="img-responsive img-curve">
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
                    echo "<div class='error'>Cake Not Found.</div>";
                }
            
            ?>

            
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- CAKE Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>
