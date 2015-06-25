<?php
 
 //! Model类
 /**
 * 它的主要部分是对应于留言本各种数据操作的函数
 * 如：留言数据的显示、插入、删除等
 */

class Model {
    
    var $dao; //DataAccess类的一个实例（对象）

    //! 构造函数
    /**
    * 构造一个新的Model对象
    * @param $dao是一个DataAccess对象
	* 该参数以地址传递（&$dao）的形式传给Model
	* 并保存在Model的成员变量$this->dao中
	* Model通过调用$this->dao的fetch方法执行所需的SQL语句
    */
    function __construct(&$dao) {
        $this->dao=$dao; 
    }

    function listNote() {    //获取全部留言
        $notes=$this->dao->fetchRows("SELECT * FROM note ORDER BY timedate DESC");
		
            return $notes;
        	
    }
	
	function postNote() {    //插入一条新留言
	    
		$name=$_POST['username'];
        $email=$_POST['email'];
        $content=$_POST['content'];
        $timedate=time()+8*3600;
		$sql="INSERT INTO note (name, email, content, timedate) VALUES 
             ('".$name."', '".$email."', '".$content."', '".$timedate."' )";
	    //echo $sql;  //对于较复杂的合成SQL语句，<br />
                      //调试时用echo输出一下看看是否正确是一种常用的调试技巧
		if ($this->dao->query($sql)) return true;
		else return false;
	}
	
	function deleteNote() {   //删除一条留言，$id是该条留言的id
	    $sql="DELETE FROM note WHERE id=".$_GET['id'];
		if ($this->dao->query($sql)) return true;
		else return false;
	}
	

  
}
?>
