<?php
$today = date("Y/m/d");
$special = array(
    array("date" => $today, "tooltip" => "In Australia", "iconClass" => "flags sprite-Australia"),
    array("date" => date('Y-m-d', strtotime($today . ' + 8 days')), "tooltip" => "In France", "iconClass" => "flags sprite-France"),
    array("date" => date('Y-m-d', strtotime($today . ' + 10 days')), "tooltip" => "In USA", "iconClass" => "flags sprite-USA"),
    array("date" => date('Y-m-d', strtotime($today . ' + 16 days')), "tooltip" => "In Germany", "iconClass" => "flags sprite-Germany"),
    array("date" => date('Y-m-d', strtotime($today . ' + 4 days')), "tooltip" => "In India", "iconClass" => "flags sprite-India")
);
$date_special = new EJ\DatePicker("datePicker_special");
echo $date_special->value(new DateTime())->specialDates($special)->render();
?>