<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $phone1 = $_POST["phone1"];
    $phone2 = $_POST["phone2"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $region = $_POST["region"];
    $street = $_POST["street"];
    $city = $_POST["city"];
    $postal = $_POST["postal"];
    // Check whether this username exists
    $existSql = "SELECT * FROM `customers` WHERE EMAIL_ID = '$email'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        $showError = "Email Already Exists";
        header("Location: /index.php?signupsuccess=false&error=$showError");
    }
    else{
      if(($password == $cpassword)){
        $locsql = "SELECT LOCATION_ID, STREET_ADDRESS FROM locations WHERE STREET_ADDRESS = '$street'";
        $result = mysqli_query($conn, $locsql);
            
            while($row = mysqli_fetch_assoc($result)){
                $loc_id = $row['LOCATION_ID'];
                $street_check = $row['STREET_ADDRESS'];
            }

        if(!empty($loc_id)){
            $location = $loc_id ;
        }
        else{
            $loc1sql = "INSERT INTO `locations` (`FK_REGION_ID`, `STREET_ADDRESS`, `POSTAL_CODE`, `CITY`) VALUES ('$region', '$street', '$postal', '$city')"; 
            $result = mysqli_query($conn, $loc1sql);

            $loc2sql = "SELECT LOCATION_ID FROM locations WHERE STREET_ADDRESS = '$street'";
            $result = mysqli_query($conn, $loc2sql);
                
                while($row = mysqli_fetch_assoc($result)){
                    $loc1_id = $row['LOCATION_ID'];
                }
                $location = $loc1_id ;
        }

          $hash = password_hash($password, PASSWORD_DEFAULT);
          $sql = "INSERT INTO `customers` (`FIRST_NAME`, `LAST_NAME`, `EMAIL_ID`, `PASS`, `FK_LOCATION_ID`) VALUES ('$firstName', '$lastName', '$email', '$hash', '$location')";   
          $result = mysqli_query($conn, $sql);
          
          
          if ($result){
            $idsql = "SELECT CUSTOMER_ID FROM customers WHERE EMAIL_ID = '$email'";
            $result = mysqli_query($conn, $idsql);
            
            while($row = mysqli_fetch_assoc($result)){
                $idCust = $row['CUSTOMER_ID'];
            }
            
            $phonesql = "INSERT INTO `customers_phonenums` (`FK_CUSTOMER_ID`, `PHONE_NO`) VALUES ('$idCust', '$phone1')";   
            $result = mysqli_query($conn, $phonesql);

            if(!empty($phone2)){
                $phonesql = "INSERT INTO `customers_phonenums` (`FK_CUSTOMER_ID`, `PHONE_NO`) VALUES ('$idCust', '$phone2')";   
                $result = mysqli_query($conn, $phonesql);    
            }
              $showAlert = true;
              header("Location: /index.php?signupsuccess=true");
          }
      }
      else{
          $showError = "Passwords do not match";
          header("Location: /index.php?signupsuccess=false&error=$showError");
      }
    }
}
    
?>