PayPal Recurring Payments
=============

Use this script to easily accept recurring PayPal payments directly on your website. 

Test it in my sandbox: http://krio.me/scripttest/subs

Requirements
-------

* Need to have PayPal Pro
* Have the recurring payments module added to your PayPal Pro account
* cURL PHP module needs to be installed to make the request to PayPal

Setup
------------

Navigate to the deluxeproc.php file

Input your PayPal API information : username, password, signature

Edit settings such as the monthly amount and setup fee.

The test variable is a boolean value. true if you are running a test in the PayPal sandbox. You must setup your own sandbox account for this. false if you are want to use the live PayPal server and charge an account.

Important
------------

* Even when working in the PayPal sandbox they require that you enter valid card information to test.
* Make sure that the recurring payments module is added to your PayPal Pro account. You need to manually add it. 