<?php
////普通页面直接调用
//// 创建数据连接
//$pdo = DB::get_conn();
//// +----------------------------------------------------------------------
////购物车逻辑开始到支付 调用
//// 创建数据连接
//$pdo = DB::get_conn();
//// 判断连接是否有效
//$status = DB::pdo_ping($pdo);
//if($status){
//	//echo 'connect ok'.PHP_EOL;
//}else{
//	//echo 'connect failure'.PHP_EOL;
//	// 重置连接
//	DB::reset_connect();
//	$pdo = DB::get_conn();
//}

class DB {
	// 保存数据库连接
	private static $_instance = null;
	
	// 连接数据库
	public static function get_conn() {
		if (isset(self::$_instance) && !empty(self::$_instance)) {
			return self::$_instance;
		}
	 	$_dbType = 'mysql';
		$_host = "localhost";
		$_username = "powerfq0_tech";
		$_password = "ab-=vhB~9ELp";
		$_dbName = "powerfq0_tech-electronic";
		$pdo = null;
		$params = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'', PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,PDO::ATTR_PERSISTENT => true );
		$dsn = $_dbType . ':host=' . $_host . ';dbname=' . $_dbName;
		// 连接到数据库
		
		try {
			$pdo = new PDO($dsn, $_username, $_password, $params);

		} catch (PDOException $e) {
			throw new ErrorException('Unable to connect to db server. Error:' . $e -> getMessage(), 31);
		}
		self::$_instance = $pdo;
		return $pdo;
	}
	
	public static function get_Order() {
		if (isset(self::$_instance) && !empty(self::$_instance)) {
			return self::$_instance;
		}
	 	$_dbType = 'mysql';
		$_host = "localhost";
		$_username = "root";
		$_password = "";
		$_dbName = "goldsea";
		$pdo = null;
		$params = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'', PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,PDO::ATTR_PERSISTENT => true );
		$dsn = $_dbType . ':host=' . $_host . ';dbname=' . $_dbName;
		// 连接到数据库
		
		try {
			$pdo = new PDO($dsn, $_username, $_password, $params);

		} catch (PDOException $e) {
			throw new ErrorException('Unable to connect to db server. Error:' . $e -> getMessage(), 31);
		}
		self::$_instance = $pdo;
		return $pdo;
	}

	/**
	 * 检查连接是否可用
	 * @param Link $dbconn 数据库连接
	 * @return Boolean
	 */
	public static function pdo_ping($pdo) {
		try {
			$pdo -> getAttribute(PDO::ATTR_SERVER_INFO);
		} catch (PDOException $e) {
			if (strpos($e -> getMessage(), 'MySQL server has gone away') !== false) {
				return false;
			}
		}
		return true;
	}

	// 重置连接
	public static function reset_connect() {
		self::$_instance = null;
	}

}
?>