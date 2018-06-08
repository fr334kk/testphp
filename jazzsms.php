<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Free Sms</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
       <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html"><img style="margin-top: -15px" src="http://www.jazz.com.pk/assets/uploads/2016/04/logo-jazz.png" width="25%" alt="jazz"></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.html">Home</a></li>
      <li class="active"><a href="jazzsms.php">Free Sms</a></li>
      <li><a href="jazzinfo.php">Account Info</a></li>
    </ul>
  </div>
</nav>
       
        <div class="container">
            <h1 class="text-center">
                Free SMS by OJ
            </h1>
            <form action="jazzsms.php" class="col-xm-6" method="post">
               <div class="form-group">
                <label for="number"> Enter Sender's mobile number </label>
                <input class="form-control" type="text" name="sender_number" placeholder='03xxxxxxxxxx'>
                
                <label for="number"> Enter Receiver's mobile number </label>
                <input class="form-control" type="text" name="receiver_number" placeholder='03xxxxxxxxxx'>
                
                
                <label for="message">Enter message</label>
                <input style="height:220%" type="text" class="form-control" name="message">
                
                <label for="count">Enter number of sms to send</label>
                <input style="width: 80px; " type="text" class="form-control" name="count"> 
                
                <input type="submit" class="btn btn-primary" name="Send" value="send">
                    
               </div>
                
            </form>
        </div>
    
</body>
</html>
<?php
if(isset($_POST['Send']))
   
{ 
    $url = 'http://m.jazz.com.pk/smart/freesms.html?msisdn='.urlencode($_POST['sender_number']);
    if(isset($_POST['sender_number']) && isset($_POST['receiver_number']) && isset($_POST['message']))
    {
$fields = array(
    
    'msisdn' => urlencode($_POST['sender_number']),
    'phone_number' => urlencode($_POST['receiver_number']),
    'message_text' => urlencode($_POST['message']),
    'Submit_Num' => ''         
    //urlencode($_POST['last_name']),
                    );
    }
    else{
        echo "enter all fields";
    }
$fields['message_text'] .= '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 .';
    $count = 1;
    if(isset($_POST['count'])){
       $count = $_POST['count'];
    }
    
//url-ify the data for the POST
$fields_string = '';
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
    for($c = 0 ; $c < $count; $c++)
    {
          curl_exec($ch);
    }
    
        echo "<h1>free sms sent successfully </h1>";

//close connection
curl_close($ch);    
}
?>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   