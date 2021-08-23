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
    <link rel="stylesheet" href="css/viewroom.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick-theme.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css">

    <!-- jQuery Files -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


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

<section id="room_detail">

    <h4 style="font-family: 'Lato', sans-serif;" id="rname" > <?php echo $_POST['postLoc'];?> </h4>
    <div class="container-fluid d-flex justify-content-center" style="padding:0px 15% 0px 0px; " >
        <div class="row" style="width: 100% !important;">
            <div class="col-8" >
                <div class="card" style="width:70%; left: 270px;">
                    <div class="card-body product-slider-section">
                        <div class="img-container">
                            <div id="productslider" class="carousel slide">
                                <div class="row" >
                                    <div class="col-12">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active zoom-image">
                                                <img src="images/hostelA.png" class="img-fluid">
                                            </div>
                                            <div class="carousel-item zoom-image">
                                                <img src="images/hostelA.png" class="img-fluid">
                                            </div>
                                            <div class="carousel-item zoom-image">
                                                <img src="images/hostelA.png" class="img-fluid">
                                            </div>
                                            <div class="carousel-item zoom-image">
                                                <img src="images/hostelA.png" class="img-fluid">
                                            </div>
                                            

                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <ol class="carousel-indicators position-static m-0 justify-content-start">
                                            <li data-target="#productslider" data-slide-to="0" class="active">
                                                <div class="data-slide-image">
                                                    <img src="images/hostelA.png" class="img-fluid" alt="">
                                                </div>
                                            </li>
                                            <li data-target="#productslider" data-slide-to="1" >
                                                <div class="data-slide-image">
                                                    <img src="images/hostelA.png" class="img-fluid" alt="">
                                                </div>
                                            </li>
                                            <li data-target="#productslider" data-slide-to="2" >
                                                <div class="data-slide-image">
                                                    <img src="images/hostelA.png" class="img-fluid" alt="">
                                                </div>
                                            </li>
                                            <li data-target="#productslider" data-slide-to="3" >
                                                <div class="data-slide-image">
                                                    <img src="images/hostelA.png" class="img-fluid" alt="">
                                                </div>
                                            </li>
                                            
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="rating-tab" data-toggle="tab" href="#rating" role="tab" aria-controls="rating" aria-selected="false">Review</a>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent" style="padding: 15px 10px; font-size:13px;" >
                            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab" >
                                <p class="card-text">Facilities Available :</p>
                                    <?php
                                    $r =  explode(",", $_POST['postDesc']);

                                    echo '<ul class="desc">';
                                    foreach($r as $i) {
                                        echo '<li ><i class="bi bi-dot"></i>'.$i.'</span>';
                                    }
                                    echo '</ul>';
                                    ?>
                            </div>
                            <div class="tab-pane fade" id="rating" role="tabpanel" aria-labelledby="rating-tab" style="padding: 15px 25px; ">
                                <div class="row">
                                    <div class="card rateCard" style="width: 100%; height:fit-content; margin-bottom:3% !important;">
            
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item" id="list-rate" style="display: flex; justify-content: center;">
                                                <fieldset class="rating" >
                                                    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Very good- 5 stars"></label>
                                                    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" ></label>
                                                    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Good - 4 stars"></label>
                                                    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" ></label>
                                                    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Average - 3 stars"></label>
                                                    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" ></label>
                                                    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Bad - 2 stars"></label>
                                                    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" ></label>
                                                    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Too Bad - 1 star"></label>
                                                    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" ></label>
                                                </fieldset>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="form-group">
                                                    <label for="feedback" class="feedback" style="font-size: 14px; font-weight:600; margin-bottom:5px !important;">Care to share more about it?</label>
                                                    <textarea class="form-control" id="feedback" rows="3" placeholder="Write your review here..." style="font-size: 13px;"></textarea>
                                                </div>
                                                <button type="submit" id="btnFeedback" class="btn btn-primary" style="width: 100%;">SUBMIT</button>
                                            </li>

                                        </ul>

                                    </div>
                                </div>
                                <div class="row"  >
                                    <div class="col-md-2" align="center">
                                        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" style="width: 32px;" class="img img-rounded img-fluid"/>
                                        <p class="text-secondary text-center" style="font-size: 9px; margin: 0px 0px 0px;">15 minutes ago</p>
                                    </div>
                                    <div class="col-md-10">
                                        <p>
                                            <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html" style="font-size: 12px;"><strong>Adam Daniel</strong></a>
                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>

                                    </p>
                                    <div class="clearfix" style="margin-left: 0px;"></div>
                                        <p class="comment" style="font-size: 11px;">The room is very comfortable.</p>
                                    </div>

                                </div>
                                <hr style="margin: 10px 0px;">
                                <div class="row">
                                    <div class="col-md-2" align="center">
                                        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" style="width: 32px;" class="img img-rounded img-fluid"/>
                                        <p class="text-secondary text-center" style="font-size: 9px; margin: 0px 0px 0px;">6 months ago</p>
                                    </div>
                                    <div class="col-md-10">
                                        <p>
                                            <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html" style="font-size: 12px;"><strong>Devven Rao </strong></a>
                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>

                                    </p>
                                    <div class="clearfix" style="margin-left: 0px;"></div>
                                        <p class="comment" style="font-size: 11px;">I love this room!</p>
                                    </div>
                                </div>
                                <hr style="margin: 10px 0px;">
                                <div class="row">
                                    <div class="col-md-2" align="center">
                                        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" style="width: 32px;" class="img img-rounded img-fluid"/>
                                        <p class="text-secondary text-center" style="font-size: 9px; margin: 0px 0px 0px;">A year ago</p>
                                    </div>
                                    <div class="col-md-10">
                                        <p>
                                            <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html" style="font-size: 12px;"><strong>Zhang Wei </strong></a>
                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>

                                    </p>
                                    <div class="clearfix" style="margin-left: 0px;"></div>
                                        <p class="comment" style="font-size: 11px;">They provide adequate facilities.</p>
                                    </div>
                                </div>
                                <hr style="margin: 10px 0px;">
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-4" >

                <div class="card" style=" width: 80%; height:fit-content; margin-bottom:3% !important;">
                    <ul class="list-group list-group-flush">
                        <li >
                            <div class="cont">
                                <div class="cont-label">Price</div>
                                <div class="cont-detail" >
                                    <div class="l-label">
                                        <button id="btn1" type=submit class="btn btn-primary btn-lg btn-block btn-light" onclick="storeVal(this.value)" value="<?php echo $_POST['b_rate']; ?>" >RM <?php echo $_POST['b_rate']; ?>
                                            <span class="s-label">per bed</span>
                                        </button>
                                        <button id="btn1" type=submit class="btn btn-primary btn-lg btn-block btn-light" onclick="storeVal(this.value)" value="<?php echo $_POST['r_rate']; ?>" >RM <?php echo $_POST['r_rate']; ?>
                                            <span class="s-label">per room</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="cont">
                                <div class="cont-label">Room Type</div>
                                <div class="cont-detail">
                                    <div class="cont-text">
                                        <?php echo $_POST['postRType'];?>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li >
                            <div class="cont">
                                <div class="cont-label">Size</div>
                                <div class="cont-detail">
                                    <div class="cont-text">
                                        <?php echo $_POST['postSize']; ?> sqft
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="card-body">
                            <form action="booking.php" method="post">
                                <input type="hidden" name="postRID2" value="<?php echo $_POST['postRID'];?>">
                                <input type="hidden" name="postLoc2" value="<?php echo $_POST['postLoc'];?>">
                                <input type="hidden" name="postRType2" value="<?php echo $_POST['postRType'];?>">
                                <input type="hidden" name="postPrice" id="postPrice">
                                <input type="submit" class="add-to-cart btn btn-primary" value="BOOK NOW">
                                    <!-- <a href="http://localhost/booking%20system/view_room.php" name="desc" data-price="#" class="more-info btn btn-primary">More Info</a> -->

                            </form>
                        <!-- <a href="http://localhost/booking%20system/booking.php" class="add-to-cart btn btn-primary">BOOK NOW</a>  -->
                    </div>
                </div>
                
            </div>
        </div>

    </div>

