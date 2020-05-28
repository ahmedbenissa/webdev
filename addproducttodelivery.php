<?php
include "connect.php";
function nbdeliveriesofclient()
{
  $db =  config::getConnexion();
$stmt = $db->prepare("SELECT id_client,count(id) from deliverytab group by id_client ");
$stmt->execute();
return $stmt;
}
$list2= nbdeliveriesofclient();
function mostsoldproduct(){
 $db =  config::getConnexion();
$stmt = $db->prepare("SELECT id_product,count(id_product) from booktab group by id_product ");
$stmt->execute();
return $stmt;
}
$list1=mostsoldproduct();
mostsoldproduct();
function getdeliverydateofproducts()
{
  $db =  config::getConnexion();
$stmt = $db->prepare("SELECT date,id_product
 from deliverytab
inner join booktab on booktab.id_client=deliverytab.id_client
");
$stmt->execute();
return $stmt;
}
$list=getdeliverydateofproducts();
?>
<!DOCTYPE html>
<html lang="en">
	<style>
/* width */
::-webkit-scrollbar {
  width: 10px;
  height: 30px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
  border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: darkblue; 
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: black; 
}
</style>
<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>sportify-supplier</title>

		<!--Favicon -->
		<link rel="icon" href="favicon.html" type="image/x-icon"/>

		<!--Bootstrap.min css-->
		<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

		<!--Icons css-->
		<link rel="stylesheet" href="assets/css/icons.css">

		<!--mCustomScrollbar css-->
		<link rel="stylesheet" href="assets/plugins/scroll-bar/jquery.mCustomScrollbar.css">

		<!--gallery css-->
		<link rel="stylesheet" href="assets/plugins/gallery/main.css">

		<!--Style css-->
		<link rel="stylesheet" href="assets/css/style.css">

		<!--Sidemenu css-->
		<link rel="stylesheet" href="assets/plugins/toggle-menu/sidemenu.css">

	</head>

	<body class="app ">
	<div class="wave -three"></div>

		<div id="spinner"></div>
				<!--anv open-->
            <nav class="navbar navbar-expand-lg main-navbar">
                <a class="header-brand" href="index-2.html">
                    <img src="assets/img/brand/logo.png" class="header-brand-img" alt="Splite-Admin  logo">
                </a>
                <ul class="navbar-nav navbar-right">
                    
                    <li class="dropdown dropdown-list-toggle d-none d-lg-block">
                        <a href="#" class="nav-link nav-link-lg full-screen-link">
                            <i class="fa fa-expand " id="fullscreen-button"></i>
                        </a>
                    </li>
                    
                </ul>
            </nav>
            <!--nav closed-->
               

                        <!--page-header open-->
						<div class="page-header">
							<h4 class="page-title">Galerie</h4>
						</div>
						<!--page-header closed-->
				<!--aside open-->
				<aside class="app-sidebar">
                <div class="app-sidebar__user">
                    <div class="dropdown user-pro-body text-center">
                        <div class="nav-link pl-1 pr-1 leading-none ">
                            <img src="assets/img/as.png" alt="user-img" class="avatar-xl rounded-circle mb-1">
                            <span class="pulse bg-success" aria-hidden="true"></span>
                        </div>
                        <div class="user-info">
                            <h6 class=" mb-1 text-dark">Supplier</h6>
                        </div>
                    </div>
                </div>

                
					
                    
<li class="slide">
							<a class="side-menu__item"  data-toggle="slide" href="principal.php"><i class="side-menu__icon fa fa-laptop"></i><span class="side-menu__label">Livraison</span></a>
							<ul class="slide-menu">
								
							</ul>
						</li>
                </ul>
            </aside>
				<!--aside closed-->

                <!--app-content open-->
				<div class="app-content">
					<section class="section">

                        <!--page-header open-->
						<div class="page-header">
							<h4 class="page-title">Livraisons</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#" class="text-light-color">Livraison</a></li>
								<li class="breadcrumb-item active" aria-current="page">Statistics</li>
							</ol>
						</div>
						<!--page-header closed-->

                        <!--row open-->
							<div class="row">
							<div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">
										<h4>statistics</h4>
										
									</div>
									<table border="1" align="center">
<tr>

<td>client</td>
<td>nb of deliveries</td>
</tr>

<?PHP
foreach($list2 as $row){
    ?>
    <tr>
   
    
    <td><?PHP echo $row['id_client']; ?></td>
   
        <td><?PHP echo $row['count(id)']; ?></td>

    </tr>
    <?PHP
}

?>
	</table><br><br>
	<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['id_client', 'count(id)'],
  ]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'My Average Day', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
		<?php
	function peakc(){
$peak=0;
$client=0;
$list2=nbdeliveriesofclient();
foreach($list2 as $row)
{
if($row['count(id)']>$peak)
{
	$peak=$row['count(id)'];
	$client=$row['id_client'];
}

} 
return $client;
}
$x=peakc();
echo "client whose id ==";
echo $x;
echo " ";
echo "is the most loyal client";
?>
	<table border="1" align="center">
