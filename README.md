ip-tracker
==========


Example Code :

<?php
require_once 'IpTracker.php';
//use : IpTracker();   --- In case auto IP Detect 
$IpTracker=new IpTracker('101.217.242.133');
$IpTracker->locate();
echo 'city- '.$IpTracker->getCity().'<br>';
echo 'Country- '.$IpTracker->getCountryName().'<br>';
echo 'Country Code- '.$IpTracker->getCurrencyCode().'<br>';
echo 'Region- '.$IpTracker->getRegion().'<br>';
echo 'latitude - '.$IpTracker->getLatitude().'<br>';
echo 'longtitude - '.$IpTracker->getLongitude().'<br>';
?>

