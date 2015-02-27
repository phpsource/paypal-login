##Paypal login package

###How to use (testing version):

1. Install composer: https://getcomposer.org/

2. Change directory in your cmd and run this command  "composer update"

3. Create a developer.paypal app https://developer.paypal.com/webapps/developer/applications/

4. Add results.php location in constants.php (if you are testing locally then add your ip addres instead of localhost).
ex: http://usr.com/paypal-login/results.php or http://192.xxx.xx.x/paypal-login/result.php

5. Update the location of return url (results.php location) to your app by clicking Edit on App redirect URLs  in your app settings page

6. Add privacy policy url and user agreement url (https://www.paypal.com/ro/webapps/mpp/ua/privacy-full, https://www.paypal.com/ro/webapps/mpp/ua/useragreement-full) in Advanced options under Log In with PayPal in your app settings page

7. Add client id and secret to constants.php (you will find those under sandbox credentials in app settings page)

8. Test with your sandbox account

9. Enjoy

#### Live version

This is simple

Add return url location, change cliend id and secred credentials with the ones under live credentials and remove this line from index.php ( "authend": "sandbox", )

#### This is a small package that i will update as i need it, is a good starting point for someone beggining with PayPal api.