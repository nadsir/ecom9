
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
});

function get_filter(class_name){
    var filter=[];
    $('.'+class_name+':checked').each(function (){
        filter.push($(this).val());
    });
    return filter;

}
