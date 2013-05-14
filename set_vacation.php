

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <meta charset="utf-8">
	<title>Vacations Date</title>
	
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<style type="text/css">@import "css/jquery.datepick.css";</style>
        <link rel="stylesheet" href="css/style_rabbi.css" type="text/css" media="screen, projection, tv" />
        <link rel="stylesheet" href="css/style-print.css" type="text/css" media="print" />
        <script type="text/javascript" src="js/jquery.datepick.js"></script>
	<script>
	$(function() {
		$( "#datepicker" ).datepick({dateFormat: 'yyyy-mm-dd'});
	});

        $(function() {
		$( "#datepicker2" ).datepick({dateFormat: 'yyyy-mm-dd'});
	});
	</script>


        
    </head>

    <body>
        <div id="wrapper">

		<!-- Header -->
		<div id="header">

			<!-- Your website name  -->
			
			<div id="header-arrow"></div>
		</div>
		<!-- Header end -->

		<!-- Menu -->
		<a href="#skip-menu" class="hidden">Skip menu</a>
		
		<!-- Menu end -->

<hr class="noscreen" />

	<div id="content-box">
		<div id="content-box-in">

			<a name="skip-menu"></a>
			<!-- Content left -->
			<div class="content-box-left">
				<div class="content-box-left-in">


    <h1>Enter your Holidays</h1>
   
          <br></br>
          <form action="update_vacation.php" method="post">
        <from>
            <p>Start Date of your Vacation </p>
           <p>Date: <input type="text" name="date1" id="datepicker"></p>
 </from>

         <to>
            <p>End Date of your Vacation </p>

             <p>Date: <input type="text" name="date2" id="datepicker2"></p>
        </to>


<complite>

    <input id="submit" class="btn" name="submit"  type="submit" value="submit" style="width:120px;" style="height:80px;" />
      
</form>
  
<a href="appoinment.php">Back to Appointment</a>




</complite>





    </div>
				</div>
			</div>
			<!-- Content left end -->

<hr class="noscreen" />

			<!-- Content right -->

			<!-- Content right end -->
			<div class="cleaner">&nbsp;</div>
		</div>


<hr class="noscreen" />


</div>


    </body>

</html>



