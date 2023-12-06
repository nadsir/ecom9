<?php

use App\Models\ProductsFilter;

$productFilters = ProductsFilter::productFilters();
?>
<script>
    $(document).ready(function () {
        //Sort by Filter
        $("#sort").on("change", function () {
            var size = get_filter('size');
            var color = get_filter('color');
            var price = get_filter('price');
            var brand = get_filter('brand');
            /*this.form.submit();*/
            var sort = $("#sort").val();
            var url = $("#url").val();
            @foreach($productFilters as $filters)
            var {{$filters['filter_column']}} = get_filter('{{$filters['filter_column']}}');
            @endforeach
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                method: 'post',
                data: {
                    @foreach($productFilters as $filters)
                        {{$filters['filter_column']}}: {{$filters['filter_column']}},
                    @endforeach
                    url: url, sort: sort,size:size,color:color,price:price,brand:brand
                },
                success: function (data) {
                    $('.filter_products').html(data);
                }, error: function () {
                    alert("Error")
                }
            })
        });
//Size filter
        $(".size").on("change", function () {
            /*this.form.submit();*/
            var size = get_filter('size');
            var color = get_filter('color');
            var price = get_filter('price');
            var brand = get_filter('brand');
            var sort = $("#sort").val();
            var url = $("#url").val();
            @foreach($productFilters as $filters)
            var {{$filters['filter_column']}} = get_filter('{{$filters['filter_column']}}');
            @endforeach
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                method: 'post',
                data: {
                    @foreach($productFilters as $filters)
                        {{$filters['filter_column']}}: {{$filters['filter_column']}},
                    @endforeach
                    url: url, sort: sort, size: size, color:color,price:price,brand:brand
                },
                success: function (data) {
                    $('.filter_products').html(data);
                }, error: function () {
                    alert("Error")
                }
            })
        });

        //color filter
        $(".color").on("change", function () {
            /*this.form.submit();*/
            var size = get_filter('size');
            var color = get_filter('color');
            var price = get_filter('price');
            var brand = get_filter('brand');
            var sort = $("#sort").val();
            var url = $("#url").val();
            @foreach($productFilters as $filters)
            var {{$filters['filter_column']}} = get_filter('{{$filters['filter_column']}}');
            @endforeach
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                method: 'post',
                data: {
                    @foreach($productFilters as $filters)
                        {{$filters['filter_column']}}: {{$filters['filter_column']}},
                    @endforeach
                    url: url, sort: sort, size: size,color:color,price:price,brand:brand
                },
                success: function (data) {
                    $('.filter_products').html(data);
                }, error: function () {
                    alert("Error")
                }
            })
        });

        //price filter
        $(".price").on("change", function () {
            /*this.form.submit();*/
            var size = get_filter('size');
            var color = get_filter('color');
            var price = get_filter('price');
            var brand = get_filter('brand');
            var sort = $("#sort").val();
            var url = $("#url").val();
            @foreach($productFilters as $filters)
            var {{$filters['filter_column']}} = get_filter('{{$filters['filter_column']}}');
            @endforeach
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                method: 'post',
                data: {
                    @foreach($productFilters as $filters)
                        {{$filters['filter_column']}}: {{$filters['filter_column']}},
                    @endforeach
                    url: url, sort: sort, size: size,color:color,price:price,brand:brand
                },
                success: function (data) {
                    $('.filter_products').html(data);
                }, error: function () {
                    alert("Error")
                }
            })
        });

        //brand filter
        $(".brand").on("change", function () {
            /*this.form.submit();*/
            var size = get_filter('size');
            var color = get_filter('color');
            var price = get_filter('price');
            var brand = get_filter('brand');
            var sort = $("#sort").val();
            var url = $("#url").val();
            @foreach($productFilters as $filters)
            var {{$filters['filter_column']}} = get_filter('{{$filters['filter_column']}}');
            @endforeach
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                method: 'post',
                data: {
                    @foreach($productFilters as $filters)
                        {{$filters['filter_column']}}: {{$filters['filter_column']}},
                    @endforeach
                    url: url, sort: sort, size: size,color:color,price:price,brand:brand
                },
                success: function (data) {
                    $('.filter_products').html(data);
                }, error: function () {
                    alert("Error")
                }
            })
        });


//Dynamic filters
        @foreach($productFilters as $filter)
        $(".{{$filter['filter_column']}}").on('click', function () {

            var url = $("#url").val();
            var size = get_filter('size');
            var color = get_filter('color');
            var price = get_filter('price');
            var brand = get_filter('brand');
            var sort = $("#sort option:selected").text();
            @foreach($productFilters as $filters)
            var {{$filters['filter_column']}} = get_filter('{{$filters['filter_column']}}');
            @endforeach
            console.log(url);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                method: "Post",
                data: {
                    @foreach($productFilters as $filters)
                        {{$filters['filter_column']}}: {{$filters['filter_column']}},
                    @endforeach
                    url: url, sort: sort,size:size,color:color,price:price,brand:brand
                },
                success: function (data) {
                    $('.filter_products').html(data);
                }, error: function () {
                    alert("Error")
                }
            });
        });
        @endforeach
    });

</script>
