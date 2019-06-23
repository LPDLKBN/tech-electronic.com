   var shopCart = {
        url: '',
        number: 0,
        pid: 0,
        check:false,
        ajaxAddCart:function(obj) {
            $.ajax({
                type: "POST",
                url: "../../data/cart_buy.php",
                data: {animate:obj.animate,pid:obj.pid,jian:obj.jian,gwc_shuliang:obj.gwc_shuliang,gwc_procode:obj.gwc_procode,gwc_prodes:obj.gwc_prodes},
                dataType: "JSON",
                success: function(data){
                    console.log(data);
                    var str='';
                    for (var i in data[1]) {
                        str+='<li data-pid="'+i+'">\
                                <div class="mini-cart-thumb">\
                                    <a href="'+data[1][i].productUrl+'"><img src="'+data[1][i].img+'" alt="" /></a>\
                                </div>\
                                <div class="mini-cart-heading">\
                                    <span>'+data[1][i].price+' '+data[1][i].unit+' x '+data[1][i].number+'</span>\
                                    <h5><a href="'+data[1][i].productUrl+'">'+data[1][i].gwc_prodes+'</a></h5>\
                                </div>\
                                <div class="mini-cart-remove">\
                                    <button onclick="shopCart.deleteCart(this,'+i+')"><i class="ti-close"></i></button>\
                                </div>\
                            </li>';
                    };
                    $(".top-cart-list").html(str);
                    $(".total").text(data[0].total);
                    $(".item-number").text(data[0].cartlistnum);
                },
                complete:function(){
                    
                },
                error:function(error){
                    console.log(error);
                }
            });
        },
        Cart: function (type, id, number,action="") {
            var offCheck = $("#offprice").prop("checked");
            this.check = offCheck;
            this.url = "../../data/json_ajax_cart.php";
            $.ajax({
                method: 'post',
                url: this.url,
                data: {'id': id, 'number': number, 'action': action, 'check': this.check},
                dataType: 'Json',
                success: function (data) {
                    var totalnum=0;
                    for (var i in data[1]) { 
                        totalnum += Number(data[1][i].number);
                    };
                    getOff(1,totalnum);
                    if (type == 1) {
                        if (data[1].length==0) {
                            var str = '', str2 = '';
                            str2 += '<img src="static/images/kong.png" /><p>Your shopping cart is empty, please add items.</p>';
                            str += '<a style="display:block;width:60px;height:30px;line-height:30px;text-align:center;color:#fff;background:#26acce;" href="/index.html">index </a>';
                            str = str2 + str;
                            $(".cart_wrap").html(str);
                            $(".top-cart-list").html(str2);
                        } else {
                            var str='';
                            for (var i in data[1]) { //头部购物车
                                str+='<li data-pid="'+i+'">\
                                        <div class="mini-cart-thumb">\
                                            <a href="'+data[1][i].productUrl+'"><img src="'+data[1][i].img+'" alt="" /></a>\
                                        </div>\
                                        <div class="mini-cart-heading">\
                                            <span>'+data[1][i].price+' '+data[1][i].unit+' x '+data[1][i].number+'</span>\
                                            <h5><a href="'+data[1][i].productUrl+'">'+data[1][i].gwc_prodes+'</a></h5>\
                                        </div>\
                                        <div class="mini-cart-remove">\
                                            <button onclick="shopCart.deleteCart(this,'+i+')"><i class="ti-close"></i></button>\
                                        </div>\
                                    </li>';
                            };
                            $(".top-cart-list").html(str);
                            $(".amount").text(data[0].total);
                            $(".item-number").text(data[0].cartlistnum);
                            $(".nof_subtotal").text(data[0].subtotal);
                            $(".freight").text(data[0].shipping);
                            $(".total").text(data[0].total);
                        };
                        $(".discount").text(data[0].discount);
                    } else if (type == 2) { //页面购物车
                        $(".nof_subtotal").text(data[0].subtotal);
                        $(".discount").text(data[0].discount);
                        $(".freight").text(data[0].shipping);
                        $(".total").text(data[0].total);
                    } else if (type == 3) { //购物车加减
                        $("[data-pid='"+id+"']").find(".subtotal").text(data[1][id].subtotal);
                        $("[data-pid='"+id+"']").find("[name='gwc_shuliang']").val(data[1][id].number);
                        $(".nof_subtotal").text(data[0].subtotal);
                        $(".discount").text(data[0].discount);
                        $(".freight").text(data[0].shipping);
                        $(".total").text(data[0].total);
                    } else if (type == 4) { //购物车删除
                        console.log(data);
                        if (data[1].length=="") {
                            var str = '', str2 = '';
                            str2 += '<img src="static/images/kong.png" /><p>Your shopping cart is empty, please add items.</p>';
                            str += '<a style="display:block;width:60px;height:30px;line-height:30px;text-align:center;color:#fff;background:#26acce;" href="/index.html">index </a>';
                            str = str2 + str;
                            $(".cart_wrap").html(str);
                            $(".top-cart-list").html(str2);
                            $(".item-number").text(0);
                            $(".total").text(0);
                        };
                        $(".item-number").text(data[0].cartlistnum);
                        $(".nof_subtotal").text(data[0].subtotal);
                        $(".discount").text(data[0].discount);
                        $(".freight").text(data[0].shipping);
                        $(".total").text(data[0].total);
                        $("[data-pid='"+id+"']").remove();
                    };
                }
            });
            return false;
        },
        minusCart: function (_this, id) {
            var num_input = $(_this).next('input[name="gwc_shuliang"]');
            var num = parseInt(num_input.val());
            num--;
            if (num <= 0) {
                return false;
            } else {
                num_input.val(num);
                this.Cart(3, id, num,1);
            };
        },
        plusCart: function(_this, id) {  
            var num_input = $(_this).prev('input[name="gwc_shuliang"]');
            var num = parseInt(num_input.val());
            num = parseInt(num) + 1;
            num_input.val(num);
            this.Cart(3, id, num,1);
        },
        deleteCart: function (_this, id) {
            var num_input = $("[data-pid='"+id+"']").find('input[name="gwc_shuliang"]');
            var num = parseInt(num_input.val());
            this.Cart(4, id, num,0);
        }
    }
    shopCart.Cart(1,"","","");
    