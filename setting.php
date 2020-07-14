<?php $ne=$count + 1?>
<script>
  function to(){
    document.getElementById('new').innerHTML = <?php echo "\"<tr><td><input type=\"text\" name=\"u$ne\"></td>".
  "<td><input type=\"text\" name=\"d$ne\"></td></tr>\""?>;
  }
</script>
<?php
  if ($name=="new")
    $iue="?do=new";
  else
    $iue="";

?>
<?php
$g = 0;
$fn = array();
$handler = opendir('file');
while( ($filename = readdir($handler)) !== false ) {
  if($filename != "." && $filename != ".."){
    $fn [$g ++] = "file/".$filename;
  }
}
closedir($handler);
?>
<br><h2>设置</h2>
<form action="./set.php<?php echo $iue ?>" method="post">
  <br>
  <div class="input">
    <h4>文件设置</h4>
    <?php

echo "<center><table><tr><th>名称</th><th>描述</th><th>地址</th></tr>";
for ($i = 1; $i <= $count; $i ++)
{
  echo "<tr><td><input type=\"text\" value=\"".
  trim($fileio->getline("link/$i",1))."\" name=\"l$i\"></td>".
  "<td><input type=\"text\" value=\"".trim($fileio->getline("des/$i",1)).
  "\" name=\"d$i\"></td>".
  "<td><select name=\"u$i\">";
  for ($j = 0; $j < $g; $j ++)
  {
    echo "<option value=\"".$fn[$j]."\" ";
    if (trim($fileio->getline("url/$i",1)) == trim($fn[$j])) echo "selected";
    echo ">".$fn[$j]."</option>";
  }
  echo "</select></td></tr>";
  #echo trim($fileio->getline("url/$i",1));
}

if ($name == "new")
{
  echo "<tr><td><input type=\"text\" name=\"l$ne\"></td>".
  "<td><input type=\"text\" name=\"d$ne\"></td>".
  "<td><select name=\"u$i\">";
  for ($j = 0; $j < $g; $j ++)
  {
    echo "<option value=\"".$fn[$j]."\" ";
    echo ">".$fn[$j]."</option>";
  }
  echo "</select></tr>";
}
    ?>
    </table>

    <br>
  </div>
  <div class="b">
    <?php
    if($name=="")echo "<input type=\"button\" value=\" 添加 + \" onclick=\"javascript:window.location.href='?type=admin&name=new'\">";
    else echo "<input type=\"button\" value=\" 删除 - \" onclick=\"javascript:window.location.href='?type=admin'\">";
    ?>
    <input type="button" value=" 上传文件 + " onclick="javascript:window.location.href='./update.php'">
    <input type="submit" value=" 更新 " id="load2">
  </div>
  <br>
  <div class="input password">
    <h4>管理设置</h4>
    <input type="password" name="password1" placeholder="New password"><br><br>
    <input type="password" name="password2" placeholder="Input new password again"><br><br>
  </div>
  <br>
  <div class="b">
    <input type="submit" value=" 更新 " id="load3">
  </div>
</form>
