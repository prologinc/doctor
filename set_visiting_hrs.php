<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title>Set visiting Hours</title>
        <link type="text/css" href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/style_rabbi.css" type="text/css" media="screen, projection, tv" />
        <link rel="stylesheet" href="css/style-print.css" type="text/css" media="print" />
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.21.custom.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
        <script type="text/javascript" src="js/date.js"></script>
         
                 

         
                


        <style type="text/css">
            body{
                width: 800px;
                margin: 0 auto;
                padding: 0;
				font-family:Arial, Helvetica, sans-serif
            }

            .ui-timepicker-div .ui-widget-header { margin-bottom: 8px; }
                    .ui-timepicker-div dl { text-align: left; }
                    .ui-timepicker-div dl dt { height: 25px; margin-bottom: -25px; }
                    .ui-timepicker-div dl dd { margin: 0 10px 10px 65px; }
                    .ui-timepicker-div td { font-size: 90%; }
                    .ui-tpicker-grid-label { background: none; border: none; margin: 0; padding: 0; }
          
                        
        </style>

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

<h1>Set time </h1>
<p1>
    Saturday
             <br></br>
                    <label for="name">Start Time:</label>
                        
                     <input id="start_sa" name="start" type="text" />

                     <script>
		  $(function() {
			$('#start_sa').timepicker( { });
		  });
                  
		</script>
                        
                     <label for="name">End Time:</label>
                        
                     <input id="end_sa" name="end" type="text" />

                     <script>
		  $(function() {
			$('#end_sa').timepicker({});
		  });
		</script>
                     <label for="name">Maximum patient:</label>
                     <input id="sa_max_p"  name="s_max_p" type="text" style="width:40px;" />
                 <!--    <label for="name">Time per patient:</label>
                     <input id="sa_time_p"  name="s_time_p" type="text"  style="width:40px;"/> -->
                        
                
    <br></br>

</p1>
<p1>
    Sunday
    <br></br>
                    <label for="name">Start Time:</label>

                     <input id="start_su" name="start" type="text" />

                     <script>
		  $(function() {
			$('#start_su').timepicker({});
		  });
		</script>

                     <label for="name">End Time:</label>

                     <input id="end_su" name="end" type="text" />

                     <script>
		  $(function() {
			$('#end_su').timepicker({});
		  });
		</script>

                     <label for="name">Maximum patient:</label>
                     <input id="su_max_p"  name="s_max_p" type="text" style="width:40px;" />
                 <!--    <label for="name">Time per patient:</label>
                     <input id="su_time_p"  name="s_time_p" type="text"  style="width:40px;"/> -->


    <br></br>
</p1>
<p1>
    Monday

    <br></br>
                    <label for="name">Start Time:</label>

                     <input id="start_mo" name="start" type="text" />

                     <script>
		  $(function() {
			$('#start_mo').timepicker({});
		  });
		</script>

                     <label for="name">End Time:</label>

                     <input id="end_mo" name="end" type="text" />

                     <script>
		  $(function() {
			$('#end_mo').timepicker({});
		  });
		</script>

                    <label for="name">Maximum patient:</label>
                     <input id="mo_max_p"  name="s_max_p" type="text" style="width:40px;" />
                    <!-- <label for="name">Time per patient:</label>
                     <input id="mo_time_p"  name="s_time_p" type="text"  style="width:40px;"/> -->

    <br></br>
</p1>
<p1>
    Tuesday
    <br></br>
                    <label for="name">Start Time:</label>

                     <input id="start_tu" name="start" type="text" />

                     <script>
		  $(function() {
			$('#start_tu').timepicker({});
		  });
		</script>

                     <label for="name">End Time:</label>

                     <input id="end_tu" name="end" type="text" />

                     <script>
		  $(function() {
			$('#end_tu').timepicker({});
		  });
		</script>

                     <label for="name">Maximum patient:</label>
                     <input id="tu_max_p"  name="s_max_p" type="text" style="width:40px;" />
                   <!--  <label for="name">Time per patient:</label>
                     <input id="tu_time_p"  name="s_time_p" type="text"  style="width:40px;"/> -->

    <br></br>
</p1>
<p1>
    Wednesday
    <br></br>
                    <label for="name">Start Time:</label>

                     <input id="start_we" name="start" type="text" />

                     <script>
		  $(function() {
			$('#start_we').timepicker({});
		  });
		</script>

                     <label for="name">End Time:</label>

                     <input id="end_we" name="end" type="text" />
                    <script>
                      $(function() {
			$('#end_we').timepicker({});
		  });
		</script>

                    <label for="name">Maximum patient:</label>
                     <input id="we_max_p"  name="s_max_p" type="text" style="width:40px;" />
                   <!--  <label for="name">Time per patient:</label>
                     <input id="we_time_p"  name="s_time_p" type="text"  style="width:40px;"/> -->

    <br></br>
