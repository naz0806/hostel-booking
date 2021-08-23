<?php

class userBooking{

    private $_dbFields;
	private $_dbValues;
	private $_method;
	private $_completeMessage;
	private $_errorMessages = array();
	private $_noErrors = true;

    // private $id;
    // private $username;
    // private $password;

    public function addData(){
		$this->_method =  "validate_insert";
		$this->_tableName = "facilitybooked";
		$this->_getFullName();
		$this->_getEmail();
		$this->_getTelNo();
		$this->_getAddress();
		$this->_getCity();
		$this->_getPostcode();
		$this->_getState();
		$this->_getCountry();

		if($this->_noErrors){
			$this->_saveData();
		}
	}
	
    // processing fullname
    private function _getFullName(){
		$this->_FullName = (isset($_POST['fullname']) ? stripinput($_POST['fullname']):"");
		if ($this->_FullName != "") {
			$this->_setDBValue("fullname", $this->_FullName );
		} else {
			$this->_setError("fullname", "Full Name is required");
		}
	}

    // processing email
    private function _getEmail(){
		$this->_Email = (isset($_POST['email']) ? stripinput($_POST['email']):"");
		if ($this->_Email != "" && is_valid_email($this->_Email)) {
			$this->_setDBValue("email", $this->_Email );
		} else {
			$this->_setError("email", "Email is required");
		}
	}

	// processing telephone no.
    private function _getTelNo(){
		$this->_TelNo = (isset($_POST['tel']) ? stripinput($_POST['tel']):"");
		if ($this->_TelNo != "") {
			$this->_setDBValue("tel", $this->_TelNo );
		} else {
			$this->_setError("tel", "Telephone No. is required");
		}
	}
	
	// processing address
    private function _getAddress(){
		$this->_Address = (isset($_POST['address']) ? stripinput($_POST['address']):"");
		$this->_Address2 = (isset($_POST['address2']) ? stripinput($_POST['address2']):"");
		if ($this->_Address != "" ) {
			$this->_Address .= $this->_Address2 != "" ? ",".$this->_Address2 : "";
			$this->_setDBValue("address", $this->_Address );
		} else {
			$this->_setError("address", "Address is required");
		}
	}

	// processing city
    private function _getCity(){
		$this->_City = (isset($_POST['city']) ? stripinput($_POST['city']):"");
		if ($this->_City != "") {
			$this->_setDBValue("city", $this->_City );
		} else {
			$this->_setError("city", "City is required");
		}
	}

	// processing postcode
    private function _getPostcode(){
		$this->_Postcode = (isset($_POST['postcode']) ? stripinput($_POST['postcode']):"");
		if ($this->_Postcode != "") {
			$this->_setDBValue("postcode", $this->_Postcode );
		} else {
			$this->_setError("postcode", "Postcode is required");
		}
	}

	// processing state
    private function _getState(){
		$this->_State = (isset($_POST['state']) ? stripinput($_POST['state']):"");
		if ($this->_State != "") {
			$this->_setDBValue("state", $this->_State );
		} else {
			$this->_setError("state", "State is required");
		}
	}

	// processing country
    private function _getCountry(){
		$this->_Country = (isset($_POST['country']) ? stripinput($_POST['country']):"");
		if ($this->_Country != "") {
			$this->_setDBValue("country", $this->_Country );
		} else {
			$this->_setError("country", "Country is required");
		}
	}

    private function _saveData() {
        global $connect;
		echo "<BR>3. SAVING .. ";
		if ($this->_method == "validate_insert") {
			echo "<BR>4. SAVING : ".$this->_method;
			
			$q = "Insert into ".$this->_tableName." (".$this->_dbFields.") values(".$this->_dbValues.")";
			echo "<BR>5. SAVING : ".$q;
			$result = $connect->prepare($q);
			
			if($result->execute()) {
				$this->_completeMessage = "New data added";
                header("Location:http://localhost/booking%20system/booking.php"); //success=1 means registration successful - refers to success=1 in register.php
			} else {
				$this->_completeMessage = "Error of new data. Unable to add";
			}
	
		}
	}
    
    private function _setDBValue($field, $value) {
		if ($this->_method == "validate_insert") {
			$this->_dbFields .= ($this->_dbFields != "" ? ", " : "").$field;
			$this->_dbValues .= ($this->_dbValues != "" ? ", " : "")."'".$value."'";
		} else {
			$this->_dbValues .= ($this->_dbValues != "" ? ", " : "").$field.($value=="NULL" ? "=".$value : "='".$value."'");
		}
	}

    private function _setError($field, $message, $empty = false) {
		if (!$empty || (isset($this->_fieldsRequired[$field]) && $this->_fieldsRequired[$field] == true)) {
			$this->_noErrors = false;
			$this->_errorMessages[$field] = $message;
		}
	}

	public function getErrorsArray() {
		return $this->_errorMessages;
	}

	public function displayMessages() {
		global $locale;

		if ($this->_noErrors) {
			if ($this->_method == "validate_insert") {
				$message = "<br />\n".$this->_completeMessage."<br /><br />\n";
			} else {
				//$title = $locale['u169'];
				$message = "<br />\n".$this->_completeMessage."<br /><br />\n";
			}
		} else {
			$message = "";//$title." ".$locale['u167']."<br /><br />\n";
			foreach ($this->_errorMessages as $err => $msg) {
				$message .= $msg."<br />\n";
			}
			$message .= "\n";
		}
		echo "<div style='text-align:center' class='alert alert-danger'>".$message."</div>\n";

	}

    
}
    
?>