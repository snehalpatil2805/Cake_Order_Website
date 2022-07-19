<?php include('partials-front/menu.php'); ?>


    <!--Cake SEARCH Section Starts Here -->
    <section class="cake-search text-center">
        <div class="container">
          <?php
          
             
                //Get the search keyword
                $search = $_POST['search'];
          ?>
            
            <h2>Cakes on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- Cake SEARCH Section Ends Here -->



    <!-- Cake MENU Section Starts Here -->
    <section class="cake-menu">
        <div class="container">
          <h2 class="text-center">Cake Menu</h2>
        
          <?php 
          

               $sql = "SELECT * FROM tbl_cake WHERE title LIKE '%$search% OR description LIKE '%$search%";

               $res = mysqli_query($conn, $sql);

               //Count rows
               $count = mysqli_num_rows($res);
               //check whether cake available or not
               if($count>0)
               {
                   while($row=mysqli_fetch_assoc($res))
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
                          
                             //Check whether image name is available or not
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
                           <h4><?php echo $title; ?></h4>
                           <p class="cake-price">Rs.<?php echo $price; ?></p>
                           <p class="cake-detail">
                              <?php echo $description; ?>
                           </p>
                           <br>
  
                            <a href="#" class="btn btn-primary">Order Now</a>
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

          <div class="cake-menu-box">
            <div class="cake-menu-img">
              <img src="chocolate.jpg" alt="chocolate cake" class="img-responsive img-curve" >
            </div>
  
            <div class="cake-menu-desc">
              <h4>Chocolate Cake</h4>
              <p class="cake-price">Rs.500</p>
              <p class="cake-detail">
                Three layer chocolate cake with walnuts.
              </p>
              <br>
  
              <a href="#" class="btn btn-primary">Order Now</a>
            </div>
          </div>
  
          <div class="cake-menu-box">
            <div class="cake-menu-img">
              <img src="Red_Velvet.jpg" alt="Red Velvet Cake" class="img-responsive img-curve" >
            </div>
  
            <div class="cake-menu-desc">
              <h4>Red Velvet Cake</h4>
              <p class="cake-price">Rs.650</p>
              <p class="cake-detail">
                Three layer red velvet cake with rosemary decor.
              </p>
              <br>
  
              <a href="#" class="btn btn-primary">Order Now</a>
            </div>
          </div>
  
          <div class="cake-menu-box">
            <div class="cake-menu-img">
              <img src="Flourless.jpg" alt="Flourless Cake" class="img-responsive img-curve" >
            </div>
  
            <div class="cake-menu-desc">
              <h4> Flourless Cake</h4>
              <p class="cake-price">Rs.500</p>
              <p class="cake-detail">
                Flourless chocolate cake with Whipped Cream.
              </p>
              <br>
  
              <a href="#" class="btn btn-primary">Order Now</a>
            </div>
          </div>
  
          <div class="cake-menu-box">
            <div class="cake-menu-img">
              <img src="Cheesecake.jpeg" alt="Cheesecake" class="img-responsive img-curve" >
            </div>
  
            <div class="cake-menu-desc">
              <h4>Cheesecake</h4>
              <p class="cake-price">Rs.450</p>
              <p class="cake-detail">
                Chocolate Cheesecake.
              </p>
              <br>
  
              <a href="#" class="btn btn-primary">Order Now</a>
            </div>
          </div>
  
          <div class="cake-menu-box">
            <div class="cake-menu-img">
              <img src="Dark Chocolate Cupcake.jpg" alt="Dark Chocolate Cupcake" class="img-responsive img-curve" >
            </div>
  
            <div class="cake-menu-desc">
              <h4> Dark Chocolate Cupcake</h4>
              <p class="cake-price">Rs.100</p>
              <p class="cake-detail">
                Dark Chocolate Cupcake with Peanut Butter Frosting.
              </p>
              <br>
  
              <a href="#" class="btn btn-primary">Order Now</a>
            </div>
          </div>
  
          <div class="cake-menu-box">
            <div class="cake-menu-img">
              <img src="Choux Pastry.jpeg" alt="Choux Pastry" class="img-responsive img-curve" >
            </div>
  
            <div class="cake-menu-desc">
              <h4>Choux pastry</h4>
              <p class="cake-price">Rs.200</p>
              <p class="cake-detail">
                Delicious Choux Pastry with Chocolate.
              </p>
              <br>
  
              <a href="#" class="btn btn-primary">Order Now</a>
            </div>
          </div>
  
          
          <div class="clearfix"></div>
        </div>
      </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>
