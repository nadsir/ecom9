
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
});

function get_filter(class_name){
    var filter=[];
    $('.'+class_name+':checked').each(function (){
        filter.push($(this).val());
    });
    return filter;

}
