<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <title>Your Order</title>
    <link rel = "icon" href ="img/logo.jpg" type = "image/x-icon">
<style>
    .footer {
      position: fixed;
      bottom: 0;
    }
    .table-wrapper {
    background: #fff;
    padding: 20px 25px;
    margin: 30px auto;
    border-radius: 3px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-wrapper .btn {
        float: right;
        color: #333;
        background-color: #fff;
        border-radius: 3px;
        border: none;
        outline: none !important;
        margin-left: 10px;
    }
    .table-wrapper .btn:hover {
        color: #333;
        background: #f2f2f2;
    }
    .table-wrapper .btn.btn-primary {
        color: #fff;
        background: #03A9F4;
    }
    .table-wrapper .btn.btn-primary:hover {
        background: #03a3e7;
    }
    .table-title .btn {		
        font-size: 13px;
        border: none;
    }
    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }
    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }
    .table-title {
        color: #fff;
        background: #4b5366;		
        padding: 16px 25px;
        margin: -20px -25px 10px;
        border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
    }
    table.table tr th:first-child {
        width: 60px;
    }
    table.table tr th:last-child {
        width: 80px;
    }
    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }
    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td a {
        font-weight: bold;
        color: #566787;
        display: inline-block;
        text-decoration: none;
    }
    table.table td a:hover {
        color: #2196F3;
    }
    table.table td a.view {        
        width: 30px;
        height: 30px;
        color: #2196F3;
        border: 2px solid;
        border-radius: 30px;
        text-align: center;
    }
    table.table td a.view i {
        font-size: 22px;
        margin: 2px 0 0 1px;
    }   
    table.table .avatar {
        border-radius: 50%;
        vertical-align: middle;
        margin-right: 10px;
    }
    table {
        counter-reset: section;
    }

    .count:before {
        counter-increment: section;
        content: counter(section);
    }
    

</style>

