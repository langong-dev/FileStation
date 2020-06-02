<?php

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
        new TipBox({type:\'load\',str:"努力加载中..",setTime:1500,callBack:function(){  
            new TipBox({type:\'success\',str:\'操作成功\',hasBtn:true});  
        }});  
    });  
      
</script>';
}

// boxstart();
/*
?>

<input type="button" id="success" value="成功" />  
<input type="button" id="error" value="错误" />  
<input type="button" id="load" value="正在加载" />  
<input type="button" id="tip" value="提示" />  

<?php boxend(); */?>
