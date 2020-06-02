<?php

include "get.php";
$do=$_GET['do'];
$count = $fileio->getline("count",1);
if ($do=="new"){
  $count ++;
  $file = fopen("count","w");
  fwrite($file, $count);
  fclose($file);
}


for ($i = 1; $i <= $count; $i ++)
{
  $file = fopen("url/$i","w");
  fwrite($file, $_POST["u$i"]);
  fclose($file);
  $file = fopen("des/$i","w");
  fwrite($file, $_POST["d$i"]);
  fclose($file);
  $file = fopen("link/$i","w");
  fwrite($file, $_POST["l$i"]);
  fclose($file);
}

if ($_POST['password1']==$_POST['password2']&&trim($_POST['password1'])!=""){
  $file = fopen("password","w");
  fwrite($file, md5($_POST["password1"]));
  fclose($file);
}

echo "<script>window.location.href='./?type=admin'</script>";

?>
