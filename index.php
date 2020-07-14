<html>
  <head>
    <p hidden="hidden">
<?php

include "get.php";

$count = $fileio->getline ("count", 1);
$type = $_GET['type'];
$name = $_GET['name'];
$err  = $_GET['err'];
$c2url = $fileio->getline ("url/$name", 1);

$tit = "FileStation";
//if ($type == "list") $tit = "列表 | ".$tit;


if ($type == "view" && ($name <= 0 || $name > $fileio->getline("count",1)))
{
  #include "404.php";
  $tit = "404 | ".$tit;
}
else if ($type == "view" && $fileio->getline("link/$name",1) == "")
{
  #include "404.php";
  $tit = "404 | ".$tit;
}
else if ($type == "view") $tit = $fileio->getline("link/$name",1)." | ".$tit;
else if ($type == "admin") $tit = "Admin | ".$tit;
else if ($type == ""){
  $tit = $tit;
}
else{
  $tit = "404 | ".$tit;
}

function boxstart(){
  echo '<link rel="stylesheet" type="text/css" href="mdialog.css">
  <script type="text/javascript" src="zepto.min.js"></script>
  <script type="text/javascript" src="mdialog.js"></script>
  ';
  }
  function boxend(){
  echo '<script type="text/javascript">
     //成功  
      $("#success").click(function(){  
          new TipBox({type:\'success\',str:\'操作成功\',hasBtn:true});
      });  
      //错误  
      $("#error").click(function(){  
          new TipBox({type:\'error\',str:\'对不起,出错了!\',hasBtn:true});  
      });  
        
      //提示  
      $("#tip").click(function(){  
          new TipBox({type:\'tip\',str:\'这是提示信息\',clickDomCancel:true,setTime:10000500,hasBtn:true});  
      });  
        
      //加载  
      $("#load").click(function(){  
          new TipBox({type:\'load\',str:"请稍候...",setTime:300,callBack:function(){  
              new TipBox({type:\'success\',str:\'操作成功\',hasBtn:true});  
          }});  
      });  
      // Load2
      $("#load2").click(function(){  
        new TipBox({type:\'load\',str:"请稍候...",setTime:10000000,callBack:function(){  
            //new TipBox({type:\'success\',str:\'操作成功\',hasBtn:true});  
        }});  
    });  
    // Load3
      $("#load3").click(function(){  
        new TipBox({type:\'load\',str:"请稍候...",setTime:10000000,callBack:function(){  
            //new TipBox({type:\'success\',str:\'操作成功\',hasBtn:true});  
        }});  
    });  
        
  </script>';
  }

?>

    </p>
    <title><?php echo $tit ?></title>
    <?php boxstart(); ?>
    <link rel="stylesheet" type="text/css" href="main.css">
  </head>
  <body>
    <div class="head usrimg">
      <br><h1>文件中心 FileStation</h1>
      &nbsp;&nbsp;<a href="./"> 首页 </a>&nbsp;&nbsp;&nbsp;<a href="./?type=admin"> 管理 </a>
    </div>

    <div class="main">
      <hr>
      <?php
        
        if ($type == ""){
          echo "<center><h2>列表</h2><br><div class=\"list\">".
          "<table ><tr><th>名称</th><th>描述</th><th>下载地址</th></tr>";
          for ($i = 1; $i <= $count; $i ++)
          {
            if (trim($fileio->getline("link/$i",1))=="") continue;
            #echo "<tr><td><hr></td><td><hr></td><td><hr></td></tr>";
            echo "<tr><td>".
            //echo "download=\"FileStation-".trim($fileio->getline("link/$i",1))."\">";
            trim($fileio->getline("link/$i",1))."</td>".
            "<td>".trim($fileio->getline("des/$i",1))."</td>".
            "<td><div class=\"b\">".
            "<input type=\"button\" onclick=\"javascript:window.location.href='".
            "./?type=view&name=$i'\" value=\"下载\"></div></td></tr>";
          }
          echo "</table></div></center>";
        }
        else if ($type == "view"){
          if (!$name <= 0 && $name <= $fileio->getline("count",1) && trim($fileio->getline("link/$name",1))!=""){
            $ccurl = str_replace("file/","",$c2url);
            echo "<center><h2>".$fileio->getline("link/$name",1)."</h2>";
            echo "<br>".trim($fileio->getline("des/$name",1))."<br><br><br><br>";
            echo "<div class=\"b\">";
            echo "<a id=\"load\" href=\"".trim($fileio->getline("url/$name",1));
            echo "\" download=\"".trim($fileio->getline("link/$name",1))."-$ccurl\">";
            echo "<input type=\"button\" value=\"下载\"></a></div>";
          }
          else {
            include "404.php";
          }
        }
        else if ($type == "admin"){
          include "admin.php";
        }
        else{
          include "404.php";
        }

        echo "\n";
      ?>
      <br><hr>
    </div>
    <div class="foot usrimg">
      <br>
      <span>由 <b><a href="https://langong-dev.github.io">LanGong</a> &bull; <a href="http://victorwoo.synology.me:516/">5+1Center</a></b> 特别推出</span><br>
    </div>
    <?php boxend(); ?>
    <br>
  </body>
</html>
