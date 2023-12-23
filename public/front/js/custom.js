
$(document).ready(function (){

   $("#getPrice").change(function (){
      var size=$(this).val();
      var product_id=$(this).attr("product-id");
      $.ajax({
          url:'/get-product-price',
          data:{size:size,product_id:product_id},
          type:'post',
          success:function (resp){
              if (resp['discount']>0){
        $(".getAttributePrice").html("<div class='price'><h4> :تومان "+resp['final_price']+"</h4></div><div class='original-price'><span>Original Price:</span><span> :تومان "+resp['product_price']+"</span></div>");

              }else{
                  $(".getAttributePrice").html("<div class='price'><h4>:تومان "+resp['final_price']+"</h4></div>");
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
                alert('تعداد محصول باید یک یا بیشتر باشد');
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
                if (resp.status==false){
                    alert(resp.message);
                }
                $("#appendCartItems").html(resp.view);

            },error:function (){
                alert("Error");
            }
        });

    });
    //Delete Cart Items
    $(document).on('click','.deleteCartItem',function (){
        var cartid=$(this).data('cartid');
        var result=confirm("از حذف محصول اطمینان دارید ؟")
        if (result){
            $.ajax({

                data:{cartid:cartid},
                url:'/cart/delete',
                type:'post',
                success:function (resp){
                    $("#appendCartItems").html(resp.view);

                },error:function (){
                    alert("Error")
                }
            })
        }



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

    //login Form Validation
    $("#loginForm").submit(function (){
        var formdata=$(this).serialize();
        $.ajax({
            url:"/user/login",
            type:"POST",
            data:formdata,
            success:function (resp) {
                if (resp.type == "error") {
                    $.each(resp.errors, function (i, error) {
                        $("#login-" + i).attr('style', 'color:red');
                        $("#login-" + i).html(error);
                        setTimeout(function () {
                            $("#login-" + i).css({'display': 'none'});
                        }, 3000);
                    });
                }  else if (resp.type == "incorrect") {
                    $("#login-error" ).attr('style', 'color:red');
                    $("#login-error" ).html(resp.message);
                }else if (resp.type == "inactive") {
                    $("#login-error" ).attr('style', 'color:red');
                    $("#login-error" ).html(resp.message);
                }else if (resp.type == "success") {
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
});

function get_filter(class_name){
    var filter=[];
    $('.'+class_name+':checked').each(function (){
        filter.push($(this).val());
    });
    return filter;

}
