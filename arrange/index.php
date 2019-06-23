<?php
require_once("./controller/sql.class.php");
require_once("./controller/search_list.php");
$keyarr = array();
isset($_GET['keyword'])?$keyarr['keyword']=$_GET['keyword']:$keyarr['keyword']='';
isset($_GET['pid_min'])?$keyarr['pid_min']=$_GET['pid_min']:$keyarr['pid_min']='';
isset($_GET['pid_max'])?$keyarr['pid_max']=$_GET['pid_max']:$keyarr['pid_max']='';
$curpage="";
$showrow="";
if ($keyarr['keyword']=="" && $keyarr['pid_min']=="" && $keyarr['pid_max']=="") {
    $curpage=1;
    $showrow=30;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title></title>
    <meta name='robots' content='noindex,nofollow' />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="static/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="static/css/style.css"/>
    <script src="static/js/jquery.min.js"></script>
    <script src="static/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
	
</head>
<body>
<div class="box">
    <a href="index.php" class="page-to-change">修改产品</a>
    <a href="addproduct.php" class="page-to-add">新增产品</a>
    <div class="title">修改产品表字段</div>
    <div class="rules">
        <em>修改规则</em>
        <ul>
            <li><i>1.</i><p>dl、dy内容保持不变。</p></li>
            <li><i>2.</i><p>dladd、dyadd内容有且只有一个值,即只存在一个标准电容或标准电压。</p></li>
            <li><i>3.</i><p>power存放功率。将dl或dy内存在的功率放到这里面。</p></li>
            <li><i>4.</i><p>pin存放单位为cells的值。</p></li>
            <li><i>5.</i><p>seriesadd存放系列,每个系列用英文逗号隔开,且系列名前后不能存在空格。</p></li>
            <li><i>6.</i><p>comp中复制出系列存放至seriesadd中。</p></li>
        </ul>
    </div>
    <div class="content">
        <!--搜索输入框及查询、重置按钮-->
        <div class="container content_width">
            <div class="person_search">
                <form action="./index.php" method="get">
                    <div class="search_input">
                        <div class="input-group mb-3">
                            <span>关键词：</span>
                            <input id="Ktext" name="keyword" type="text" class="form-control" placeholder="请输入产品关键词">
                        </div>
                    </div>
                    <div class="search_input">
                        <div class="input-group mb-3">
                            <span>pid范围：</span>
                            <input id="pid_min" name="pid_min" type="text" class="form-control" placeholder="Min">&nbsp-&nbsp
                            <input id="pid_max" name="pid_max" type="text" class="form-control" placeholder="Max">
                        </div>
                    </div>
                    <div class="search_input">
                        <button class="btn btn-primary search_btn" type="submit" id="search_btn">查询</button>
                        <button class="btn btn-primary search_btn" type="button" id="back_btn">重置</button>
                    </div>
                </form>
            </div>
            <p style="color: #3ea2ee; font-size: 12px;">
                *除了可以搜索产品关键词外还可以直接输入"手机电池"，"平板电池"，"笔记本电池"，"其他电池"，"笔记本适配器"，"电脑电源"，"电子产品"来进行搜索
            </p>
            <div class="line"></div>
        </div>
        <!--表格列表-->
        <table id="tb" class="table dataShowList">
            <thead>
            <tr>
                <th class="checkbox"><input id="pid" type="checkbox"/><label for="pid">pid</label></th>
                <th>pcode</th>
                <th>color</th>
                <th>dl</th>
                <th>dy</th>
                <th>dladd</th>
                <th>dyadd</th>
                <th>power</th>
                <th>pin</th>
                <th>seriesadd</th>
                <th>comp</th>
                <th class="all_change"><input name="category" type="text">category</th>
                <th>
                    操作
                </th>
            </tr>
            </thead>
            <tbody id="show_tbody">
            <?php echo GetResultList($keyarr,$curpage,$showrow); ?>
            </tbody>
        </table>
    </div>
    <button class="updata-all-btn">一键保存</button>
    <button class="back-top" type="button">Top</button>
</div>
<script src="static/js/get_name.js"></script>
<script src="static/js/mejs.js"></script>
</body>
</html>
