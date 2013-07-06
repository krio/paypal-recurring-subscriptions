<?php
require_once 'PaypalRecurring.php';

$pp = new PayPalRecurring();

$pp->setIsTest(true); // PayPal test sandbox or live server

// Your PayPal account credentials go here
$pp->request['user'] = '';
$pp->request['pwd'] = '';
$pp->request['signature'] = '';
// End PayPal account credentials

// User info
$pp->request['firstname'] = 'The users first name';
$pp->request['lastname'] = 'The users last name';
$pp->request['email'] = 'The users email address';

$pp->request['creditcardtype'] = 'Visa'; // Visa, Mastercard, Discover, Amex
$pp->request['acct'] = ''; // Credit card number
$pp->request['expdate'] = str_pad('8',2,'0', STR_PAD_LEFT)  .'2020'; // Expiration month and full year. Pad the month with 0. Month should be 1-12. This example is 8/2020.
// End user info

// Product info
$pp->request['countrycode'] = 'US';
$pp->request['billingperiod'] = 'Month'; // Bill per month
$pp->request['billingfrequency'] = 1; // How many times to bill per billing period.. This example is once per month
$pp->request['currencycode'] = 'USD';
$pp->request['amt'] = 9.95; // Amount to bill every month
$pp->request['initamt'] = 0.00; // Setup fee.. One time on account creation
$pp->request['taxamt'] = $pp->request['amt'] * .07; // Replace .07 with your tax percentage. 0 for no tax.
$pp->request['desc'] = 'Super Deluxe Package'; // The description of your product for reporting in your account
$pp->request['profilestartdate'] = gmdate('Y-m-d\TH:i:s\Z');
$pp->request['totalbillingcycles'] = '3'; // How many billing cycles. 0 for no expiration. This example is for 3 total months of billing.
$pp->request['payerstatus'] = 'verified';
// End product info

$ppResponse = $pp->sendRequest();

if(isset($ppResponse['L_ERRORCODE0']))
    echo "Error: {$ppResponse['L_LONGMESSAGE0']}";
else if(isset($ppResponse['ACK']) && $ppResponse['ACK'] == ('Success' || 'SuccessWithWarning'))
    echo "Success: {$ppResponse['ACK']}";
else
    print_r($ppResponse);
