//Products Attributes Add
    $(document).ready(function(){
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

