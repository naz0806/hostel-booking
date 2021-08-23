<?php
include('dbconnection.php');
// include_once('class/Rooms.php');

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
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" >



    <!-- jQuery Files -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

</head>
<style>
    li.nav-item a.nav-link:hover{
    color: #64a5f5 !important;
    cursor: pointer !important;
    }
    #loading{
        text-align: center;
        background: url('images/loader.gif') no-repeat center;
        height: 150px;
    }
</style>

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

<section id="check_availability" class="d-none d-sm-block" align="center">

    <!-- <div class="container secondary-bg position-relative form-2"> -->
    <div class="container-fluid " style="padding: 8px 15px !important;">

        <form action="search.php" method="POST" onsubmit="store();return false;" class="d-flex justify-content-center" id="filterform" style="flex-wrap: wrap;">
            <div class="form-group">
            <label for="location">Location</label><br>
                <select class="form-select form-control" id="location" name="location">
                    <option selected value="" >All</option>
                    <?php
                        $res = $connect->query("SELECT * FROM location ORDER BY location_name ASC");
                        while($data=$res->fetch()) {
                            echo "<option value='".$data['location_name']."' data-id={$data['pklocation_fac'] } >{$data['location_name'] }</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="fromdate">Check in</label>
                <input type="date" class="form-control" id="startdate" name="startDate" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="form-group">
            <label>Duration</label><br>
                <select class="form-select form-control" id="duration" name="duration">
                    <option selected value="1">1 month</option>
                    <option value="2">2 months</option>
                    <option value="3">3 months</option>
                    <option value="4">4 months</option>
                    <option value="5">5 months</option>
                    <option value="6">6 months</option>

                </select>
            </div>
            <div class="form-group">
            <label>Room type</label><br>
                <select class="form-select form-control" id="roomtype" name="roomtype">
                    <option selected>Select room type</option>
                    <?php
                        $res = $connect->query("SELECT * FROM type ORDER BY type_name ASC");
                        while($data=$res->fetch()) {
                            echo "<option value='".$data['type_name']."' data-id={$data['pktype'] } >{$data['type_name'] }</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
            <label>Category</label><br>
                <select class="form-select form-control" id="usertype" name="usertype">
                    <option selected value="USM Student">USM Student</option>
                    <option value="Public">Public</option>

                </select>
            </div>
            <div class="form-group">
                <a href="#search_result">
                    <button type="submit" class="btn btn-primary" value="Search">SEARCH</button></a>
            </div>

        </form>
    </div>

</section>

<section id="check_availability_mobile" class="d-block d-sm-none" align="center">
    <div class=" d-block d-sm-none" style="margin-top:0px;">

        <button type="button" class=" btn btn-light collapsible"
        style="z-index: 1; width:375px; height:50px; margin:0px 0px 0.5px 0px; border-radius:0px; border:0px; background-color:#f3f3f3;">
            <i class="bi bi-search"></i>Search for Room
        </button>
        <div class="content" style="padding: 8px 15px 0px 15px !important; width:100%;display: none; overflow: hidden; background: color #f1f1f1 !important;">
            <form action="search.php" method="POST" onsubmit="store();return false;" class="d-flex justify-content-center d-block d-sm-none" id="filterform" style="flex-wrap: wrap;">
                <div class="form-group">
                <label for="location">Location</label><br>
                    <select class="form-select form-control" id="location" name="location">
                        <option selected value="" >All</option>
                        <?php
                            $res = $connect->query("SELECT * FROM location ORDER BY location_name ASC");
                            while($data=$res->fetch()) {
                                echo "<option value='".$data['location_name']."' data-id={$data['pklocation_fac'] } >{$data['location_name'] }</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fromdate">Check in</label>
                    <input type="date" class="form-control" id="startdate" name="startDate" value="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="form-group">
                <label>Duration</label><br>
                    <select class="form-select form-control" id="duration" name="duration">
                        <option selected value="1">1 month</option>
                        <option value="2">2 months</option>
                        <option value="3">3 months</option>
                        <option value="4">4 months</option>
                        <option value="5">5 months</option>
                        <option value="6">6 months</option>

                    </select>
                </div>
                <div class="form-group">
                <label>Room type</label><br>
                    <select class="form-select form-control" id="roomtype" name="roomtype">
                        <option selected>Select room type</option>
                        <?php
                            $res = $connect->query("SELECT * FROM type ORDER BY type_name ASC");
                            while($data=$res->fetch()) {
                                echo "<option value='".$data['type_name']."' data-id={$data['pktype'] } >{$data['type_name'] }</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                <label>Category</label><br>
                    <select class="form-select form-control" id="usertype" name="usertype">
                        <option selected value="USM Student">USM Student</option>
                        <option value="Public">Public</option>

                    </select>
                </div>
                <div class="form-group">
                    <a href="#search_result">
                        <button type="submit" class="btn btn-primary" value="Search">SEARCH</button></a>
                </div>

            </form>
        </div>

  </div>


    </div>
</section>

<section id="search_result" style="background-color: white !important;">

<div class="container-fluid d-flex justify-content-center" style="padding: 15px 0px;">
    <div class="card-filter ">
        <div class="card d-none d-sm-block" >
            <div class="card-header" style="padding-top: 10px; background-color: white; font-weight:700; border-bottom: 1px solid rgb(182, 182, 182) !important;">
                Filter by:
            </div>
            <form method="POST">
            <ul class="list-group list-group-flush">
                <li class="list-group-item" ><span style="font-size: 14.5px; font-weight: 700; ">Facilities</span>
                    <!-- <div class="card-content"> -->
                        <?php
                        $sql = "
                        SELECT DISTINCT(listed_name) FROM facility_list ORDER BY listed_name DESC
                        ";
                        $res = $connect->prepare($sql);
                        $res->execute();
                        $data = $res->fetchAll();
                        foreach($data as $row)
                        {
                        ?>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input fl_room" name="fl_room[]" id="<?php echo $rows['pklist_fac'];?>" value="<?php echo $row['listed_name']; ?>"  >
                            <label class="form-check-label" for="fl_room"><?php echo $row['listed_name']; ?></label>
                        </div>
                        <?php
                        }
                        ?>

                    <!-- </div> -->
                </li>
            </ul>
            </form>
        </div>
    </div>

    <div class="container2 " >
        <div class="row" style=" width: 100%; margin:0px;padding:0px 15px;">
            <div class="col d-none d-sm-block" style="padding: 0px 0px !important; width: 40% !important;">
                <div class="sort" style="margin-left: 0px;">
                    <div class="form-group" style="display: flex; margin-left:0px;  margin-bottom:0px;">
                        <label style="margin-top: 10px !important;">Sort by </label>
                            <select class="form-select form-control" id="sort" name="sort" style="width: fit-content; margin-left:10px; border:1px solid #2585fa !important">
                                <option selected value="Rating & Recommended">Rating & Recommended</option>
                                <option value="Price & Recommended">Price & Recommended</option>
                                <option value="Rating only">Rating only</option>
                                <option value="Price only">Price only</option>
                            </select>
                    </div>
                </div>
            </div>
            <div class="col d-none d-sm-block" style="padding: 0px 0px !important; max-width: 40% !important; margin-right:15px;" >
                <div class="map-list__toggle--with-bg" align="right" >
                    <button type="button" class="btn map-list-btn" data-toggle="modal" data-target="#mapModal"><span><i class="bi bi-geo-alt-fill" style="color: red;"></i></span>
                            View map
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Google Maps</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.398969257837!2d100.30032901458432!3d5.355933696114959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304ac1a836ae7e53%3A0x835ac54fe8f4d95a!2sUniversity%20of%20Science%2C%20Malaysia!5e0!3m2!1sen!2smy!4v1628054684857!5m2!1sen!2smy"
                                    width="600" height="450" style="border:0; margin-left:0px;" allowfullscreen="" loading="lazy"></iframe>
                                </div>
                                <!-- <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <div class="col-4 d-block d-sm-none">
                    <button type="button" class=" btn btn-light" data-id="sort-01"><i class="bi bi-arrow-down-up"></i>Sort by</button>
                        
                </div>
                <div class="col-4 d-block d-sm-none">
                    <button type="button" class="btn btn-light drawer-link" data-id="drawer-01"><i class="bi bi-funnel"></i>Filter</button>
                        <div class="drawer" data-id="drawer-01">
                        <a class="close" href="#"><i class="bi bi-x"></i></a>
                        <h5 style="font-size: 16px;" align="center">Facilities</h5>
                            <div class="wrapper" style="margin-left: 35%;">
                                
                                
                                <?php
                                    $sql = "
                                    SELECT DISTINCT(listed_name) FROM facility_list ORDER BY listed_name DESC
                                    ";
                                    $res = $connect->prepare($sql);
                                    $res->execute();
                                    $data = $res->fetchAll();
                                    foreach($data as $row)
                                    {
                                    ?>
                                    <div class="form-check" >
                                        <input type="checkbox" class="form-check-input fl_room" name="fl_room[]" id="<?php echo $rows['pklist_fac'];?>" value="<?php echo $row['listed_name']; ?>"  >
                                        <label class="form-check-label" for="fl_room"><?php echo $row['listed_name']; ?></label>
                                    </div>
                                    <?php
                                    }
                                    ?>
                            </div>
                        </div>
                </div>
                <div class="col-4 d-block d-sm-none">
                    <button type="button" class="btn btn-light"><i class="bi bi-geo-alt"></i>Map</button>
                </div>



        </div>
        <div class="cont t1" style="width: 97%; padding-right:0px;">
            <!-- <div class="loading-div"><img src="images/" ></div> -->
            <div class="row filter_data card-list" id="results" style="margin-top: 22px !important; " >
            <?php

                  $res = $connect->query("SELECT a.*, b.*, c.* FROM facility a
                                         LEFT JOIN location b ON a.pklocation_fac = b.pklocation_fac
                                         LEFT JOIN type c ON a.pktype = c.pktype;");
                 while($data=$res->fetch())  {
                 ?>

                 <!-- <div class="col"> -->
                    <div class="card hostel-list" data-category="<?php echo $data['description']; ?>">
                        <div class="row">

                            <div class="col-4" id="col1" style="padding-left: 0px; padding-right: 0px; margin-right:20px; ">
                                 <img src="images/hostelA.png" alt="Hostel A" style="width: 100%; height: 100%; border-radius: 6px !important; ">
                                 <!-- <span><i class="bi bi-heart"></i></span> -->
                            </div>

                            <div class="col" >
                                <div class="cont-wrap">
                                    <div class="row"  style="margin-right: 15px; margin-left:0px;">
                                        <div class="col" style="margin-right: 0px;">
                                            <div class="card-container" id="card-cont" style="width:100%;">
                                                <div class="card-title" style="width:100%;">
                                                    <span class="loc-name" style="margin-left: 0px; font-weight:500; font-size:16px;"><?php echo $data['location_name']; ?></span>
                                                </div>
                                                <div class="dprice">
                                                    <span style="color: rgb(198, 5, 5); font-weight:500; font-size:16px;">RM <?php echo $data['bed_rate']; ?> per bed</span><br>
                                                    <span style="color: rgb(198, 5, 5); font-weight:500; font-size:16px;">RM <?php echo $data['room_rate']; ?> per room</span>

                                                </div>
                                                <div class="dcategory" >
                                                    <i class="fa fa-building-o" aria-hidden="true"></i>
                                                    <span><?php echo $data['type_name']; ?></span>
                                                </div>
                                                <div class="dsize">
                                                    <i class="bi bi-rulers" aria-hidden="true"></i>
                                                    <span><?php echo $data['sqft']; ?> sqft</span>
                                                </div>
                                                <div class="dbed">
                                                    <i class="fa fa-bed" aria-hidden="true"></i>
                                                    <span>2 single bed</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col" id="cont-rate">
                                            <h4 style="text-align: right; margin-bottom:0px;">4.9</h4>
                                            <span align="right"><i class="bi bi-star-fill" style="color:rgb(243, 208, 9);"></i><i class="bi bi-star-fill" style="color:rgb(243, 208, 9);"></i><i class="bi bi-star-fill" style="color:rgb(243, 208, 9);"></i><i class="bi bi-star-fill" style="color:rgb(243, 208, 9);"></i></span>
                                            <p style="text-align: right; margin:0px; font-size:12px; color:grey;">100 reviews</p>
                                        </div>
                                    </div>

                                    <div class="row" style="height:50px !important; width:100% !important; margin-left:0px; margin-right:0px;">
                                        <div class="col" style="padding:0px">
                                            <div class="card-body">
                                                <form action="view_room.php" method="post">
                                                    <input type="hidden" name="postRID" value="<?php echo $data['pkfac']; ?>">
                                                    <input type="hidden" name="postLoc" value="<?php echo $data['location_name']; ?>">
                                                    <input type="hidden" name="postDesc" value="<?php echo $data['description']; ?>">
                                                    <input type="hidden" name="postRType" value="<?php echo $data['type_name']; ?>">
                                                    <input type="hidden" name="postSize" value="<?php echo $data['sqft']; ?>">
                                                    <input type="hidden" name="b_rate" value="<?php echo $data['bed_rate']; ?>">
                                                    <input type="hidden" name="r_rate" value="<?php echo $data['room_rate']; ?>">
                                                    <input type="submit" class="more-info btn btn-primary" value="More Info">

                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                 <!-- </div> -->
             <?php } ?>
            </div>

        </div>

    </div>

    </section>


        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


        <script>


            function store(){

            var item = {

                location: document.getElementById("location").value,
                startdate: document.getElementById("startdate").value,
                duration: document.getElementById("duration").value,
                roomtype: document.getElementById("roomtype").value,
            };

            // store items in array
            var cartItem = JSON.parse(sessionStorage.getItem("store")) || [];
            cartItem.push(item);

            sessionStorage.setItem("store", JSON.stringify(cartItem));

            }

            //collapsed search panel
            var coll = document.getElementsByClassName("collapsible");
            var i;

            for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                content.style.display = "none";
                } else {
                content.style.display = "block";
                }
            });
            }

            //drawer for filter
            $(".drawer-link").click(function(e) {
            var vdata = $(this).data("id");
            $(".drawer[data-id=" + vdata + "]").addClass("open-drawer");
            e.preventDefault();
            });

            $(".close").on("click", function(e) {
            $(".drawer").removeClass("open-drawer");
            e.preventDefault();
            });

            // // search by location
            // $('#location').change(function(){

            //     var location_name = $(this).val();

            //     $.ajax({
            //     url:"search.php",
            //     method:"POST",
            //     data:{location_name:location_name},
            //     success:function(data){
            //         $('.card-list').html(data);
            //     }
            //     })
            // });

            //pagination
            $(document).ready(function(){

            function load_data(page,filter = '')
                {
                $.ajax({
                    url:"fetch.php",
                    method:"POST",
                    data:{page:page, filter:filter},
                    success:function(data)
                    {
                        $('.cont').html(data);
                    }
                });
                }

                load_data(1);

                $('.fl_room').on('change',function(){
                    var filter = $('.fl_room:checked').serialize();
                    console.log(filter);
                    // var filter = $('#fl_room').val();
                    load_data(1, filter);
                });



                $(document).on('click', '.page-link', function(){
                var page = $(this).data('page_number');
                var filter = $('.fl_room:checked').serialize();
                // var location_name = $(this).data('id');
                // var location_name = $(this).val();
                
                load_data(page, filter);
                });



            });

        </script>


</body>
</html>
