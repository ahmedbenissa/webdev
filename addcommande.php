<?php
include "deliverycore.php";
//$client= $_POST['client_id'];
//echo "id=";
//echo $client;
//$date= $_POST['date_delivery'];
//echo "date=";
//echo $date;
$field_values_array = $_POST['products'];
//print_r($field_values_array);
$deliverycore1= new deliverycore();
$commandcore1= new commandcore();
$commandcore1->bookadelivery($_POST['client_id'],$_POST['num_tel'],$_POST['address'],$_POST['date_delivery']);
//echo count($field_values_array);
for($i=0;$i<count($field_values_array);$i++)
{
//echo $field_values_array[$i];
$deliverycore1->stats($_POST['client_id'],$field_values_array[$i],$_POST['date_delivery']);
}
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
        <title></title>

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    </head>

   
                        <!--row open-->
                            <div class="row">
                            <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Passer la commande</h4>
                                    </div>
                                    <div class="card-body">
                                        <form class="form-horizontal" method="POST" action=""  name="f">
                                            

                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label">DATE </label>
                                                <div class="col-md-9">
                                                    <input type="date" placeholder="DATE:" class="form-control"  name="date_delivery" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label">Client_id </label>
                                                <div class="col-md-9">
                                                    <input type="number" placeholder="Client_id:" class="form-control"  name="client_id" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label">num tel </label>
                                                <div class="col-md-9">
                                                    <input type="number" placeholder="num_tel:" class="form-control"  name="num_tel" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label">Address </label>
                                                
                                                <div class="col-md-9">
                                                    <input type="varchar" placeholder="address:" class="form-control"  name="address" required>
                                                </div>

                                            </div>
                                            <script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="text" name="products[]" value=""/><a href="javascript:void(0);" class="remove_button"><img src="remove-icon.png"/></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

</script>
<div class="field_wrapper">
    <div>
        <input type="text" name="products[]" value=""/>
        <a href="javascript:void(0);" class="add_button" title="Add field">+</a>
        <button type="submit"></button>
    </div>

</div>
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-1 mb-0" >Passer la commande</button>
                                    
</div>

</div>

                                        </form>                              
                                    </div>
                                </div>
                            </div>
                        <!--row closed-->
                        

            </div>
        </div>
                                                    
        <!--app closed-->

      

     </body>

<!-- Mirrored from www.spruko.com/demo/splite/formelements.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Feb 2019 18:34:42 GMT -->
</html>