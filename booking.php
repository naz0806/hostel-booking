<?php
include('dbconnection.php');

session_start();
$timenow = time();


?>

<!DOCTYPE html>
<html>
<head>
    <!-- Basics -->
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover"/>
    <title>Facility Booking</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i" rel="stylesheet">

    <!-- Custom & Default Styles -->
    <link rel="stylesheet" href="css/book.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- jQuery Files -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-laravel d-flex justify-content-center">
    <div class="nav-container ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="overflow: hidden;">
            <ul class="navbar-nav mr-auto">
                <li class="nb-item nav-item active">
                    <a class="nav-link" href="index.php" ><span><i class="bi bi-building"></i></span>Hostel <span class="sr-only">(current)</span></a>
                </li>
                <li class="nb-item nav-item">
                    <a class="nav-link" href="#" >Others</a>
                </li>

            </ul>
        </div>
        <div>
            <button type="button" class="btn btn-info" >Back to USM Corporate</button></a>
        </div>
        <!-- <button type="button" class="btn btn-info " style="background-color: inherit; border: 2px solid #2585fa;"> Back to USM Corporate</button> -->
    </div>
</nav>

<section id="booking_form">
    <h2>Booking Confirmation Form</h2>
    <p id="ins">Please complete and submit the booking form before proceeding with payment. <br><i style="color:blue;">(Please check your cart beforehand.)</i></p>
    <div class="container-fluid d-flex justify-content-center">

        <div class="card card-form" style="width: 40%;">
            <div class="card-header">
                <strong>Booking Information</strong> 
            </div>
            <div class="card-body">
                <form action="booking_process.php" method="POST">
                    <div class="form-group">
                        <label for="fullname">Full name</label><br>
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter fullname">
                    </div>
                    <div class="form-group">
                        <label for="email" >Email</label><br>
                        <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
                    </div>
                    <div class="form-group">
                        <label for="tel" >Telephone</label><br>
                        <input type="tel" class="form-control" id="tel" name="tel" placeholder="0123456789">
                    </div>
                    <div class="form-group">
                        <label for="address" >Address</label><br>
                        <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
                    </div>
                    <div class="form-group">
                        <label for="address2" >Address 2 (Optional)</label><br>
                        <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or Suite">
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city" >City</label><br>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="postcode" >Post Code</label><br>
                        <input type="number" class="form-control" id="postcode" name="postcode" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="state">State</label>
                        <select class="form-control" id="state" name="state">
                            <option value="Kedah">Kedah</option>
                            <option value="Perak">Perak</option>
                            <option value="Pulau Pinang">Pulau Pinang</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="country">Country</label>
                        <select class="form-control" id="country" name="country">
                            <option value="Malaysia">Malaysia</option>
                        </select>
                    </div>
                </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Save this information for next time
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary " name="submit">Submit</button>
                </form>
            </div>
        </div>  
        <div class="card card-cart" style=" height:fit-content; width:55%">
            <div class="card-header">
                <strong>Your Cart</strong> 
            </div>
                <!-- <div class="card-body" style="width: 10%;">
                    <img src="images/hostelA.png" alt="Hostel A" style="width: 100%; height: 250px;">
                </div>
                <hr> -->
            <div class="card-body" style="margin-bottom: 0px;">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Room Description</th>
                            <th scope="col">Check In</th>
                            <th scope="col">Price (RM) </th>
                            <th scope="col">Duration (months)</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>
                            <?php echo $_POST['postLoc2']; ?><br>
                            <?php echo $_POST['postRType2']; ?>
                        </td>
                        <td id="sdate" ></td>
                        <td ><?php echo $_POST['postPrice'] ; ?></td>
                        <td id="dur"></td>
                        <td><a href="#" class="remove" style="color: red;">Remove</a></td>
                        </tr>
                    </tbody>
                </table>    
    
                <div class="card-footer">
                    <div class="cont">
                        <div class="cont-label"><strong>Total</strong></div>
                        <div class="cont-detail">
                            <div class="cont-text">RM
                                <span id="total"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
        </div>
    </div>
        
</section>

<script>
var obj = {};

    // Total cart
    obj.totalCart = function() {
        var totalCart = 0;
        for(var item in cart) {
            totalCart += cart[item].price * cart[item].count;
        }
        return Number(totalCart.toFixed(2));
        }

        function dataList () {

            var result = JSON.parse(sessionStorage.getItem("store"));
            var book_duration = 0;
            if(result) {
                    book_duration = result[result.length-1].duration;
                    sDate = result[result.length-1].startdate;
                    
                    document.getElementById("dur").innerHTML = book_duration;
                    document.getElementById("sdate").innerHTML = sDate;
            }

        }
        dataList();

        function totalCost(){

            var result = JSON.parse(sessionStorage.getItem("store"));
            var book_duration = 0;
            if(result) {
        
                book_duration = result[result.length-1].duration;                    
            }

            price = <?php echo $_POST['postPrice'] ; ?>;
            num1 = parseFloat(price);
            
            price2 = book_duration;
            num2 = parseFloat(price2);
            
            result = num1 * num2;
            console.log("result:"+result);
            document.getElementById("total").innerHTML = result.toFixed(2);
        }

        totalCost();

</script>

</body>
</html>
