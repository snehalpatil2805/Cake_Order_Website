<?php include('partials-front/menu.php'); ?>

<?php
    //Check whether cake id is set or not
    if(isset($_GET['cake_id']))
    {
        $cake_id = $_GET['cake_id'];

        //Get the deatails of selected cake
        $sql = "SELECT * FROM tbl_cake WHERE id=$cake_id ";

        $res = mysqli_query($conn,$sql);

        $count = mysqli_num_rows($res);

        if($count==1)
        {
           $row = mysqli_fetch_assoc($res);

           $title = $row['title'];
           $price = $row['price'];
           $image_name = $row['image_name'];

        }
        else
        {
            //Cake not available redirect to home page
            header('location:'.SITEURL);
        }
    }
    else
    {
       header('location:'.SITEURL.'index.php');
    }
?>

    <!-- Cake SEARCH Section Starts Here -->
    <section class="cake-search">
        <div class="container">
        
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Cake</legend>

                    <div class="cake-menu-img">
                        <?php
                        
                            //Check whether the image is available or not
                            if($image_name=="")
                            {
                                echo "<div class='error'>Image Not Available.</div>";
                            }
                            else
                            {
                                 ?>
                                   
                                   <img src="<?php echo SITEURL; ?>cake/<?php echo $image_name; ?>" alt="Chocolate Cake" class="img-responsive img-curve" >

                                 <?php
                            }

                        ?>
                        
                    </div>
    
                    <div class="cake-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="cake" value="<?php echo $title; ?>">

                        <p class="cake-price">Rs.<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">


                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Snehal Patil" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9467xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. snehalpatil2328@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php
            
                //Check whether the submit button is clicked or not
                if(isset($_POST['submit']))
                {
                   $cake = $_POST['cake'];
                   $price = $_POST['price'];
                   $qty = $_POST['qty'];
                   $total = $price * $qty;

                   $order_date = date("Y-m-d h:i:sa");//Order date and time
                   $status = "Ordered";

                   $customer_name = $_POST['full_name'];
                   $customer_contact = $_POST['contact'];
                   $customer_email = $_POST['email'];
                   $customer_address = $_POST['address'];

                   //Save order in database
                   $sql2 = "INSERT INTO tbl_order SET
                        cake = '$cake',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'
                   ";

                   
                    
                    $res2 = mysqli_query($conn,$sql2);

                    if($res2==TRUE)
                    {
                       $_SESSION['order'] = "<div class='success text-center'>Cake Order Placed Successfully.</div>";
                       header('location:'.SITEURL);
                    }
                    else
                    {       
                        $_SESSION['order'] = "<div class='error'>Failed To Order Cake.</div>";
                        header('location:'.SITEURL);
                    }

                }
            ?>

        </div>
    </section>
    <!-- Cake SEARCH Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>
