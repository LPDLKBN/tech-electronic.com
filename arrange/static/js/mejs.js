$(function () {
    //Go Top
    $(window).scroll(function () {
        $(window).scrollTop()>474?$('.back-top').css({"visibility":"visible"}).stop(true).animate({"opacity":"1"}, 300):$('.back-top').animate({"opacity":"0"},300,function () {
            $('.back-top').css({"visibility":"hidden"});
        });
        $('.back-top').click(function () {
            $('html,body').stop(true).animate({scrollTop:0}, 500);
        });
    });
    $('#back_btn').click(function () {
        $('#Ktext,#pid_min,#pid_max').val(' ');
    })

    $('#renyuan').on('hide.bs.modal',function() {
        $('#xztb input').val(' ');
    });
    // 点击单元成可修改模式
    $('#show_tbody .change').on("click",function (e) {
        if ($(this).children('.change_focus').length==0) {
            var this_text = $(this).children('.text').text();
            var htmlStr = '';
            if ($(this).hasClass("down")) {
                htmlStr = '<div class="change_focus down_wrap">\
                                <input class="enter" type="text" value="'+this_text+'">\
                                <ul class="down_menu">';
                                    for(var i in cateName){
                                        htmlStr+='<li><p>'+i+'</p><ul class="select">';
                                        for(var j in cateName[i]){
                                            htmlStr+='<li data-category="'+j+'"><p>('+j+') '+cateName[i][j]+'</p></li>';
                                        }
                                        htmlStr+='</ul></li>';
                                    }
                                htmlStr+='</ul>\
                            </div>';
            } else {
                htmlStr = '<div class="change_focus"><textarea class="enter" name="" id="">'+this_text+'</textarea></div>';
            }
            $(this).append(htmlStr);
            $(this).siblings('.change').children('.change_focus').remove();
            $(this).parent('tr').siblings('tr').find('.change_focus').remove();
            $(this).find('.enter').bind('input propertychange',function () {
                var thisTextDom = $(this).parent().siblings('.text');
                var thisVal = $(this).val();
                thisTextDom.text(thisVal);
                $(this).parents('tr').find('.info-boll').addClass('acting').removeClass('no-act').find('img').attr('src','static/picture/acting.png');
                switch(thisTextDom.attr("data-name")) {
                    case "dladd":
                        if (!/^[0-9]+\.*[0-9]*m*ah$/i.test(thisVal)) {
                            $(this).parents(".change").addClass("dot");
                        } else {
                            $(this).parents(".change").removeClass("dot");
                        };
                        break;
                    case "dyadd":
                        if (!/^[0-9]+\.*[0-9]*v$/i.test(thisVal)) {
                            $(this).parents(".change").addClass("dot");
                        } else {
                            $(this).parents(".change").removeClass("dot");
                        };
                        break;
                    case "seriesadd":
                        if (/^\s+|\s+$/.test(thisVal)) {
                            $(this).parents(".change").addClass("dot");
                        } else {
                            $(this).parents(".change").removeClass("dot");
                        };
                        break;
                    case "category":
                        if (!/^[A-K][0-9]{3,4}$/.test(thisVal)) {
                            $(this).parents(".change").addClass("dot");
                        } else {
                            $(this).parents(".change").removeClass("dot");
                        };
                        break;
                }
            });
            // 选中的单元编辑
            $('.down_wrap .select>li').on('click',function () {
                var category = $(this).attr("data-category");
                if (this_text!=category) {
                     $(this).parents('tr').find('.info-boll').addClass('acting').removeClass('no-act').find('img').attr('src','static/picture/acting.png');
                }
                if (!/^[A-K][0-9]{3,4}$/.test(category)) {
                    $(this).parents(".change").addClass("dot");
                } else {
                    $(this).parents(".change").removeClass("dot");
                };
                $(this).parents('.change_focus').children('.enter').val(category);
                $(this).parents('.change_focus').siblings('.text').text(category);
                
            });
        }
    });
    // 点击其他区域关闭
    $(document).click(function (e) {
        if ($(e.target).closest('.change').length > 0) {
           return false;
        } else {
            $('#show_tbody .change').children('.change_focus').remove();
        }
        
    });
    // ajax提交后端保存
    var opcating = true;
    $('#show_tbody .save').on('click',function () {
        if (!opcating) {
            if ($('.box').children('.info_fixed').length==0) {
                let msg = '操作过于频繁！！！！！！！！！！';
                let msgHtml = '<div id="info_fixed">'+msg+'</div>';
                $('.box').append(msgHtml);
                $('#info_fixed').animate({"opacity":"1"});
                setTimeout(function () {
                    $('#info_fixed').animate({"opacity":"0"},300,function () {
                        $('#info_fixed').remove();
                    });
                },1000);
            }
        } else{
            opcating = false;
            var _this = $(this);
            var dataList = _this.parents('tr').find('.text');
            var RowData = {},checkedData = {};
            for (var i = 0; i < dataList.length; i++) {
                RowData[dataList.eq(i).attr('data-name')] = dataList.eq(i).text();
            };
            checkedData[0] = RowData;
            _this.siblings().find('img').attr('src','static/picture/loading.png').addClass('roll');
            $.ajax({
                method: 'post',
                url: 'controller/save_data.php',
                data: checkedData,
                dataType: 'Json',
                beforeSend: function () {
                    
                },
                success: function (data) {
                    if (data.result) {
                        _this.parents('tr').find('.info-boll').addClass('acted').removeClass('acting');
                    } else {
                        alert(data.info);
                    }
                },
                complete: function () {
                    _this.siblings().find('img').attr('src','static/picture/success.png').removeClass('roll');
                    opcating=true;
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    });

    // 全选 单选控制
    $('#show_tbody input[type="checkbox"]').on("click",function () {
        var checkboxDom = $('#show_tbody input[type="checkbox"]');
        var checkedNum = $('#show_tbody input[type="checkbox"]:checked').length;
        var checkboxNum = checkboxDom.length;
        checkboxNum=checkboxNum-checkedNum;
        if (checkboxNum==0) {
            $('#pid').prop("checked",true);
        } else {
            $('#pid').prop("checked",false);
        }
    });
    $('#pid').click(function () {
        if ($('#pid').prop("checked")==true) {
            $('#show_tbody input[type="checkbox"]').prop("checked",true);
        } else {
            $('#show_tbody input[type="checkbox"]').prop("checked",false);
        }
    });
    // 多单元控制
    $('.all_change input').bind('input propertychange',function () {
        var checkedDom = $('#show_tbody input[type="checkbox"]:checked');
        var attrName = $(this).attr("name");
        var attrVal = $(this).val();
        var thisChange = $('[data-name="'+attrName+'"]');
        for (var i = 0; i < checkedDom.length; i++) {
            checkedDom.eq(i).parents('tr').find( thisChange ).text(attrVal);
            checkedDom.eq(i).parents('tr').find('.info-boll').addClass('acting').removeClass('no-act').find('img').attr('src','static/picture/acting.png');
            if (!/^[A-H][0-9]{3}$/.test(attrVal)) {
                checkedDom.eq(i).parents('tr').find( thisChange ).parent(".change").addClass("dot");
            } else {
                checkedDom.eq(i).parents('tr').find( thisChange ).parent(".change").removeClass("dot");
            };
        };
    });
    // 一键保存
    $(".updata-all-btn").on("click",function () {
        var checkedDom = $('#show_tbody input[type="checkbox"]:checked');
        var checkedData = {};
        for (var j = 0; j < checkedDom.length; j++) {
            var dataList = checkedDom.eq(j).parents('tr').find('.text');
            var RowData = {};
            for (var i = 0; i < dataList.length; i++) {
                RowData[dataList.eq(i).attr('data-name')] = dataList.eq(i).text();
            };
            checkedData[j] = RowData;
        };
        $.ajax({
            method: 'post',
            url: 'controller/save_data.php',
            data: checkedData,
            dataType: 'Json',
            beforeSend: function () {
                
            },
            success: function (data) {
                if (data.result) {
                    for (var j = 0; j < checkedDom.length; j++) {
                        checkedDom.eq(j).parents('tr').find('.info-boll').addClass('acted').removeClass('acting');  
                    };
                }
            },
            complete: function () {
                for (var j = 0; j < checkedDom.length; j++) {
                    checkedDom.eq(j).parents('tr').find('img').attr('src','static/picture/success.png').removeClass('roll');
                };
            }
        });
    })
})