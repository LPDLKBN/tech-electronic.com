<?php
require_once("./controller/sql.class.php");
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
    <link rel="stylesheet" type="text/css" href="static/css/wangEditor.css"/>
    <script src="static/js/jquery.min.js"></script>
    <script src="static/js/wangEditor.js" type="text/javascript" charset="utf-8"></script>
	
</head>
<body>
<div class="box">
    <a href="index.php" class="page-to-change">修改产品</a>
    <a href="addproduct.php" class="page-to-add">新增产品</a>
    <div class="title">新增产品</div>
<!--     <div class="rules">
        <em>修改规则</em>
        <ul>
            <li><i>1.</i><p>dl、dy内容保持不变。</p></li>
            <li><i>2.</i><p>dladd、dyadd内容有且只有一个值,即只存在一个标准电容或标准电压。</p></li>
            <li><i>3.</i><p>power存放功率。将dl或dy内存在的功率放到这里面。</p></li>
            <li><i>4.</i><p>pin存放单位为cells的值。</p></li>
            <li><i>5.</i><p>seriesadd存放系列,每个系列用英文逗号隔开,且系列名前后不能存在空格。</p></li>
            <li><i>6.</i><p>comp中复制出系列存放至seriesadd中。</p></li>
        </ul>
    </div> -->
    <div class="content" style="background-color: #f2f2f2;">
        <!--搜索输入框及查询、重置按钮-->
        <div class="container">
            <div class="add-product-wrap" id="add-product">
                <div class="add-product-group clear" finished=false>
                    <span class="list-num">1</span>
                    <div class="form-group">
                        <label for="pid-1">pid</label>
                        <input type="text" class="form-control" name="pid-1" data-name="pid" id="pid-1" placeholder="不能为空值">
                    </div>
                    <div class="form-group">
                        <label for="pcode-1">pcode</label>
                        <input type="text" class="form-control" name="pcode-1" data-name="pcode" id="pcode-1" placeholder="不能为空值">
                    </div>
                    <div class="form-group">
                        <label for="okpcode-1">okpcode</label>
                        <input type="text" class="form-control" name="okpcode-1" data-name="okpcode" id="okpcode-1">
                    </div>
                    <div class="form-group">
                        <label for="imgmore-1">imgmore</label>
                        <input type="text" class="form-control" name="imgmore-1" data-name="imgmore" id="imgmore-1"  placeholder="多张图片名称用“|”分隔">
                    </div>
                    <div class="form-group">
                        <label for="cs-1">cs</label>
                        <input type="text" class="form-control" name="cs-1" data-name="cs" id="cs-1">
                    </div>
                    <div class="form-group">
                        <label for="color-1">color</label>
                        <input type="text" class="form-control" name="color-1" data-name="color" id="color-1" placeholder="多种颜色通过“|”分隔">
                    </div>
                    <div class="form-group">
                        <label for="size-1">size</label>
                        <input type="text" class="form-control" name="size-1" data-name="size" id="size-1">
                    </div>
                    <div class="form-group">
                        <label for="comp-1">comp</label>
                        <input type="hidden" class="form-control" name="comp-1" data-name="comp" id="comp-1">
                        <textarea id="editer" style="height: 300px;">

                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="jianjie2-1">jianjie2</label>
                        <input type="text" class="form-control" name="jianjie2-1" data-name="jianjie2" id="jianjie2-1">
                    </div>
                    <div class="form-group">
                        <label for="pprice-1">pprice</label>
                        <input type="text" class="form-control" name="pprice-1" data-name="pprice" id="pprice-1">
                    </div>
                    <div class="form-group">
                        <label for="stock-1">stock</label>
                        <input type="text" class="form-control" name="stock-1" data-name="stock" id="stock-1" placeholder="有货为“ok”，无货为“no”">
                    </div>
                    <div class="form-group">
                        <label for="category-1">category</label>
                        <input type="text" class="form-control" name="category-1" data-name="category" id="category-1">
                    </div>
                    <button type="button" class="insert">执行</button>
                </div>
            </div>
        </div>
        <!--表格列表-->
    </div>
    <button class="add-html-btn">增加结构 (<span>1</span>)</button>
    <button class="insert-all-btn">一键执行</button>
    <button class="back-top" type="button">Top</button>
</div>
<div id="pop-ups">
    
