<?php 


?>

<!DOCTYPE html>
 <html lan='en'>
 <head>
 <title>Customer Information Form</title>
 </head>
 <body>
 <form method='post' action=
 'process_customer_array.php'>
 <h2> Please enter information in all fields</h2>
 First Name <input type='text' pattern='[a-zA-Z ]*' title='15 or less alphabetic characters' 
maxlength='15' name='customer_record[0]' id='customer_record[0]' /><br />
 Last Name <input type='text' pattern='[a-zA-Z ]*' title='20 or less alphabetic characters' 
maxlength='20' name='customer_record[1]' id='customer_record[1]' /><br />
 Address <input type='text' title='30 or less characters' maxlength='30' name='customer_
 record[2]' id='customer_record[2]' /><br />
 City <input type='text' pattern='[a-zA-Z ]*'  title='20 or less characters' maxlength='20' 
name='customer_record[3]' id='customer_record[3]' /><br />
 State <input type='text' pattern='[a-zA-Z ]*'  title='2 characters' maxlength='2' 
name='customer_record[4]' id='customer_record[4]' /><br />
 Zip code <input type='number' min='11111' max='99999' title='5 numerical characters' 
name='customer_record[5]' id='customer_record[5]' /><br />
 <input type='submit' value="Click to submit your information" />
 </form>
 </body>
 </html>