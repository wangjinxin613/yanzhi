<?php
error_reporting(0);
	header("Content-Type: text/html; charset=UTF8");
	session_start();
    $web_url = 'https://uolol.com';
	$time = date("Y/m/d H:i");//获取当前时间
		$ip = "127.0.0.1:3307";//数据库地址
		$username = "root";//数据库用户名
		$password = "root";//密码
		$db = "xcx";//数据库名
		$unicode = "SET NAMES UTF8";
		$con = mysql_connect( $ip , $username , $password );//数据库连接语句
		$p = mysql_select_db( $db );//规定要连接的数据库
		mysql_query( $unicode );	

	class mysql {
   
    /*数据库执行语句，可执行查询添加修改删除等任何sql语句*/
    public function query($sql) {
    	global $con;
        if ($sql == "") {
            $this->show_error("SQL语句错误：", "SQL查询语句为空");
        }
        $this->sql = $sql;
 
        $result = mysql_query($this->sql);
 
        if (!$result) {
            //调试中使用，sql语句出错时会自动打印出来
           
                $this->show_error("错误SQL语句：", $this->sql);
          
        } else {
            $this->result = $result;
        }
        return $this->result;
    }
 


    /*
    mysql_fetch_row()    array  $row[0],$row[1],$row[2]
    mysql_fetch_array()  array  $row[0] 或 $row[id]
    mysql_fetch_assoc()  array  用$row->content 字段大小写敏感
    mysql_fetch_object() object 用$row[id],$row[content] 字段大小写敏感
    */
 
    /*取得结果数据*/
    public function mysql_result_li() {
        return mysql_result($str);
    }
 
    /*取得记录集,获取数组-索引和关联,使用$row['content'] */
    public function fetch_array($resultt="") {
        if($resultt<>""){
            return mysql_fetch_array($resultt);
        }else{
        return mysql_fetch_array($this->result);
        }
    }
 
    //获取关联数组,使用$row['字段名']
    public function fetch_assoc() {
        return mysql_fetch_assoc($this->result);
    }
 
    //获取数字索引数组,使用$row[0],$row[1],$row[2]
    public function fetch_row() {
        return mysql_fetch_row($this->result);
    }
 
    //获取对象数组,使用$row->content
    public function fetch_Object() {
        return mysql_fetch_object($this->result);
    }
 
    //简化查询select
    public function findall($table) {
        $this->query("SELECT * FROM $table");
    }
 
    //简化查询select
    public function select($table, $columnName = "*", $condition = '', $debug = '') {
        $condition = $condition ? ' Where ' . $condition : NULL;
        if ($debug) {
            echo "SELECT $columnName FROM $table $condition";
        } else {
            $this->query("SELECT $columnName FROM $table $condition");
        }
    }
 
    //简化删除del
    public function delete($table, $condition, $url = '') {
     		$result = $this->query("DELETE FROM $table WHERE $condition");
     		return $result;
    }
 
    //简化插入insert
    public function insert($table, $columnName, $value, $url = '') {
        if ($this->query("INSERT INTO $table ($columnName) VALUES ($value)")) {
            if (!empty ($url))
                $this->Get_admin_msg($url, '添加成功！');
        }
    }
 	

    //简化修改update
    public function update($table, $mod_content, $condition) {
        //echo "UPDATE $table SET $mod_content WHERE $condition"; exit();
        $result = $this->query("UPDATE $table SET $mod_content WHERE $condition");     
      return $result;
    }
 
    /*取得上一步 INSERT 操作产生的 ID*/
    public function insert_id() {
        return mysql_insert_id();
    }
 
    //指向确定的一条数据记录
    public function db_data_seek($id) {
        if ($id > 0) {
            $id = $id -1;
        }
        if (!@ mysql_data_seek($this->result, $id)) {
            $this->show_error("SQL语句有误：", "指定的数据为空");
        }
        return $this->result;
    }
 
    // 根据select查询结果计算结果集条数
    public function db_num_rows() {
        if ($this->result == null) {
            if ($this->show_error) {
                $this->show_error("SQL语句错误", "暂时为空，没有任何内容！");
            }
        } else {
            return mysql_num_rows($this->result);
        }
    }
 
    // 根据insert,update,delete执行结果取得影响行数
    public function db_affected_rows() {
        return mysql_affected_rows();
    }
 
    //输出显示sql语句
    public function show_error($message = "", $sql = "") {
        if (!$sql) {
            echo "<font color='red'>" . $message . "</font>";
            echo "<br />";
        } else {
            echo "<fieldset>";
            echo "<legend>错误信息提示:</legend><br />";
            echo "<div style='font-size:14px; clear:both; font-family:Verdana, Arial, Helvetica, sans-serif;'>";
            echo "<div style='height:20px; background:#000000; border:1px #000000 solid'>";
            echo "<font color='white'>错误号：12142</font>";
            echo "</div><br />";
            echo "错误原因：" . mysql_error() . "<br /><br />";
            echo "<div style='height:20px; background:#FF0000; border:1px #FF0000 solid'>";
            echo "<font color='white'>" . $message . "</font>";
            echo "</div>";
            echo "<font color='red'><pre>" . $sql . "</pre></font>";
            $ip = $this->getip();
            if ($this->bulletin) {
                $time = date("Y-m-d H:i:s");
                $message = $message . "\r\n$this->sql" . "\r\n客户IP:$ip" . "\r\n时间 :$time" . "\r\n\r\n";
 
                $server_date = date("Y-m-d");
                $filename = $server_date . ".txt";
                $file_path = "error/" . $filename;
                $error_content = $message;
                //$error_content="错误的数据库，不可以链接";
                $file = "error"; //设置文件保存目录
 
                //建立文件夹
                if (!file_exists($file)) {
                    if (!mkdir($file, 0777)) {
                        //默认的 mode 是 0777，意味着最大可能的访问权
                        die("upload files directory does not exist and creation failed");
                    }
                }
 
                //建立txt日期文件
                if (!file_exists($file_path)) {
 
                    //echo "建立日期文件";
                    fopen($file_path, "w+");
 
                    //首先要确定文件存在并且可写
                    if (is_writable($file_path)) {
                        //使用添加模式打开$filename，文件指针将会在文件的开头
                        if (!$handle = fopen($file_path, 'a')) {
                            echo "不能打开文件 $filename";
                            exit;
                        }
 
                        //将$somecontent写入到我们打开的文件中。
                        if (!fwrite($handle, $error_content)) {
                            echo "不能写入到文件 $filename";
                            exit;
                        }
 
                        //echo "文件 $filename 写入成功";
 
                        echo "——错误记录被保存!";
 
                        //关闭文件
                        fclose($handle);
                    } else {
                        echo "文件 $filename 不可写";
                    }
 
                } else {
                    //首先要确定文件存在并且可写
                    if (is_writable($file_path)) {
                        //使用添加模式打开$filename，文件指针将会在文件的开头
                        if (!$handle = fopen($file_path, 'a')) {
                            echo "不能打开文件 $filename";
                            exit;
                        }
 
                        //将$somecontent写入到我们打开的文件中。
                        if (!fwrite($handle, $error_content)) {
                            echo "不能写入到文件 $filename";
                            exit;
                        }
 
                        //echo "文件 $filename 写入成功";
                        echo "——错误记录被保存!";
 
                        //关闭文件
                        fclose($handle);
                    } else {
                        echo "文件 $filename 不可写";
                    }
                }
 
            }
            echo "<br />";
            if ($this->is_error) {
                exit;
            }
        }
        echo "</div>";
        echo "</fieldset>";
 
        echo "<br />";
    }
 
    //释放结果集
    public function free() {
        @ mysql_free_result($this->result);
    }
 
    //数据库选择
    public function select_db($db_database) {
        return mysql_select_db($db_database);
    }
 
    //查询字段数量
    public function num_fields($table_name) {
        //return mysql_num_fields($this->result);
        $this->query("select * from $table_name");
        echo "<br />";
        echo "字段数：" . $total = mysql_num_fields($this->result);
        echo "<pre>";
        for ($i = 0; $i < $total; $i++) {
            print_r(mysql_fetch_field($this->result, $i));
        }
        echo "</pre>";
        echo "<br />";
    }
 
    //取得 MySQL 服务器信息
    public function mysql_server($num = '') {
        switch ($num) {
            case 1 :
                return mysql_get_server_info(); //MySQL 服务器信息
                break;
 
            case 2 :
                return mysql_get_host_info(); //取得 MySQL 主机信息
                break;
 
            case 3 :
                return mysql_get_client_info(); //取得 MySQL 客户端信息
                break;
 
            case 4 :
                return mysql_get_proto_info(); //取得 MySQL 协议信息
                break;
 
            default :
                return mysql_get_client_info(); //默认取得mysql版本信息
        }
    }
 
    //析构函数，自动关闭数据库,垃圾回收机制
    public function __destruct() {
        if (!empty ($this->result)) {
            $this->free();
        }
       // mysql_close($this->conn);
    } //function __destruct();
 
    /*获得客户端真实的IP地址*/
    function getip() {
        if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {
            $ip = getenv("HTTP_CLIENT_IP");
        } else
            if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {
                $ip = getenv("HTTP_X_FORWARDED_FOR");
            } else
                if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
                    $ip = getenv("REMOTE_ADDR");
                } else
                    if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
                        $ip = $_SERVER['REMOTE_ADDR'];
                    } else {
                        $ip = "unknown";
                    }
        return ($ip);
    }
    function inject_check($sql_str) { //防止注入
        $check = eregi('select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $sql_str);
        if ($check) {
            echo "输入非法注入内容！";
            exit ();
        } else {
            return $sql_str;
        }
    }
    function checkurl() { //检查来路
        if (preg_replace("/https?:\/\/([^\:\/]+).*/i", "\\1", $_SERVER['HTTP_REFERER']) !== preg_replace("/([^\:]+).*/", "\\1", $_SERVER['HTTP_HOST'])) {
            header("Location: http://www.dareng.com");
            exit();
        }
    }

    function Get_admin_msg($url,$msg){
    	if($url == null){
    		  echo '<script>alert(\''; echo $msg; echo '\');history.back();</script>';
    		  exit();
    	}else{
    		echo '<script>alert(\''; echo $msg; echo '\');window.location.href="';echo $url; echo '";</script>';
    		 exit();
    	}
    }
 
}

  $sql = new mysql();

?>