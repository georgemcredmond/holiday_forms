
 // The holiday_forms project directory must be placed on a server that supports PHP scripts. Otherwise the home page will load in a browser with no issues. The contest pages will only display code if not supported.

 // The Apache http server was used to develop and test this web applicatoin locally. If needed, the XAMPP stack software can be used to setup the environment on a network.

 // The XAMPP software once installed, connects the Apache HTTP server locally and ths holiday_forms project folder MUST be located within the XAMPP directory named "htdocs".

 // From the XAMPP control panel, the Apache service can be run. This allows a web browser to communicate to the "htdocs" directory by using the URL:  localhost.

 // So if the "holiday_forms" folder is pasted within "htdocs", the URL would be localhost/holiday_forms -OR- localhost/holiday_forms/home.html.

 //  The PHP scripts which handle the submission of form data write to an internal directory within the "holiday_forms" project folder named "ContestData". The data from each individual contest has their own dedicated .txt file for each contest that the scripts will write to upon the forms being filled out and submitted.

 // The scripts for each contest are written to reject any duplicate Kronos ID that an employee attempst to submit, so you should get only one submission per valid employee.