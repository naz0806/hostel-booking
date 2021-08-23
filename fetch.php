<?php

include('dbconnection.php');

$limit = 10;
$page = 1;

if($_POST['page'] > 1 && is_numeric($_POST['page'])){
    $start =(($_POST['page']-1 ) * $limit);
    $page = $_POST['page'];
}
else
{
    $start = 0;
}

$sql = "SELECT a.*, b.*, c.* FROM facility a
        LEFT JOIN location b ON a.pklocation_fac = b.pklocation_fac
        LEFT JOIN type c ON a.pktype = c.pktype 
         ";

if($_POST['filter'])
{   
    //unserialize to jquery serialize variable value
    $filters = array();
    
    parse_str($_POST['filter'], $filters); //changing string into array

    $filter_string = "";
    //split 1st array elements
    foreach($filters as $filter_item)
    {
        foreach($filter_item as $fs)
        {
            $filter_string .= $filter_string != ""? " OR " : "";
            $filter_string .= " a.description LIKE '%".$fs."%'";
        }
        
    }

    // $filterss=implode(',',$filter_item); //change into comma separated value to sub array

    $sql .= ' WHERE ('.$filter_string.') 
    ';
}

$sql .= 'ORDER BY a.pkfac ';

$filter_query = $sql . 'LIMIT '.$start.', '.$limit.' ';

$stmt = $connect->prepare($sql);

$stmt->execute();

$total_data = $stmt->rowCount();

$stmt = $connect->prepare($filter_query);

$stmt->execute();

$res = $stmt->fetchAll();

$output = '
<label class="lab-record" style="margin-top:1%; margin-bottom:1%; margin-left:15px;">
Total Records - '.$total_data.'</label> 


';

if($total_data > 0)
{
    foreach($res as $data)
    {
        $output .= '
        <div class="card hostel-list" data-category="'.$data['description'].'">
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
                                  <span class="loc-name" style="margin-left: 0px; font-weight:500; font-size:16px;">'.$data['location_name'].'</span>
                              </div>
                              <div class="dprice">
                                  <span style="color: rgb(198, 5, 5); font-weight:500; font-size:16px;">RM '.$data['bed_rate'].' per bed</span><br>
                                  <span style="color: rgb(198, 5, 5); font-weight:500; font-size:16px;">RM '.$data['room_rate'].' per room</span>

                              </div>
                              <div class="dcategory" >
                                  <i class="fa fa-building-o" aria-hidden="true"></i>
                                  <span>'.$data['type_name'].'</span>
                              </div>
                              <div class="dsize">
                                  <i class="bi bi-rulers" aria-hidden="true"></i>
                                  <span>'.$data['sqft'].' sqft</span>
                              </div>
                              <div class="dbed">
                                  <i class="fa fa-bed" aria-hidden="true"></i>
                                  <span>2 single bed</span>
                              </div>
                          </div>
                      </div>
                      <div class="col" id="cont-rate">
                          <h4 style="text-align: right; margin-bottom:0px;">4.9</h4>
                          <span align="right"><i class="bi bi-star-fill" style="color:rgb(243, 208, 9);"></i><i class="bi bi-star-fill" style="color:rgb(243, 208, 9);"></i><i class="bi bi-star-fill" style="color:rgb(243, 208, 9);"></i><i class="bi bi-star-fill" style="color:rgb(243, 208, 9);"></i></span><br>
                          <p style="text-align: right; margin-bottom:0px; font-size:12px; color:grey;">100 reviews</p>
                      </div>
                  </div>

                  <div class="row" style="height:50px !important; width:100% !important; margin-left:0px; margin-right:0px;">
                      <div class="col" style="padding:0px">
                          <div class="card-body">
                              <form action="view_room.php" method="post">
                                  <input type="hidden" name="postRID" value="'.$data['pkfac'].'">
                                  <input type="hidden" name="postLoc" value="'.$data['location_name'].'">
                                  <input type="hidden" name="postDesc" value="'.$data['description'].'">
                                  <input type="hidden" name="postRType" value="'.$data['type_name'].'">
                                  <input type="hidden" name="postSize" value="'.$data['sqft'].'">
                                  <input type="hidden" name="b_rate" value="'.$data['bed_rate'].'">
                                  <input type="hidden" name="r_rate" value="'.$data['room_rate'].'">
                                  <input type="submit" class="more-info btn btn-primary" value="More Info">

                              </form>
                          </div>
                      </div>    
                  </div> 

                </div>
            </div>
        </div>
    </div>
        ';
    }
}
else{
    $output .= '<h5 style="margin-left:15px;">No Result Found</h5>';
}

$output .= '
    <div align="center">
        <ul class"pagination" style="list-style-type:none; margin-top: 2%;display: inline-flex; padding-left:10px;">
    
';

$total_links=ceil($total_data/$limit);

$previous_link = '';

$next_link = '';

$page_link = '';

$page_array = [];

if($total_links > 9)
{
    if($page < 10)
    {
        for($count = 1; $count <= 10; $count++)
        {
            $page_array[] = $count;
        }
        $page_array[] = '...';
        $page_array[] = $total_links;
    }
    else
    {
        $end_limit = $total_links - 10;

        if($page > $end_limit)
        {
            $page_array[] = 1;
            $page_array[] = '...';

            for($count = $end_limit; $count <= $total_links; $count++)
            {
                $page_array[] = $count;
            }
        }
        else
        {
            $page_array[] = 1;
            $page_array[] = '...';
            for($count = $page - 1; $count <= $page + 1; $count++)
            {
                $page_array[] = $count;
            }
            $page_array[] = '...';
            $page_array[] = $total_links;
        }


    }
}
else
{
    for($count = 1; $count <= $total_links; $count++)
    {
        $page_array[] = $count;
    }
}

for($count = 0; $count < count($page_array); $count++)
{
    if($page == $page_array[$count])
    {
        $page_link .= '
        <li class="page-item active">
        <a class="page-link" href="#" >'.$page_array[$count].' <span class="sr-only">(current)</span></a>
        </li>
        ';

        $previous_id = $page_array[$count] -1;

        if($previous_id > 0)
        {
            $previous_link = '
            <li class="page-item">
            <a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'" >Previous</a></li>
            ';
        }
        else
        {
            $previous_link = '
            <li class="page-item disabled">
            <a class="page-link" href="#">Previous</a></li>
            ';
        }

        $next_id = $page_array[$count] + 1;

        if($next_id >= $total_links)
        {
            $next_link = '
            <li class="page-item disabled">
                <a class="page-link" href="#">Next</a>
            </li>
            ';
        }
        else
        {
            $next_link = '
            <li class="page-item">
            <a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'" >Next</a></li>
            ';
            
        }
    }
    else
    {
        if($page_array[$count] == '...')
        {
            $page_link .= '
            <li class="page-item disabled">
            <a class="page-link" href="#">...</a>
            </li>
            ';
        }
        else
        {
            $page_link .= '
            <li class="page-item">
            <a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
            ';
        }
    }
}

$output .= $previous_link . $page_link . $next_link;

$output .= '
  </ul>

</div>
';

echo $output;

?>