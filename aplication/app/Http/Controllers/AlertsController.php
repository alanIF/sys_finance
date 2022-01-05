<?php
namespace App\Http\Controllers;




class AlertsController extends Controller {
    public function message($msg){
        echo "<script type='javascript'>alert('".$msg."'); </script>";
    }
}
?>