<?php
//! View 类
 /**
 * 针对各个功能（list、post、delete）的各种View子类
 * 被Controller调用，完成不同功能的网页显示
 */
class View {
   
    var $output; //用于保存输出HTML代码的字符串
	
	function display() {  //输出最终格式化的HTML数据
	    echo($this->output);
	  
	}
}

class listView extends View   //显示所有留言的子类
{
    function __construct($notes)
	{
	  foreach ($notes as $value)
	  {
	     $this->output.="<p><strong>访客姓名：</strong>".$value['name']."</p>".
	                    "<p><strong>访客邮箱：</strong>".$value['email']."</p>".
	                    "<p><strong>访客留言：</strong>".$value['content']."</p>".
	                    "<p><strong>来访时间：</strong>".date("y-m-d H:i",$value['timedate'])."</p>".
						"<p align=\"right\"><a href=\"index.php?action=delete&id=".$value['id']."\">删除留言</a>".
                        "<hr />";    
	  }
	  
	  
	}
}

class postView extends View  //发表留言的子类
{
    function __construct($success)
	{
	   if ($success)
	   $this->output="留言成功!<br><a href=\"".$_SERVER['PHP_SELF']."?action=list\">查看</a>";
	   else
	   $this->output="留言保存失败！";
	}
}

class deleteView extends View  //删除留言的子类
{
    function __construct($success)
	{
	   if ($success)
	   $this->output="留言删除成功!<br><a href=\"".$_SERVER['PHP_SELF']."?action=list\">查看</a>";
   
	}
}

?>