</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js"></script> -->

<script type="text/javascript">
    $('#btn1').on('click', function (e) {
            $('#btn1').each(function () {
                $(this).addClass('active');
            })

        });

    // $(document).ready(function(){
    //     $('#postPrice').val(storeVal(v));
    // });

    function storeVal(v){
        let amount = v;
        console.log(amount);
        document.getElementById('postPrice').value = amount;
    }

    $(function(){
        $('.zoom-image').each(function(){
            var originalImagePath = $(this).find('img').data('original-image');
            $(this).zoom({
                url:originalImagePath,
                magnify:1
            });
        });
    });

    // $(document).ready(function(){
    // $('.carousel-indicators').slick({
    // dots: false,
    // infinite: true,
    // speed: 300,
    // slidesToShow: 4,
    // slidesToScroll: 1,
    // responsive: [
    //     {
    //     breakpoint: 1024,
    //     settings: {
    //         slidesToShow: 4,
    //         slidesToScroll: 1,
    //         infinite: true,
    //         dots: false
    //     }
    //     },
    //     {
    //     breakpoint: 600,
    //     settings: {
    //         slidesToShow: 3,
    //         slidesToScroll: 1
    //     }
    //     },
    //     {
    //     breakpoint: 480,
    //     settings: {
    //         slidesToShow: 1,
    //         slidesToScroll: 1
    //     }
    //     }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    // ]
    // });
    // });


</script>

</body>
</html>