</p1>
<p1>
    Thrusday
   <br></br>
                    <label for="name">Start Time:</label>

                     <input id="start_th" name="start" type="text" />

                     <script>
		 $(function() {
			$('#start_th').timepicker({});
		  });
		</script>

                     <label for="name">End Time:</label>

                     <input id="end_th" name="end" type="text" />

                       <script>
		 $(function() {
			$('#end_th').timepicker({});
		  });
		</script>

                    <label for="name">Maximum patient:</label>
                     <input id="th_max_p"  name="s_max_p" type="text" style="width:40px;" />
                   <!--  <label for="name">Time per patient:</label>
                     <input id="th_time_p"  name="s_time_p" type="text"  style="width:40px;"/> -->

    <br></br>
</p1>
<p1>
    Friday
   <br></br>
                    <label for="name">Start Time:</label>

                     <input id="start_fr" name="start" type="text" />

                     <script>
		  $(function() {
			$('#start_fr').timepicker({});
		  });
		</script>

                     <label for="name">End Time:</label>

                     <input id="end_fr" name="end" type="text" />

                     <script>
		  $(function() {
			$('#end_fr').timepicker({});
		  });
		</script>

                     <label for="name">Maximum patient:</label>
                     <input id="fr_max_p"  name="s_max_p" type="text" style="width:40px;" />
                   <!--  <label for="name">Time per patient:</label>
                     <input id="fr_time_p"  name="s_time_p" type="text"  style="width:40px;"/> -->
             
    <br></br>
</p1>

<complite>
    
    <input id="submit" class="btn" name="submit"  type="submit" value="submit" style="width:120px;" style="height:80px;" />

    <a href="appoinment.php">Back to Appointment</a>

    <script>
                 $('#submit').click(function(e) {

        
        var array = new Array();
        var result = new Array();
        array[0]=$('#start_sa').val();
        array[1]=$('#start_su').val();
        array[2]=$('#start_mo').val();
        array[3]=$('#start_tu').val();
        array[4]=$('#start_we').val();
        array[5]=$('#start_th').val();
        array[6]=$('#start_fr').val();
        array[7]=$('#end_sa').val();
        array[8]=$('#end_su').val();
        array[9]=$('#end_mo').val();
        array[10]=$('#end_tu').val();
        array[11]=$('#end_we').val();
        array[12]=$('#end_th').val();
        array[13]=$('#end_fr').val();

       var day_name;
       var dataString;
       var dateString;
       var max=0;
       var time=0;


        for(var i=0;i<7;i++){
            if(array[i].length>0){
                day_name="";
                max=0;
                time=0;
                switch(i){
                    case 0:{
                           day_name='saturday';
                           max=$('#sa_max_p').val();
                           //time=$('sa_time_p').val();
                           dateString= Date.parse('next saturday').toString('yyyy-M-d');
                            break;
                    }
                    case 1:{
                            day_name='sunday';
                           max=$('#su_max_p').val();
                           //time=$('su_time_p').val();
                            dateString= Date.parse('next sunday').toString('yyyy-M-d');
                            break;
                    }
                    case 2:{
                            max=$('#mo_max_p').val();
                           //time=$('mo_time_p').val();
                            day_name='monday';
                            dateString= Date.parse('next monday').toString('yyyy-M-d');
                            break;
                    }
                    case 3:{
                            max=$('#tu_max_p').val();
                            //time=$('tu_time_p').val();
                            day_name='tuesday';
                            dateString= Date.parse('next tuesday').toString('yyyy-M-d');
                            break;
                    }

                    case 4:{
                           max=$('#we_max_p').val();
                           //time=$('we_time_p').val();
                            day_name='wednesday';
                            dateString= Date.parse('next wednesday').toString('yyyy-M-d');
                            break;
                    }
                    case 5:{
                            max=$('#th_max_p').val();
                           //time=$('th_time_p').val();
                            day_name='thursday';
                            dateString= Date.parse('next thursday').toString('yyyy-M-d');
                            break;
                    }
                    case 6:{
                            max=$('#fr_max_p').val();
                            //time=$('#fr_time_p').val();
                            day_name='friday';
                            dateString= Date.today().next().friday().toString('yyyy-M-d');
                            break;
                    }

                }

           dataString = 'day='+ day_name +'&start='+array[i]+'&end='+array[i+7]+'&date='+dateString+'&max='+max+'&time='+time;



            $.ajax({
                type: "POST",
                url: "live_edit_ajax.php",
                data: dataString,
                cache: false,
                success: function(e)
                {

                }
                });
            }
        }

        //cmpltsaving data
        window.location.href='complite.php';


});

    


    </script>





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
