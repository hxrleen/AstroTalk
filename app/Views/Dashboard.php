<!doctype html>
<html lang="en">

<?php include 'include/Head.php' ?>
<body>
    <style>
    .h-100 {
    height: 20vh!important;
    }
</style>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <?php include 'include/Header.php'  ?>
                    
         <div class="app-main">
         <?php include 'include/Sidebar.php' ?>       
        <div class="app-main__outer">
            <div class="app-main__inner">
                <div>   
                     <!-- <h1 class="d-flex justify-content-center" style="text-transform:capitalize;"></h1>  -->
                      <div class="col-xl-3 col-md-6 mb-4">
                           <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Blogs</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" onclick="window.location.href='<?=base_url()?>/Admin/AdminLogin'">
                                                <h1><?php echo $Countdata['data'][0]['countu']; ?></h1>
                                               
                                            </div>
                                        </div> 
                                    </div>    
                                </div>
                </div>
            </div>
        </div>
        
        
    
    
    <script src="https://cdn.anychart.com/releases/8.0.0/js/anychart-base.min.js"></script>
    <div class="card border-left-primary shadow h-100 py-2" style="height: 60vh!important;">
        <div class="card-body">
<div id="container" style="height: 55vh;"></div>
</div></div>




    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <div class="card border-left-primary shadow h-100 py-2" style="height: 73vh!important;margin-top: 5%;width: 100%;">
    <div class="card-body">
    <div id="piechart" style="width: 900px; height: 500px;"></div>
    </div></div>
 

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Package_Name', 'CUID'],
          <?php  
		    $i=0;
			foreach ($Chart['products'] as $rows)
			{
			   echo "['".$rows['Package_Name']."',".$rows['CUID']."],";
		       $i++;
			} 
			
	 ?>
        ]);

        var options = {
          title: 'Blogs by Categories'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>








    <?php 
   // print_r($Chart);
    
    include 'include/Footer.php' 
    
    ?>
    <script>
        anychart.onDocumentReady(function() {

// set the data
// var data = {
//   header: ["Name", "Death toll"],
//   rows: [
//     ["San-Francisco", 1500],
//     ["Messina", 87000],
//     ["Ashgabat", 175000],
//     ["Chile", 10000],
//     ["Tian Shan", 242000],
//     ["Armenia", 25000],
//     ["Iran", 50000]
// ]};


// set the data
var data = {
   header: [ 'Package_Name','CUID'],
   rows: [
     <?php  
		    $i=0;
			foreach ($Chart['products'] as $rows)
			{
			   echo "['".$rows['Package_Name']."',".$rows['CUID']."],";
		       $i++;
			} 
			
	 ?>
 ]};

//alert(JSON.stringify(data));

// create the chart
var chart = anychart.column();

// add data
chart.data(data);

// set the chart title
chart.title("Blogs by Categories");

// draw
chart.container("container");
chart.draw();
});
    </script>
</body>