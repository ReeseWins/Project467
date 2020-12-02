// Brian Olczak
// Group 8B
<html>
    <head>
        <style>
            table.buttons {
                position: relative;
                left: 250px;
                top: 10px
            }
        </style>
        <h1>Quotes</h1>
        <br><br>
    </head>
    <body bgcolor="#dc143c">
        <center>
            <?php
                include 'Functions.php';
                display();

                function display() {
                    $connection = dbConnect();

                    echo "<table border=1>";

                    echo "<thead>";
                        echo "<th></th>";
                        echo "<th>PO</th>";
                        echo "<th>Price</th>";
                        echo "<th>Discount</th>";
                        echo "<th>Item</th>";
                        echo "<th>Note</th>";
                        echo "<th>Customer</th>";
                    echo "</thead>";

                    $customerConnection = mysqli_connect('blitz.cs.niu.edu', 'student', 'student', 'csci467', '3306');

                    $SQL = "Select * from Quote;";

                    if ($result = mysqli_query($connection, $SQL)) {
                        $rowNum = sqlite_num_rows($result);

                        for ($i = 0; $i < $rowNum; $i++) {
                            $Ar = mysqli_fetch_array($result);
                                                            //TODO
                            echo "<form method = 'post' action='CustomerQuotesEdit.php' id = 'editForm'>";
                            echo "<tr>";

                                echo "<td><input type = 'radio' name = name = 'select' value = ", ($Ar[0]),"></td>";
                                echo "<td>", ($Ar[0]),"</td>";
                                echo "<td>", ($Ar[1]),"</td>";
                                echo "<td>", ($Ar[2]),"</td>";
                                echo "<td>", ($Ar[3]),"</td>";
                                echo "<td>", ($Ar[4]),"</td>";

                                if ($Ar[6] != '') {
                                                    //TODO change this text
                                    $customerSQL = "Select name from customers where id = $Ar[6];";
                                    $customerResult = mysqli_query($customerConnection, $customerSQL);
                                    $customerAr = mysqli_fetch_array($customerResult);

                                    echo "<td>", ($customerAr[0]), "</td>";
                                }
                                else {
                                    echo "<td>N/A</td>";
                                }
                                echo "</tr>";
                        }
                            mysqli_close($customerConnection);
                    }
                    else {
                        echo "Failed to execute: ".mysqli_error($connection);
                    }
                        echo "</table>";
                        echo "<table class = 'buttons'>";
                        echo "<tr>";
                        echo "<td>";
                                echo "<input type = 'submit' name = 'editQuote' value = 'Edit Quote' >";
                        echo "</form>";
                        echo "</td>";
                        echo "<td>";
                        echo "</br>";
                        echo "<form method='post' action='CreateQuote.php'>";
                            echo "<input type = 'submit' name='createNew' value='CreateNew'>";
                        echo "</form>";
                        echo "</td>";
                    echo "</tr>";
                echo "</table>";
                mysqli_close($connection);
                }
            ?>
        </center>
    </body>
</html>