</head>
<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_nav.php';?>
    <?php 
    if($loggedin){
    ?>

    <div class="container">
        <div class="table-wrapper" id="empty">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
                        <h2>Order <b>Details</b></h2>
                    </div>
                    <div class="col-sm-8">						
                        <a href="" class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>Refresh List</span></a>
                        <a href="#" onclick="window.print()" class="btn btn-info"><i class="material-icons">&#xE24D;</i> <span>Print</span></a>
                    </div>
                </div>
            </div>
           
            <table class="table table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Amount</th>						
                        <th>Payment Mode</th>
                        <th>Order Date</th>
                        <th>Order Time</th>
                        <th>Status</th>						
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'partials/_orderStatusModal.php';
                        $sql = "SELECT * FROM `payments` INNER JOIN orders ON payments.FK_ORDER_ID = orders.ORDER_ID WHERE payments.FK_CUSTOMER_ID = '$userId' AND ORDER_DATE BETWEEN '2022-01-01' AND '2022-12-31'";
                        $result = mysqli_query($conn, $sql);
                        $counter = 0;
                        while($row = mysqli_fetch_assoc($result)){
                            $order_id = $row['ORDER_ID'];
                            $price = $row['ORDER_PRICE'];
                            $MOD = $row['METHOD'];
                            $order_date = $row['ORDER_DATE'];
                            $order_time = $row['ORDER_TIME'];
                            $counter++;
                            
                            echo '<tr>
                                    <td>' . $order_id . '</td>
                                    <td>Php' . $price . '</td>
                                    <td>' . $MOD . '</td>
                                    <td>' . $order_date . '</td>
                                    <td>' . $order_time . '</td>
                                    <td><a id='.$order_id.' onclick ="getID(this.id)" href="#"><i class="material-icons">&#xE5C8;</i></a></td>
                                    
                                </tr>';
                        }
                        

                        if($counter==0) {
                            ?><script> document.getElementById("empty").innerHTML = '<div class="col-md-12 my-5"><div class="card"><div class="card-body cart"><div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3"><h3><strong>You have not ordered any items.</strong></h3><h4>Please order to make me happy :)</h4> <a href="index.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a> </div></div></div></div>';</script> <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div> 

    <?php
     $count =array();
     
     $restau =array();
    $sql = "SELECT * FROM `payments` INNER JOIN orders ON payments.FK_ORDER_ID = orders.ORDER_ID WHERE payments.FK_CUSTOMER_ID = '$userId'";
        $result = mysqli_query($conn, $sql);
        $n=0;
        while($row = mysqli_fetch_assoc($result)){
            $ordid[$n] = $row['ORDER_ID'];
            $tax[$n] = $row['TAX'];
            $totPrice[$n] = $row['ORDER_PRICE'];
            $deliveryCharge[$n] = $row['DELIVERY_CHARGE'];
            $subtotal[$n] = $row['ORDER_AMOUNT'];
        
        $sql1 = "SELECT * FROM `order_details` INNER JOIN goods ON order_details.FK_ITEM_ID = goods.ITEM_ID WHERE FK_ORDER_ID  = '$ordid[$n]'";
         $result1 = mysqli_query($conn, $sql1);
         $i=0;
         while($row1 = mysqli_fetch_assoc($result1)){
            $itemPrice[$n][$i] = $row1['SUBTOTAL'];
            $itemQuant[$n][$i] = $row1['QUANTITY'];
            $item[$n][$i] = $row1['ITEM_NAME'];
            $itemID[$n][$i] = $row1['ITEM_ID'];

            $i++;
         }
         $count[$n] = $i;

         $sql2 = "SELECT * FROM goods INNER JOIN vendors ON goods.FK_RESTAURANT_ID = vendors.RESTAURANT_ID WHERE ITEM_ID =".$itemID[$n][0];
         $result2 = mysqli_query($conn, $sql2);
         while($row2 = mysqli_fetch_assoc($result2)){
             $restau[$n] = $row2['RESTAURANT_NAME'];
         }

         $n++;
        }
    
        $sql = "SELECT * FROM customers INNER JOIN locations ON customers.FK_LOCATION_ID = locations.LOCATION_ID WHERE CUSTOMER_ID = '$userId'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $street = $row['STREET_ADDRESS'];
            $city = $row['CITY'];
        }


    ?>

    <button type="button" id="statusButton" class="btn btn-primary" data-toggle="modal" data-target="#_orderStatusModal" hidden>Launch demo modal</button>
    <script>
        let orderCount = <?php echo $n;?>;
        let street = <?php echo json_encode($street);?>;
        let restau = <?php echo json_encode($restau);?>;
        let city = <?php echo json_encode($city);?>;
        let count = <?php echo json_encode($count);?>;
        let ordid = <?php echo json_encode($ordid);?>;
        let tax = <?php echo json_encode($tax);?>;
        let totPrice = <?php echo json_encode($totPrice);?>;
        let deliveryCharge = <?php echo json_encode($deliveryCharge);?>;
        let subtotal = <?php echo json_encode($subtotal);?>;


        let itemPrice = <?php echo json_encode($itemPrice);?>;
        let itemQuant = <?php echo json_encode($itemQuant);?>;
        let item = <?php echo json_encode($item);?>;

     function getID(clicked_id){
           document.getElementById('orderNum').value = clicked_id; 
           document.getElementById('exampleModalLabel').innerHTML = "ORDER #" + clicked_id;   
           document.getElementById('orderNum').innerHTML = "#" + clicked_id; 
           document.getElementById('addText').innerHTML = street + ", " + city; 
       
           let index =0;
           for(var i=0;i<orderCount;i++){
                if(clicked_id==ordid[i]){
                     index = i;
                };
            };

        document.getElementById('deliText').innerHTML = "Php" + deliveryCharge[index];
        document.getElementById('restauText').innerHTML = restau[index];
        document.getElementById('taxText').innerHTML = "Php" + tax[index];
        document.getElementById('subText').innerHTML = "Php" + subtotal[index];
        document.getElementById('totText').innerHTML = "Php" + totPrice[index];
        
        
        let getRows = document.getElementById('itemRows');
        getRows.innerHTML = "";
            for(var j=0;j<count[index];j++){
            let spanText = document.createElement('span');
            spanText.style.marginLeft = "10px";
            var br = document.createElement("br");
            let p1Text = document.createElement('p');
            p1Text.style.display = "inline";
            p1Text.innerHTML = item[index][j];
            p1Text.style.color = "#5F9EA0";
            
            let p2Text = document.createElement('p');
            p2Text.style.display = "inline";
            p2Text.style.marginLeft = "10px";
            p2Text.innerHTML = itemQuant[index][j] + "pc";

            let p3Text = document.createElement('p');
            p3Text.style.display = "inline";
            p3Text.style.marginLeft = "10px";
            p3Text.innerHTML = "Php" + itemPrice[index][j];

            spanText.appendChild(p1Text);
            spanText.appendChild(p2Text);
            spanText.appendChild(p3Text);
            getRows.appendChild(spanText);
            getRows.appendChild(br);
            };
        
       
           window.statusButton.click();
     };
    </script>

    <?php 
    }
    else {
        echo '<div class="container" style="min-height : 610px;">
        <div class="alert alert-info my-3">
            <font style="font-size:22px"><center>Check your Order. You need to <strong><a class="alert-link" data-toggle="modal" data-target="#loginModal">Login</a></strong></center></font>
        </div></div>';
    }
    ?>
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
  </body>
</html>