PayPal Recurring Payments
=============

Use this script to easily accept recurring PayPal payments directly on your website.

Requirements
-------

* Need to have PayPal Pro
* Have the recurring payments module added to your PayPal Pro account
* cURL PHP module needs to be installed to make the request to PayPal

Setup
------------

Use the UsageExample.php file as an example of how to use the PayPal script.

Input your PayPal API information : username, password, signature

Edit settings such as the monthly amount and setup fee etc...

The test variable is a boolean value. true if you are running a test in the PayPal sandbox. You must setup your own sandbox account for this. false if you are want to use the live PayPal server and charge an account.

Important
------------

* Even when working in the PayPal sandbox they require that you enter valid card information to test. Use the response array they send back to see what information you need to provide.
* Make sure that the recurring payments module is added to your PayPal Pro account. You need to manually add it or else you'll get an error that might look like "DPRP is disabled for this merchant."