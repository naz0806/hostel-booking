<?php
include('dbconnection.php');

//COMMON DEFINITION
define("QUOTES_GPC", (ini_get('magic_quotes_gpc') ? TRUE : FALSE));

if(isset($_POST['submit'])) {
    print_r($_POST);
    include('class/booking_class.php');
    $insBooking = new userBooking();
    $insBooking->addData();
    $insBooking->getErrorsArray();
    $insBooking->displayMessages();

    
}

    //check for valid username
    function is_valid_email($email) {
        $result = TRUE;
       // preg_match('/pattern/i', $string, $matches)
        if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/i", $email)) {
          $result = FALSE;
        }
        return $result;
      }
      
      if (isset($_GET['email']) ) {
          echo "EMAIL IS : ".is_valid_email($_GET['email']);
      }
    


// Strip Input Function, prevents HTML in unwanted places
function stripinput($text) {
	if (!is_array($text)) {
		$text = stripslash(trim($text));
		$text = preg_replace("/(&amp;)+(?=\#([0-9]{2,3});)/i", "&", $text);
		$search = array("&", "\"", "'", "\\", '\"', "\'", "<", ">", "&nbsp;");
		$replace = array("&amp;", "&quot;", "&#39;", "&#92;", "&quot;", "&#39;", "&lt;", "&gt;", " ");
		$text = str_replace($search, $replace, $text);
	} else {
		foreach ($text as $key => $value) {
			$text[$key] = stripinput($value);
		}
	}
	return $text;
}

// Strip Slash Function, only stripslashes if magic_quotes_gpc is on
function stripslash($text) {
	if (QUOTES_GPC) { $text = stripslashes($text); }
	return $text;
}

    
?>