<?php

include("includes/paypalrecurring.php");

$pp = new PayPalRecurringPayments();

$pp->test = true; // connect to the test sandbox or live server
$pp->requestHeaderArr['user'] = "";
$pp->requestHeaderArr['pwd'] = "";
$pp->requestHeaderArr['signature'] = "";
$pp->requestHeaderArr['countrycode'] = "US";
$pp->requestHeaderArr['billingperiod'] = "Month"; // bill per month
$pp->requestHeaderArr['billingfrequency'] = 1; // bill once every month
$pp->requestHeaderArr['currencycode'] = "USD"; 
$pp->requestHeaderArr['amt'] = 9.95; // amount to bill per month
$pp->requestHeaderArr['initamt'] = 0.00; // setup fee
$pp->requestHeaderArr['taxamt'] = $pp->requestHeaderArr['amt'] * .07; // 0 for no tax
$pp->requestHeaderArr['desc'] = "Super Deluxe Package";

// most likely won't need to edit below here

$pp->requestHeaderArr['creditcardtype'] = $_REQUEST["cardtype"];
$pp->requestHeaderArr['acct'] = $_REQUEST["cardnumber"];
$pp->requestHeaderArr['expdate'] = str_pad($_REQUEST["cardexpm"],2,'0', STR_PAD_LEFT)  .  $_REQUEST["cardexpy"]; 
$pp->requestHeaderArr['firstname'] = $_REQUEST["f_nm"];
$pp->requestHeaderArr['lastname'] = $_REQUEST["l_nm"];
$pp->requestHeaderArr['profilestartdate'] = gmdate("Y-m-d\TH:i:s\Z");
$pp->requestHeaderArr['totalbillingcycles'] = $_REQUEST["period"];
$pp->requestHeaderArr['email'] = $_POST['email'];
$pp->requestHeaderArr['payerstatus'] = "verified";

$ppResponse = $pp->PPHttpPost(); // make the connection to paypal and get a response

if(isset($ppResponse['L_ERRORCODE0']))
    echo "Error: {$ppResponse['L_LONGMESSAGE0']}";

?>