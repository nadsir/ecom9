//Products Attributes Add
    $(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div>' +'<br>'+
        '<input type="text" name="size[]" placeholder="سایز" style="width: 120px;" required/>&nbsp;' +
        '&nbsp;<input type="text" name="sku[]" placeholder="کد محصول" style="width: 120px;" required/>&nbsp;'+
        '&nbsp;<input type="text" name="price[]" placeholder="قیمت محصول" style="width: 120px;" required/>&nbsp;'+
        '&nbsp;<input type="text" name="stock[]" placeholder="تعداد محصول" style="width: 120px;" required/>&nbsp;&nbsp;&nbsp;'+
        '<a href="javascript:void(0);" class="remove_button" style="color: red"><i class="fa fa-minus"></i>' +
        '</a>' +
        '</div>'; //New input field html
    var x = 1; //Initial field counter is 1

    // Once add button is clicked
    $(addButton).click(function(){
    //Check maximum number of input fields
    if(x < maxField){
    x++; //Increase field counter
    $(wrapper).append(fieldHTML); //Add field html
}else{
    alert('A maximum of '+maxField+' fields are allowed to be added. ');
}
});

    // Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
    e.preventDefault();
    $(this).parent('div').remove(); //Remove field html
    x--; //Decrease field counter
});
    //Show Filters on selection of category
        $("#category_id").on('change',function (){
           var category_id=$(this).val();
           /*alert(category_id);*/
            $.ajax({

               type:'post',
               url:'category-filters',
                data:{category_id:category_id},
                    success:function (resp){
                       $(".loadFilters").html(resp.view);
                    }

            });
        });

});

