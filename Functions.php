// Brian Olczak
// Group 8B

<?php
    function createNewQuote($quoteArr) {
        $connection = dbConnect();

        $item = $quoteArr[0];
        $price = $quoteArr[1];
        $discount = $quoteArr[2];
        $notes = $quoteArr[3];

        $approval = 0;

        if ($quoteArr[4] == "on") {
            $approval = 1;
        }
        $customerID = $quoteArr[5];

        $insertSQL = "Insert into Quote (item, price, discount, notes, approval) values ('$item', '$price', '$discount', '$notes', '$approval')";

        if (mysqli_query($connection, $insertSQL)) {
            echo "Your Purchase Number is: ".mysqli_insert_id($connection);
        }
        else {
            echo "Error:".mysqli_error($connection);
        }
        mysqli_close($connection);
    }

    function quoteUpdate() {
        $connection = dbConnect();

        $item = $_POST['Item'];
        $price = $_POST['Price'];
        $discount = $_POST['Discount'];
        $notes = $_POST['Notes'];
        $customerID = $_POST['CustomerID'];
        $purchaseOrder = $_POST['PurchaseOrder'];

        $updateSQL = "Update the Quote SET Item = '$item', Price = '$price', Discount = '$discount', Notes = $notes, CustomerID = '$customerID', PurchaseOrder = '$purchaseOrder';";

        if (!$result = mysqli_query($connection, $updateSQL)) {
            echo "Error: ".mysqli_error($connection);
        }
        mysqli_close($connection);
    }
?>
