<?php
    include '_dbconnect.php';
    session_start();
    $userId = $_SESSION['userId'];
    
    

    if(isset($_POST["updateProfileDetail"])){
        $phone = array();
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $phone[0] = $_POST["phone1"];
        $phone[1] = $_POST["phone2"];
        $password =$_POST["password"];
        $street = $_POST["street"];
        $region = $_POST["region"];
        $city = $_POST["city"];
        $postal = $_POST["postal"];
        $locId = $_POST["locId"];
        $oldPhone1 = $_POST["oldPhone1"];
        $oldPhone2 = $_POST["oldPhone2"];

        
        $passSql = "SELECT * FROM customers WHERE CUSTOMER_ID='$userId'"; 
        $passResult = mysqli_query($conn, $passSql);
        $passRow=mysqli_fetch_assoc($passResult);
        if (password_verify($password, $passRow['PASS'])){ 
            $sql = "UPDATE `customers` SET `FIRST_NAME` = '$firstName', `LAST_NAME` = '$lastName', `EMAIL_ID` = '$email' WHERE `CUSTOMER_ID` ='$userId'";   
            $result = mysqli_query($conn, $sql);

            
            if(!empty($oldPhone2)){
            $phone1sql = "UPDATE customers_phonenums SET PHONE_NO = '$phone[0]' WHERE FK_CUSTOMER_ID = '$userId' and PHONE_NO = '$oldPhone1'";
            $result1 = mysqli_query($conn, $phone1sql);

            $phone2sql = "UPDATE customers_phonenums SET PHONE_NO = '$phone[1]' WHERE FK_CUSTOMER_ID = '$userId' and PHONE_NO = '$oldPhone2'";
            $result2 = mysqli_query($conn, $phone2sql);
            }
            else{
                $phone1sql = "UPDATE customers_phonenums SET PHONE_NO = '$phone[0]' WHERE FK_CUSTOMER_ID = '$userId' and PHONE_NO = '$oldPhone1'";
                $result1 = mysqli_query($conn, $phone1sql);

                $phone2sql = "INSERT INTO customers_phonenums (FK_CUSTOMER_ID,PHONE_NO) VALUES('$userId','$phone[1]') ";
                $result2 = mysqli_query($conn, $phone2sql);
            }

            $locsql = "UPDATE `locations` SET `FK_REGION_ID` = '$region', `STREET_ADDRESS` = '$street', `POSTAL_CODE` = '$postal', `POSTAL_CODE` = '$postal', `CITY` = '$city' WHERE `LOCATION_ID` ='$locId'";   
            $resultloc = mysqli_query($conn, $locsql);
        
            if($resultloc){
                echo '<script>alert("Updated successfully.");
                        window.history.back(1);
                    </script>';
            }else{
                echo '<script>alert("Update failed, please try again.");
                        window.history.back(1);
                    </script>';
            } 
        }
        else {
            echo '<script>alert("Password is incorrect.");
                        window.history.back(1);
                    </script>';
        }
    }
    
   
    
?>

<script>
    alert("PHONE 1:" + <?php echo $phone[0]?> + "PHONE 2:" + <?php echo $phone[1]?>);
</script>