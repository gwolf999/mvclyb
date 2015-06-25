<?php
/**
 *  一个用来访问MySQL的类
 *  仅仅实现演示所需的基本功能，没有容错等
 *  代码未作修改，只是把注释翻译一下，加了点自己的体会
 */
class DataAccess {
    
    var $link_id; //用于存储数据库连接
   
    var $query_id; //用于存储查询源

    //! 构造函数.
    /**
    * 创建一个新的DataAccess对象
    * @param $host 数据库服务器名称
    * @param $user 数据库服务器用户名
    * @param $pass 密码
    * @param $db   数据库名称
    */
    function __construct($host,$user,$pass,$db) {
        $this->link_id=mysql_pconnect($host,$user,$pass); //连接数据库服务器
        mysql_select_db($db,$this->link_id);              //选择所需数据库
		                                            
		mysql_query("set names utf8;");
    }

    //! 执行SQL语句
    /**
    * 执行SQL语句，获取一个查询源并存储在数据成员$query中
    * @param $sql  被执行的SQL语句字符串
    * @return void
    */
    function query($sql) {
        $this->query_id=mysql_unbuffered_query($sql,$this->link_id); // Perform query here
        if ($this->query_id) return true;
		else return false;
	}

    //! 获取结果集
    /**
    * 以数组形式返回查询结果的所有记录
    * @return mixed
    */
    function fetchRows($sql) {
        $this->query($sql);
		$arr=array();
		$i=0;
		while( $row=mysql_fetch_array($this->query_id,MYSQL_ASSOC) )
		     			                                   //MYSQL_ASSOC参数决定了数组键名用字段名表示
		{   $arr[$i]=$row;
		    $i++;
		 }
            return $arr;
       
    }
}
?>