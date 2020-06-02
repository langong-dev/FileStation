<center>
  <?php

if ($_COOKIE['admin']!='1'){
  if(md5(trim($_POST['td']))==trim($fileio->getline("password",1))){
    setcookie('admin','1');
    echo "<script>window.location.href='./?type=admin'</script>";
  }
  else if ($_POST['td']!="")echo "Password error ";
  include "login.php";
}
else{
  include "setting.php";
}

  ?>
</center>