//Brian Olczak
// Group 8B
<>
    <head>
        <h1>Customer Quote</h1>
        <a href="CreateQuoteGUI.php">Select Quote</a>
        <style>
            div {       //TODO change this
                border: 1px solid black;
                width: 650px;
                height: 650px;
                overflow: auto;
            }
        </style>
    </head>
    < bgcolor="aqua">

        </br>
            //Customer info
        <div>
            <table border = 1>
                <th></th>
                <th>ID</th>
                <th>Name</th>
                <th>City</th>
                <th>Street</th>
                <th>Contact</th>

            </table>
        </div>
    </body>
</html>

<?php
    include('Functions.php');
    include('createNewQuote.php');
    newQuote();
    $quote = array($_POST['Item'], $_POST['OrderAmount'], $_POST['Discount'], $_POST['Secret_Note'], $_POST['CustomerID']);
    createNewQuote($quote);

    $user = 'z1808886';
    $pass = '1995Sep20';
    $host = 'courses';
    $db = 'z1808886';
    $Current_User = $_SESSION['Account_ID'];
    try {
        $dsn = "mysql:host=$host;dbname=$db";
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOexception $e){
  echo "Connection failed: " . $e->getMessage();
}

    function newQuote() {
        if ($customerConnection = mysqli_connect('blitz.cs.niu.edu', 'student', 'student', 'csci467', '3306')) {
            $customerSQL = "SELECT Item, OrderAmt, Price, Discount, Secret_Note FROM PurchaseOrder;";
            $customerResult = mysqli_query($customerConnection, $customerSQL);

            if (mysqli_connect_errno()) {
                echo "Connection Error: ".mysqli_error($customerConnection);
            }
            else {
                echo "<form method = 'post' action = 'CreateQuote.php'>";

                $rows = mysqli_num_rows($customerResult);
                echo "<tbody>";

                for ($i = 0; $i < $rows; $i++){
                    $ar = mysqli_fetch_array($customerResult);
                    echo "<tr>";
                    echo "<td><input type = 'radio' name = 'CustomerID' value = ", ($ar[0]), "</td>";
                    echo "<td>",($ar[0]),"</td>";
                    echo "<td>",($ar[1]),"</td>";
                    echo "<td>",($ar[2]),"</td>";
                    echo "<td>",($ar[3]),"</td>";
                    echo "<td>",($ar[4]),"</td>";
                    echo "/n";
                    echo "</tr>";
                }
                echo "</tbody>";

                echo "<table>";
                    echo "<tr>";
                        echo "<td>Item: </td>";
                        echo "<td><textarea row='4' cols = '22' name = 'Item'></textarea></td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>Price: </td>";
                        echo "<td><input type = 'text' name = 'OrderAmount'></td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>Discounts: </td>";
                        echo "<td><input type = 'text' name = 'Discount'></td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>Note: </td>";
                        echo "<td><input type = 'text' name = 'Secret_Note'></td>";
                    echo "</tr>";
                echo "</table>";

                echo "<input type = 'submit' name = 'createNewSubmit' value = 'Submit'>";
                echo "</form>";
            }
        }
        elseif(mysqli_connect_errno()) {
            echo "Connection error:". mysqli_connect_error();
        }
    }
?>
