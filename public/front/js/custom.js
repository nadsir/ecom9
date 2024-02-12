
$(document).ready(function (){

    //change string to currency
    (function ($) {
        $.fn.simpleMoneyFormat = function() {
            this.each(function(index, el) {
                var elType = null; // input or other
                var value = null;
                // get value
                if($(el).is('input') || $(el).is('textarea')){
                    value = $(el).val().replace(/,/g, '');
                    elType = 'input';
                } else {
                    value = $(el).text().replace(/,/g, '');
                    elType = 'other';
                }
                // if value changes
                $(el).on('paste keyup', function(){
                    value = $(el).val().replace(/,/g, '');
                    formatElement(el, elType, value); // format element
                });
                formatElement(el, elType, value); // format element
            });
            function formatElement(el, elType, value){
                var result = '';
                var valueArray = value.split('');
                var resultArray = [];
                var counter = 0;
                var temp = '';
                for (var i = valueArray.length - 1; i >= 0; i--) {
                    temp += valueArray[i];
                    counter++
                    if(counter == 3){
                        resultArray.push(temp);
                        counter = 0;
                        temp = '';
                    }
                };
                if(counter > 0){
                    resultArray.push(temp);
                }
                for (var i = resultArray.length - 1; i >= 0; i--) {
                    var resTemp = resultArray[i].split('');
                    for (var j = resTemp.length - 1; j >= 0; j--) {
                        result += resTemp[j];
                    };
                    if(i > 0){
                        result += ','
                    }
                };
                if(elType == 'input'){
                    $(el).val(result);
                } else {
                    $(el).empty().text(result);
                }
            }
        };
    }(jQuery));
    $('.money').simpleMoneyFormat();
    // end change string to currency
   $("#getPrice").change(function (){
      var size=$(this).val();
      var product_id=$(this).attr("product-id");
      $.ajax({
          url:'/get-product-price',
          data:{size:size,product_id:product_id},
          type:'post',
          success:function (resp){
              if (resp['discount']>0){
        $(".getAttributePrice").html("<div class='price'><h4> "+resp['final_price']+" تومان </h4></div><div class='original-price'><span>Original Price:</span><span> "+resp['product_price']+" تومان </span></div>");

              }else{
                  $(".getAttributePrice").html("<div class='price'><h4> "+resp['final_price']+" تومان </h4></div>");
              }
          },error:function (){
              alert(error)
          }
      })



   });
   //Update Cart Items Qty
    $(document).on('click','.updateCartItem',function (){
        if ($(this).hasClass('plus-a')){
            //Get Qty
            var quantity=$(this).data('qty');
            // increase the qty by 1
            new_qty=parseInt(quantity)+1;

        }
        if ($(this).hasClass('minus-a')){
            //Get Qty
            var quantity=$(this).data('qty');
            //check Qty is atleast 1
            if (quantity<=1){
                Swal.fire({
                    confirmButtonColor: "#fdb414",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "تلاش مجدد",
                    text: 'تعداد محصول باید یک یا بیشتر باشد',
                },);
                return false;
            }
            // increase the qty by 1
            new_qty=parseInt(quantity)-1;
        }
        var cartid=$(this).data('cartid');
        $.ajax({
            data:{cartid:cartid,qty:new_qty},
            url:'/cart/update',
            type:'post',
            success:function (resp){
                $(".totalCartItems").html(resp.totalCartItems);
                if (resp.status==false){
                    Swal.fire({
                        confirmButtonColor: "#fdb414",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "تلاش مجدد",
                        text: resp.message,
                    },);

                }
                $("#appendCartItems").html(resp.view);
                $("#appendHeaderCartItems").html(resp.headerview);
            },error:function (){
                alert("Error");
            }
        });

    });
    //Delete Cart Items
    $(document).on('click','.deleteCartItem',function (){
        var cartid=$(this).data('cartid');
        Swal.fire({
            title: "از حذف محصول مورد نظر اطمینان دارید",
            text: "محصول از سبد خرید شما حذف خواهد شد",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#fdb414",
            cancelButtonColor: "#5b5a5a",
            confirmButtonText: "بله اطمینان دارم",
            cancelButtonText:"خیر"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    data:{cartid:cartid},
                    url:'/cart/delete',
                    type:'post',
                    success:function (resp){
                        $(".totalCartItems").html(resp.totalCartItems);
                        $("#appendCartItems").html(resp.view);
                        $("#appendHeaderCartItems").html(resp.headerview);
                    },error:function (){
                        alert("Error")
                    }
                })
                Swal.fire({
                    confirmButtonColor: "#fdb414",
                    title: "! حذف شد",
                    text: "محصول موردنظر با موفقیت حذف شد.",
                    confirmButtonText: "بله",
                    icon: "success"
                });
            }
        });




    });
    //Show Loader at the time of order placement
    $(document).on('click','#placeOrder',function (){
       $(".loader").show();
    });
    //Register Form Validation
    $("#registerForm").submit(function (){
        $(".loader").show();
       var formdata=$(this).serialize();
       $.ajax({
           url:"/user/register",
           type:"POST",
           data:formdata,
           success:function (resp){
               if (resp.type=="error"){
                   $(".loader").hide();
                   $.each(resp.errors,function (i,error){
                       $("#register-"+i).attr('style','color:red');
                       $("#register-"+i).html(error);

                   setTimeout(function (){
                       $("#register-"+i).css({'display':'none'});
                   },3000);
                   });

               }else if (resp.type=="success"){

                   $(".loader").hide();
                   $("#register-success" ).attr('style', 'color:green');
                   $("#register-success" ).html(resp.message);


               }


           },error:function (){
               alert("Error");
           }

       })
    });
    //Account Form Validation
    $("#accountForm").submit(function (){
        $(".loader").show();
        var formdata=$(this).serialize();
        $.ajax({
            url:"/user/account",
            type:"POST",
            data:formdata,
            success:function (resp){
                if (resp.type=="error"){
                    $(".loader").hide();
                    $.each(resp.errors,function (i,error){
                        $("#account-"+i).attr('style','color:red');
                        $("#account-"+i).html(error);

                        setTimeout(function (){
                            $("#account-"+i).css({'display':'none'});
                        },3000);
                        Swal.fire({
                            icon: "error",
                            title: error,
                        });
                    });

                }else if (resp.type=="success"){

                    $(".loader").hide();
                    $("#account-success" ).attr('style', 'color:green');
                    $("#account-success" ).html(resp.message);
                    setTimeout(function (){$("#account-success").css({'display':'none'});},3000);
                    Swal.fire({
                        icon: "success",
                        title: "بروزرسانی با موفقیت انجام شد",
                    });

                }


            },error:function (){
                alert("Error");
            }

        })
    });
    //Password Form Validation
    $("#passwordForm").submit(function (){
        $(".loader").show();
        var formdata=$(this).serialize();
        $.ajax({
            url:"/user/update-password",
            type:"POST",
            data:formdata,
            success:function (resp){
                if (resp.type=="error"){
                    $(".loader").hide();
                    $.each(resp.errors,function (i,error){
                        $("#password-"+i).attr('style','color:red');
                        $("#password-"+i).html(error);

                        setTimeout(function (){
                            $("#password-"+i).css({'display':'none'});
                        },3000);
                        Swal.fire({
                            icon: "error",
                            title: error,
                        });
                    });

                }else if (resp.type=="incorrect"){
                    $(".loader").hide();

                        $("#password-error").attr('style','color:red');
                        $("#password-error").html(resp.message);

                        setTimeout(function (){
                            $("#password-error").css({'display':'none'});
                        },3000);
                        Swal.fire({
                            icon: "error",
                            title: resp.message,
                        });


                }else if (resp.type=="success"){

                    $(".loader").hide();
                    $("#password-success" ).attr('style', 'color:green');
                    $("#password-success" ).html(resp.message);
                    setTimeout(function (){$("#password-success").css({'display':'none'});},3000);
                    Swal.fire({
                        icon: "success",
                        title: "بروزرسانی با موفقیت انجام شد",
                    });

                }


            },error:function (){
                alert("Error");
            }

        })
    });
    //login Form Validation
    $("#loginForm").submit(function (){
        var formdata=$(this).serialize();
        $(".loader").show();
        $.ajax({
            url:"/user/login",
            type:"POST",
            data:formdata,
            success:function (resp) {
                if (resp.type == "error") {
                    $(".loader").hide();
                    $.each(resp.errors, function (i, error) {
                        $("#login-" + i).attr('style', 'color:red');
                        $("#login-" + i).html(error);
                        setTimeout(function () {
                            $("#login-" + i).css({'display': 'none'});
                        }, 3000);
                    });
                }  else if (resp.type == "incorrect") {
                    $(".loader").hide();
                    $("#login-error" ).attr('style', 'color:red');
                    $("#login-error" ).html(resp.message);
                }else if (resp.type == "inactive") {
                    $(".loader").hide();
                    $("#login-error" ).attr('style', 'color:red');
                    $("#login-error" ).html(resp.message);
                }else if (resp.type == "success") {
                    $(".loader").hide();
                    window.location.href = resp.url;
                }


            },error:function (){
                alert("Error");
            }

        })
    });
    //Forgot Form Validation
    $("#forgotForm").submit(function (){
        $(".loader").show();
        var formdata=$(this).serialize();
        $.ajax({
            url:"/user/forgot-password",
            type:"POST",
            data:formdata,
            success:function (resp){
                if (resp.type=="error"){
                    $(".loader").hide();
                    $.each(resp.errors,function (i,error){
                        $("#forgot-"+i).attr('style','color:red');
                        $("#forgot-"+i).html(error);

                        setTimeout(function (){
                            $("#forgot-"+i).css({'display':'none'});
                        },3000);
                    });

                }else if (resp.type=="success"){

                    $(".loader").hide();
                    $("#forgot-success" ).attr('style', 'color:green');
                    $("#forgot-success" ).html(resp.message);


                }


            },error:function (){
                alert("Error");
            }

        })
    });
    //Apply Coupon
    $("#ApplyCoupon").submit(function (){
        var user=$(this).attr("user");
        if (user==1){

        }else {
            Swal.fire({
                confirmButtonColor: "#fdb414",
                cancelButtonColor: "#d33",
                confirmButtonText: "تلاش مجدد",
                    text: "برای استفاده از کد تخفیف لطفا لاگین کنید !",

                },);

            return false;
        }
        var code=$("#code").val();
        $.ajax({
            type:'post',
            data:{code:code},
            url:'/apply-coupon',
            success:function (resp){
                if (resp.message!=""){
                    Swal.fire({
                        confirmButtonColor: "#fdb414",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "بله",
                        text: resp.message,

                    },);

                }

                $(".totalCartItems").html(resp.totalCartItems);
                $("#appendCartItems").html(resp.view);
                $("#appendHeaderCartItems").html(resp.headerview);
                if(resp.couponAmount>0){
                    $(".couponAmount").text(resp.couponAmount);
                    $('.couponAmount').addClass("money");

                }else {
                    $(".couponAmount").text("0 تومان");

                }
                if(resp.grand_total>0){
                    $(".grand_total").text(resp.grand_total);


                }
            },error:function (){
                alert('Error')
            }
        })

    });
    //Edit Delivery Address
    $(document).on('click','.editAddress',function (){
       var addressid=$(this).data("addressid");
       $.ajax({
           data:{addressid:addressid},
           url:"/get-delivery-address",
           type:'post',
           success:function (resp){
               $("#showdifferent").removeClass('collapse');
               $(".newAddress").hide();
               $(".deliveryText").text("بروزرسانی آدرس دریافت محصول");
               $('[name=delivery_id]').val(resp.address['id']);
               $('[name=delivery_name]').val(resp.address['name']);
               $('[name=delivery_address]').val(resp.address['address']);
               $('[name=delivery_city]').val(resp.address['city']);
               $('[name=delivery_state]').val(resp.address['state']);
               $('[name=delivery_country]').val(resp.address['country']);
               $('[name=delivery_pincode]').val(resp.address['pincode']);
               $('[name=delivery_mobile]').val(resp.address['mobile']);



           },error:function (){
               alert("Error");
           }
       });

    });
    //Save Delivery Address
    $(document).on('submit',"#addressAddEditForm",function (){
        var formdata=$("#addressAddEditForm").serialize();
        $.ajax({
           url:'/save-delivery-address',
            type:'post',
            data:formdata,
            success:function (resp){
                if (resp.type=="error"){
                    $(".loader").hide();
                    $.each(resp.errors,function (i,error){
                        $("#delivery_"+i).attr('style','color:red').attr('style','position:absolute').attr('style','margin-top:-69px');
                        $("#delivery_"+i).html(error);

                        setTimeout(function (){
                            $("#delivery_"+i).css({'display':'none'});
                        },3000);

                    });

                }else{
                    $("#deliveryAddresses").html(resp.view);
                    window.location.href="checkout";
                }


            },error:function (){
               alert("Error");
            }
        });

    });
    //Remove Delivery Address
    $(document).on('click','.removeAddress',function (){
        Swal.fire({

            text: "آدرس شما حذف خواهد شد",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#fdb414",
            cancelButtonColor: "#5b5a5a",
            confirmButtonText: "بله اطمینان دارم",
            cancelButtonText:"خیر"
        }).then((result) => {
            if (result.isConfirmed) {
                var addressid=$(this).data("addressid");
                $.ajax({
                    data:{addressid:addressid},
                    url:"/remove-delivery-address",
                    type:'post',
                    success:function (resp){

                        $("#deliveryAddresses").html(resp.view)
                        window.location.href="checkout";


                    },error:function (){
                        alert("Error");
                    }
                });
                Swal.fire({
                    confirmButtonColor: "#fdb414",
                    title: "! حذف شد",
                    text: "آدرس مورد نظر حذف شد.",
                    confirmButtonText: "بله",
                    icon: "success"
                });
            }
        });

    });
    //Calculate Grand Total
    $("input[name=address_id]").bind('change',function (){
        var shipping_charges=$(this).attr("shipping_charges");
        console.log(shipping_charges);
        var total_price=$(this).attr("total_price");
        var coupon_amount=$(this).attr("coupon_amount");
        $(".shipping_charges").html(shipping_charges+"تومان")
        if (coupon_amount==""){
            coupon_amount=0;
        }
        $(".couponAmount").html(coupon_amount+"تومان")
        var grand_total=parseInt(total_price)+parseInt(shipping_charges)-parseInt(coupon_amount);

        $(".grand_total").html(grand_total+"تومان")



    });

});

function get_filter(class_name){
    var filter=[];
    $('.'+class_name+':checked').each(function (){
        filter.push($(this).val());
    });
    return filter;

}

function addSubscriber(){
    var subscriber_email=$("#subscriber_email").val();
    var mailFormat=/\S+@\S+\.\S+/;
    if (subscriber_email.match(mailFormat)){
        $.ajax({
            type:'post',
            url:'add-subscriber-email',
            data:{subscriber_email:subscriber_email },
            success:function (resp){
                if (resp=="exists"){
                    Swal.fire({
                        icon: "alert",
                        title: "You email is already exists",
                    });
                }else if (resp=="saved"){
                    Swal.fire({
                        icon: "success",
                        title: "thanks for adding your email",
                    });
                }
            },error:function (){
                alert("Error");
            }
        })
    }else{
        alert('please enter valid email');
    }


}