</div>
<script src="static/js/get_name.js"></script>
<script src="static/js/mejs.js"></script>
<script type="text/javascript">
    $(function () {
        var editor = new wangEditor('editer');
        editor.create();
        var comp_1 = $("#comp-1");
        editor.onchange = function () {
            comp_1.val(this.$txt.html());
        };
    });
    $(function () {
        var running=false;//是否正在执行
        var loading = "<div class='sk-circle-bounce'><div class='sk-child sk-circle-1'></div><div class='sk-child sk-circle-2'></div><div class='sk-child sk-circle-3'></div><div class='sk-child sk-circle-4'></div><div class='sk-child sk-circle-5'></div><div class='sk-child sk-circle-6'></div><div class='sk-child sk-circle-7'></div><div class='sk-child sk-circle-8'></div><div class='sk-child sk-circle-9'></div><div class='sk-child sk-circle-10'></div><div class='sk-child sk-circle-11'></div><div class='sk-child sk-circle-12'></div></div>";//加载动画
        var verificatName = [
            "pid",
            "pcode",
            "okpcode",
            "comp",
            "jianjie2",
            "pprice",
            "stock",
            "category"
        ];
        clearTimeout();
        var popUps = function (ele,msg,bgcolor,control=false) {
            var popHtml="";
            var popDom = $(ele);
            popHtml = '<div class="pop-inner" control="'+control+'">'+msg+'</div>';
            popDom.append(popHtml);
            $('.pop-inner:last').css({"visibility":"visible","background-color":bgcolor}).animate({"opacity":1},300);
            if (!control) {
                setTimeout(function(){
                    $('.pop-inner').animate({"opacity":0},100,function(){
                        $('.pop-inner').detach();
                        running=false;
                    });
                },3000);
            };
        };
        //增加结构
        var htmlNum=1,inputHtml='';
        $(".add-html-btn").on('click',function () {
            htmlNum++;
            inputHtml ='<div class="add-product-group clear" finished=false>\
                            <span class="list-num">'+htmlNum+'</span>\
                            <span class="list-remove">×</span>\
                            <div class="form-group">\
                                <label for="pid-'+htmlNum+'">pid</label>\
                                <input type="text" class="form-control" name="pid-'+htmlNum+'" data-name="pid" id="pid-'+htmlNum+'" placeholder="不能为空值">\
                            </div>\
                            <div class="form-group">\
                                <label for="pcode-'+htmlNum+'">pcode</label>\
                                <input type="text" class="form-control" name="pcode-'+htmlNum+'" data-name="pcode" id="pcode-'+htmlNum+'" placeholder="不能为空值">\
                            </div>\
                            <div class="form-group">\
                                <label for="okpcode-'+htmlNum+'">okpcode</label>\
                                <input type="text" class="form-control" name="okpcode-'+htmlNum+'" data-name="okpcode" id="okpcode-'+htmlNum+'">\
                            </div>\
                            <div class="form-group">\
                                <label for="imgmore-'+htmlNum+'">imgmore</label>\
                                <input type="text" class="form-control" name="imgmore-'+htmlNum+'" data-name="imgmore" id="imgmore-'+htmlNum+'" placeholder="多张图片名称用“|”分隔">\
                            </div>\
                            <div class="form-group">\
                                <label for="cs-'+htmlNum+'">cs</label>\
                                <input type="text" class="form-control" name="cs-'+htmlNum+'" data-name="cs" id="cs-'+htmlNum+'">\
                            </div>\
                            <div class="form-group">\
                                <label for="color-'+htmlNum+'">color</label>\
                                <input type="text" class="form-control" name="color-'+htmlNum+'" data-name="color" id="color-'+htmlNum+'" placeholder="多种颜色通过“|”分隔">\
                            </div>\
                            <div class="form-group">\
                                <label for="size-'+htmlNum+'">size</label>\
                                <input type="text" class="form-control" name="size-'+htmlNum+'" data-name="size" id="size-'+htmlNum+'">\
                            </div>\
                            <div class="form-group">\
                                <label for="comp-'+htmlNum+'">comp</label>\
                                <input type="hidden" class="form-control" name="comp-'+htmlNum+'" data-name="comp" id="comp-'+htmlNum+'">\
                                <textarea id="editer'+htmlNum+'" style="height: 300px;">\
                                </textarea>\
                            </div>\
                            <div class="form-group">\
                                <label for="jianjie2-'+htmlNum+'">jianjie2</label>\
                                <input type="text" class="form-control" name="jianjie2-'+htmlNum+'" data-name="jianjie2" id="jianjie2-'+htmlNum+'">\
                            </div>\
                            <div class="form-group">\
                                <label for="pprice-'+htmlNum+'">pprice</label>\
                                <input type="text" class="form-control" name="pprice-'+htmlNum+'" data-name="pprice" id="pprice-'+htmlNum+'">\
                            </div>\
                            <div class="form-group">\
                                <label for="stock-'+htmlNum+'">stock</label>\
                                <input type="text" class="form-control" name="stock-'+htmlNum+'" data-name="stock" id="stock-'+htmlNum+'" placeholder="有货为“ok”，无货为“no”">\
                            </div>\
                            <div class="form-group">\
                                <label for="category-'+htmlNum+'">category</label>\
                                <input type="text" class="form-control" name="category-'+htmlNum+'" data-name="category" id="category-'+htmlNum+'">\
                            </div>\
                            <button type="button" class="insert">执行</button>\
                        </div>';
            $("#add-product").append(inputHtml);
            var editor_add = new wangEditor('editer'+htmlNum);
            editor_add.config.menus = [
                'source',
                '|',
                'bold',
                'underline',
                'italic',
                'strikethrough',
                'eraser',
                'forecolor',
                'bgcolor',
                '|',
                'quote',
                'fontfamily',
                'fontsize',
                'head',
                'unorderlist',
                'orderlist',
                'alignleft',
                'aligncenter',
                'alignright',
                '|',
                'link',
                'unlink',
                'table',
                'emotion',
                '|',
                'img',
                'video',
                'insertcode',
                '|',
                'undo',
                'redo',
                'fullscreen'
            ];
            editor_add.create();
            var comp_add = $("#comp-"+htmlNum+"");
            editor_add.onchange = function () {
                comp_add.val(this.$txt.html());
            };
            $(this).find("span").text(htmlNum);
            $(".insert-all-btn").attr("finished",true);
            $(".insert-all-btn").css({"cursor":"","color":"","backgound":""}).attr('disabled',false).text("一键执行");
        });
        //删除结构
         $('#add-product').on('click','.list-remove',function (e) {
             $(e.target).parent('.add-product-group').remove();
             htmlNum--;
             $(".add-html-btn").find("span").text(htmlNum);
         });
        //执行
        $("#add-product").on("click",".insert",function (){
            if (!running) {
                var _this = this;
                var insertDataDom = $(this).parent(".add-product-group").find("input");
                var insertData = {},allInsertData={};
                for (var i = 0; i < insertDataDom.length; i++) {
                    for (var k = 0; k < verificatName.length; k++) {
                        if (insertDataDom.eq(i).attr('data-name')==verificatName[k]&&insertDataDom.eq(i).val()=="") {
                            alert(insertDataDom.eq(i).attr('data-name')+" 不能为空");
                            return false;
                        };
                    } 
                    insertData[insertDataDom.eq(i).attr('data-name')] = insertDataDom.eq(i).val();
                };
                allInsertData[0] = insertData;
                running=true;
                var confirmHtml = '<p>是否确认执行？</p><button class="confirm-btn">确认执行</button><button class="cancel-btn">取消执行</button>';
                popUps("#pop-ups",confirmHtml,"cadetblue",true);
                $("#pop-ups .confirm-btn").on('click',function (event) {
                    ajaxPostData(allInsertData,_this);
                    $('.pop-inner[control="true"]:first').detach();
                });
                $("#pop-ups .cancel-btn").on('click',"",function () {
                    $('.pop-inner').eq(0).animate({"opacity":0},300,function(){
                        $('.pop-inner').eq(0).detach();
                        running=false;
                    });
                });
            };
        })
        
        // 一键执行
        $(".insert-all-btn").on('click',function () {
            if (!running) {
                var _this = this;
                var groupDom = $(".add-product-group");
                var productNum = groupDom.length,allInsertData={};
                for (var i = 0; i < productNum; i++) {
                    if (groupDom.eq(i).attr("finished")=='true') {
                        continue;
                    };
                    var insertData = {};
                    var insertDataDom = groupDom.eq(i).find("input");
                    for (var j = 0; j < insertDataDom.length; j++) {
                        for (var k = 0; k < verificatName.length; k++) {
                            if (insertDataDom.eq(j).attr('data-name')==verificatName[k]&&insertDataDom.eq(j).val()=="") {
                                alert(insertDataDom.eq(j).attr('data-name')+" 不能为空");
                                return false;
                            };
                        } 
                        insertData[insertDataDom.eq(j).attr('data-name')] = insertDataDom.eq(j).val();
                    }
                    allInsertData[i] = insertData;
                };
                if (Object.keys(allInsertData).length==0) {
                    alert("没有未执行数据。");
                    return false;
                }
                running=true;
                var confirmHtml = '<p>是否确认执行？</p><button class="confirm-btn">确认执行</button><button class="cancel-btn">取消执行</button>';
                popUps("#pop-ups",confirmHtml,"cadetblue",true);
                $("#pop-ups .confirm-btn").on('click',function (event) {
                    ajaxPostData(allInsertData,_this,true);
                    $('.pop-inner[control="true"]:first').detach();
                });
                $("#pop-ups .cancel-btn").on('click',"",function () {
                    $('.pop-inner').eq(0).animate({"opacity":0},300,function(){
                        $('.pop-inner').eq(0).detach();
                        running=false;
                    });
                });
            }
        });
        function ajaxPostData(allData,_this,all=false) {
            $.ajax({
                method: 'post',
                url: 'controller/insert_data.php',
                data: allData,
                dataType: 'Json',
                beforeSend: function () {
                    popUps("#pop-ups",loading,"#000");
                },
                success: function (data) {
                    if (data.result) {
                        popUps("#pop-ups","执行成功！","#28bf49");
                    } else {
                        popUps("#pop-ups",data.info,"#bf283d");
                    }
                },
                complete: function () {
                    $(_this).css({"cursor":"not-allowed","color":"#a7a5a5","backgound":"#fff"}).attr('disabled',true).text("已执行");
                    $(".insert").css({"cursor":"not-allowed","color":"#a7a5a5","backgound":"#fff"}).attr('disabled',true).text("已执行");
                    if (!all) {
                        $(_this).parents(".add-product-group").attr("finished",true);
                    } else {
                        $(".add-product-group").attr("finished",true);
                    };
                },
                error: function () {
                    popUps("#pop-ups",msg.responseText,"#bf283d");
                }
            });
        };
    });
</script>
</body>
</html>
