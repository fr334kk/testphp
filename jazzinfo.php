<?php
$matches= [];
if(isset($_POST['Show']))
{
$curl = curl_init();
$search_string = "";
$url = 'http://m.jazz.com.pk/smart/accountinfo.html?msisdn='.$_POST['number'];
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
$result = curl_exec($curl);
preg_match('#<table[^>]*>(.+?)</table>#is', $result, $matches);
curl_close($curl);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>INFO</title>
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
      <li><a href="jazzsms.php">Free Sms</a></li>
      <li class="active"><a href="jazzinfo.php">Account Info</a></li>
    </ul>
  </div>
</nav>
   
   
   
    <div class="container">
            <h1 class="text-center">
                GET JAZZ Customers Info by OJ
            </h1>
            <form action="jazzinfo.php" class="col-xm-6" method="post">
               <div class="form-group">
                <label for="number"> Enter mobile number </label>
                <input class="form-control" type="text" name="number" placeholder='03xxxxxxxxxx'>
                <input type="submit" class="btn btn-primary" name="Show" value="show">
                    
               </div>
                
            </form>
        
    
     <table class="table table-striped table-border">
    <?php 
         if(isset($_POST['Show']))
{
    echo $matches[1];
}
         ?>
            </table>
            </div>
</body>
</html>