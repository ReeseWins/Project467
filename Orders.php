<html>
    <?php
    include('Session.php');
        $connection = mysqli_connect("courses", "z1808886", "1995Sep20", "z1808886");

        if (!$connection) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
    ?>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            * {
                box-sizing: border-box;
            }

            .row::after {
                content: "";
                clear: both;
                display: block;
            }

            [class*="col-"] {
                float: left;
                padding: 15px;
            }
            .col-1 {width: 8.33%;}
            .col-2 {width: 16.66%;}
            .col-3 {width: 25%;}
            .col-4 {width: 33.33%;}
            .col-5 {width: 41.66%;}
            .col-6 {width: 50%;}
            .col-7 {width: 58.33%;}
            .col-8 {width: 66.66%;}
            .col-9 {width: 75%;}
            .col-10 {width: 83.33%;}
            .col-11 {width: 91.66%;}
            .col-12 {width: 100%;}

            html {
                font-family: "Arial Black", sans-serif;
            }

            .header {
                background-color: crimson;
                color: ghostwhite;
                padding: 15px;
            }

            .menu ul {
                ist-style-type: none;
                margin: 0;
                padding: 0;
            }

            .menu li {
                padding: 8px;
                margin-bottom: 7px;
                background-color: aqua;
                color: ghostwhite;
                box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            }

            .menu li:hover {
                background-color: ghostwhite;
            }

        </style>
    </head>
    <body>

        <div class="header">
            <h1>Orders</h1>
        </div>

        <style class="row">
            <div class="col-3 menu"></div>
                <style= "overflow: auto;">
                    table, th, td { border: 1px solid black;}
                </style>
                Quote Database
                <table>

                    <?php

                        $servername = "courses";
                        $username = "z1808886";
                        $password = "1995Sep20";
                        $dbname = "z1808886";

                        //Create connection
                        $C1 = new mysqli($servername, $username, $password, $dbname);

                        if ($C1->connect_error) {
                            die("Connection failed: ".$C1->connect_error);
                        }

                        $SQL = "SELECT * FROM Quote";
                        $result = $C1->query($SQL);

                        if ($result->num_rows > 0) {
                            echo "<tr><th> QID </th><th> OrderAmount </th><th> Discount </th><th> Item </th><th> Secret_Note </th><th> Approval </th>";

                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><td>". $row["QID"]."</td><td>" . $row["OrderAmount"]."</td><td>" . $row["discount"]. "</td><td>" .$row["Item"]. "</td><td>" .$row["Secret_Note"]. "</td><td>" .$row["Approval"]. "</td></tr>";
                            }
                            echo "</table>";
                        }
                        else {
                            echo "0 results";
                        }
                        $C1->close();
                    ?>

                </table><br>
                Customer Database
                <div STYLE=" height: 310px; width: 670px; font-size: 10px; overflow: auto;">
                <br>
                <table>
                    <?php
                        //Customer Database connection
                        $servername = "blitz.cs.niu.edu";
                        $username = "student";
                        $password = "student";
                        $dbname = "csci467";

                        // Create connection
                        $C2 = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($C2->connect_error) {
                            die("Connection failed: " . $C1->connect_error);
                        }
                        else {
                            echo "Connection Success";
                        }
                            //populate customer database
                            $sql2 = "SELECT * FROM customers";
                            $result = $C2->query($sql2);

                            //fill the table
                            if ($result->num_rows > 0) {
                                echo "<tr><th> Id </th><th> Name </th><th> City </th><th> Street </th><th> Contact </th></th>";
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr><td>". $row["id"]."</td><td>" . $row["name"]."</td><td>" . $row["city"]. "</td><td>" .$row["street"]. "</td><td>" .$row["contact"]. "</td></tr>";

                                }
                                    echo "</table>";
                            }
                            else {
                                echo "0 results";
                            }

                        $C2->close();
                    ?>
                </table>
            </div>
    </body>
</html>
