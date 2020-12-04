<!DOCTYPE html>
<?php
   include('Session.php');
?>
<html>
<style>
.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}

.row::after {
  content: "";
  clear: both;
  display: table;
}
</style>

   <head>
      <title>Welcome</title>
   </head>

   <body style="background-color:powderblue;">
      <h1>Welcome <?php echo 'Sales Associate'; ?></h1>
      <h3>We offer different plant services from engineering plants to tree repair... All Plant Needs. We have the leaf!</h3>
       <form method="get" action="CreateQuote.php">
        <button type="submit">Create Quote</button>
       </form>
      <form method="get" action="Customer_List.php">
        <button type="submit">Customer List</button>
      </form>
      <form method="get" action="Orders.php">
        <button type="submit">Orders</button>
      </form>
      <form method="get" action="AdminHome.php">
        <button type="submit">Admin Interface</button>
      </form>
      <form method="get" action="Logout.php">
        <button type="submit">Sign Out</button>
      </form>

      <div class="row">
    <div class="column">
      <img src="Pineapple.jpg" alt="Pineapple"><br>
      <img src="Nuclear_Power.jpg" alt="Nuclear Power"><br>
      <img src="Tesla.jpg" alt="Elon Musk">
    </div>
    <div class="column">
      <img src="Wall_E.jpg" alt="Forest" style="width:100%">
    </div>
  </div>
   </body>

</html>
