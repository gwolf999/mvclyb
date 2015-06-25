<?php

 //! Controller
  /**
  * 控制器将$_GET['action']中不同的参数（list、post、delete）
  * 对应于完成该功能控制的相应子类
  */

class Controller {
    var $model;  // Model 对象 
    var $view;   // View  对象

    //! 构造函数
    /**
    * 构造一个Model对象存储于成员变量$this->model;
    */
    function __construct (& $dao) {
        $this->model=& new Model($dao);
    }

  
	 function getView() {    //获取View函数
	                         //返回视图对象view
							 //对应特定功能的Controller子类生成对应的View子类的对象
                             //通过该函数返回给外部调用者
	   return $this->view;
	 }


}

//用于控制显示留言列表的子类
class listController extends Controller{   //extends表示继承  

 function __construct (& $dao) {
      parent::__construct($dao);  //继承其父类的构造函数
	                              //该行的含义可以简单理解为：
								  //将其父类的构造函数代码复制过来
      $notes=$this->model->listNote();
	  $this->view=& new listView($notes);
	                              //创建相应的View子类的对象来完成显示
								 
	
	
 }
}

//用于控制添加留言的子类
class postController extends Controller{

 function __construct (& $dao) {
      parent::__construct($dao);
	  if ($this->model->postNote()) $success=1;
	  else $success=0;
	  $this->view=& new postView($success);
 }
}

//用于控制删除留言的子类
class deleteController extends Controller{

 function __construct (& $dao) {
      parent::__construct($dao);
      if ($this->model->deleteNote()) $success=1;
	  else $success=0;
	  $this->view=& new deleteView($success);
 }
}



?>