<tr>


<td>products</td>
<td>nb of sales</td>
</tr>

<?PHP
foreach($list1 as $row){
    ?>
    <tr>
   
    
    
    <td><?PHP echo $row['id_product']; ?></td>
        <td><?PHP echo $row['count(id_product)']; ?></td>
    </tr>
    <?PHP
}
?>

	</table><br><br>
	<?php
	function peak(){
$peak=0;
$product=0;
$list1=mostsoldproduct();

foreach($list1 as $row)
{
if($row['count(id_product)']>$peak)
{
	$peak=$row['count(id_product)'];
	$product=$row['id_product'];
}

} 
return $product;
}
$x=peak();
echo $x;
echo " ";
echo "is the most sold product";
?>

									 <table border="1" align="center">
<tr>

<td>Date_Delivery</td>
<td>id_product</td>

</tr>

<?PHP
foreach($list as $row){
    ?>
    <tr>
   
    <td><?PHP echo $row['date']; ?></td>
    <td><?PHP echo $row['id_product']; ?></td>
    
    </tr>
    <?PHP
}
?>
	</table>	
									<div class="card-body">
								

									</div>
								</div>
							</div>
						<!--row closed-->
						

			</div>
		</div>
		<!--app closed-->

		<!-- Back to top -->
		<a href="#top" id="back-to-top" ><i class="fa fa-angle-up"></i></a>

		<!-- Popup-chat -->
		<a href="#" id="addClass"><i class="ti-comment"></i></a>

		<!--Jquery.min js-->
		<script type="text/javascript" src="js/form.js"></script>
		<script src="assets/js/jquery.min.js"></script>

		<!--popper js-->
		<script src="assets/js/popper.js"></script>

		<!--Tooltip js-->
		<script src="assets/js/tooltip.js"></script>

		<!--Bootstrap.min js-->
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Jquery star rating-->
		<script src="assets/plugins/rating/jquery.rating-stars.js"></script>

		<!--Jquery.nicescroll.min js-->
		<script src="assets/plugins/nicescroll/jquery.nicescroll.min.js"></script>

		<!--Scroll-up-bar.min js-->
		<script src="assets/plugins/scroll-up-bar/dist/scroll-up-bar.min.js"></script>

		<!--mCustomScrollbar js-->
		<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!--Sidemenu js-->
		<script src="assets/plugins/toggle-menu/sidemenu.js"></script>

		<!--Scripts js-->
		<script src="assets/js/scripts.js"></script>
		<script src="js/form.js"></script>
		<script src="assets/js/jquery.showmore.js"></script>

	 </body>

<!-- Mirrored from www.spruko.com/demo/splite/formelements.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Feb 2019 18:34:42 GMT -->
</html>
