import { createApp } from 'vue/dist/vue.esm-bundler';
import { ref } from 'vue'
import axios, {isCancel, AxiosError} from 'axios';

createApp({
    components:{

    },
    data() {
        return {
            name: 'Vue.js',
            showmessage:'',
            current_password:'',
            activeClass:'fa-toggle-on',
            deactiveClass:'fa-toggle-off',
            info:''


        }
    },
    methods: {
        warn(message, event) {
            // now we have access to the native event
            if (event) {
                event.preventDefault()
            }
            alert(message)
        },
        //update admin status
        changeStatus(item){
            var status=document.getElementById(item).getAttribute("status");
            var admin_id=document.getElementById(item).getAttribute("admin-id");
            axios.post('/admin/update-admin-status',{
                status:status,admin_id:admin_id
            }).then(function (response) {
                var data=document.getElementById(item).className;
                if (data=='fa fa-toggle-on'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-on");
                    element.classList.add('fa-toggle-off');
                    element.setAttribute("status", "Deactive");
                } else if (data=='fa fa-toggle-off'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-off");
                    element.classList.add('fa-toggle-on');
                    element.setAttribute("status", "Active");
                }
            })
                .catch(function (error) {
                    alert(error);
                });
        },
        //update section status
        changeSectionStatus(item){
            console.log(item)
            var status=document.getElementById(item).getAttribute("status");
            var section_id=document.getElementById(item).getAttribute("section-id");
            axios.post('/admin/update-section-status',{
                status:status,section_id:section_id
            }).then(function (response) {
                var data=document.getElementById(item).className;
                if (data=='fa fa-toggle-on'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-on");
                    element.classList.add('fa-toggle-off');
                    element.setAttribute("status", "Deactive");
                } else if (data=='fa fa-toggle-off'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-off");
                    element.classList.add('fa-toggle-on');
                    element.setAttribute("status", "Active");
                }
            })
                .catch(function (error) {
                    alert(error);
                });
        },
        //update category status
        changeCategoryStatus(item){
            console.log(item)
            var status=document.getElementById(item).getAttribute("status");
            var category_id=document.getElementById(item).getAttribute("category-id");
            axios.post('/admin/update-category-status',{
                status:status,category_id:category_id
            }).then(function (response) {
                var data=document.getElementById(item).className;
                if (data=='fa fa-toggle-on'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-on");
                    element.classList.add('fa-toggle-off');
                    element.setAttribute("status", "Deactive");
                } else if (data=='fa fa-toggle-off'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-off");
                    element.classList.add('fa-toggle-on');
                    element.setAttribute("status", "Active");
                }
            })
                .catch(function (error) {
                    alert(error);
                });
        },
        //update brand status
        changeBrandStatus(item){
            console.log(item)
            var status=document.getElementById(item).getAttribute("status");
            var brand_id=document.getElementById(item).getAttribute("brand-id");
            axios.post('/admin/update-brand-status',{
                status:status,brand_id:brand_id
            }).then(function (response) {
                var data=document.getElementById(item).className;
                if (data=='fa fa-toggle-on'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-on");
                    element.classList.add('fa-toggle-off');
                    element.setAttribute("status", "Deactive");
                } else if (data=='fa fa-toggle-off'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-off");
                    element.classList.add('fa-toggle-on');
                    element.setAttribute("status", "Active");
                }
            })
                .catch(function (error) {
                    alert(error);
                });
        },
        //update product status changeProductStatus
        changeProductStatus(item){
            console.log(item)
            var status=document.getElementById(item).getAttribute("status");
            var product_id=document.getElementById(item).getAttribute("product-id");
            axios.post('/admin/update-product-status',{
                status:status,product_id:product_id
            }).then(function (response) {
                var data=document.getElementById(item).className;
                if (data=='fa fa-toggle-on'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-on");
                    element.classList.add('fa-toggle-off');
                    element.setAttribute("status", "Deactive");
                } else if (data=='fa fa-toggle-off'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-off");
                    element.classList.add('fa-toggle-on');
                    element.setAttribute("status", "Active");
                }
            })
                .catch(function (error) {
                    alert(error);
                });
        },
        //update Coupon status changeProductStatus
        changecouponStatus(item){
            console.log(item)
            var status=document.getElementById(item).getAttribute("status");
            var coupon_id=document.getElementById(item).getAttribute("coupon-id");
            axios.post('/admin/update-coupon-status',{
                status:status,coupon_id:coupon_id
            }).then(function (response) {
                var data=document.getElementById(item).className;
                if (data=='fa fa-toggle-on'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-on");
                    element.classList.add('fa-toggle-off');
                    element.setAttribute("status", "Deactive");
                } else if (data=='fa fa-toggle-off'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-off");
                    element.classList.add('fa-toggle-on');
                    element.setAttribute("status", "Active");
                }
            })
                .catch(function (error) {
                    alert(error);
                });
        },
        //update attributes status
        changeAttributeStatus(item){

            var status=document.getElementById(item).getAttribute("status");
            var attribute_id=document.getElementById(item).getAttribute("attribute-id");
            axios.post('/admin/update-attribute-status',{
                status:status,attribute_id:attribute_id
            }).then(function (response) {
                var data=document.getElementById(item).className;
                if (data=='fa fa-toggle-on'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-on");
                    element.classList.add('fa-toggle-off');
                    element.setAttribute("status", "Deactive");
                } else if (data=='fa fa-toggle-off'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-off");
                    element.classList.add('fa-toggle-on');
                    element.setAttribute("status", "Active");
                }
            })
                .catch(function (error) {
                    alert(error);
                });
        },
        //update Image status
        changeImageStatus(item){

            var status=document.getElementById(item).getAttribute("status");
            var image_id=document.getElementById(item).getAttribute("image-id");
            axios.post('/admin/update-image-status',{
                status:status,image_id:image_id
            }).then(function (response) {
                var data=document.getElementById(item).className;
                if (data=='fa fa-toggle-on'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-on");
                    element.classList.add('fa-toggle-off');
                    element.setAttribute("status", "Deactive");
                } else if (data=='fa fa-toggle-off'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-off");
                    element.classList.add('fa-toggle-on');
                    element.setAttribute("status", "Active");
                }
            })
                .catch(function (error) {
                    alert(error);
                });
        },
        //update Banner status
        changeBannerStatus(item){

            var status=document.getElementById(item).getAttribute("status");
            var banner_id=document.getElementById(item).getAttribute("banner-id");
            axios.post('/admin/update-banner-status',{
                status:status,banner_id:banner_id
            }).then(function (response) {
                var data=document.getElementById(item).className;
                if (data=='fa fa-toggle-on'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-on");
                    element.classList.add('fa-toggle-off');
                    element.setAttribute("status", "Deactive");
                } else if (data=='fa fa-toggle-off'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-off");
                    element.classList.add('fa-toggle-on');
                    element.setAttribute("status", "Active");
                }
            })
                .catch(function (error) {
                    alert(error);
                });
        },
        //update User status
        changeUserStatus(item){
            var status=document.getElementById(item).getAttribute("status");
            var user_id=document.getElementById(item).getAttribute("user-id");
            axios.post('/admin/update-user-status',{
                status:status,user_id:user_id
            }).then(function (response) {
                var data=document.getElementById(item).className;
                if (data=='fa fa-toggle-on'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-on");
                    element.classList.add('fa-toggle-off');
                    element.setAttribute("status", "Deactive");
                } else if (data=='fa fa-toggle-off'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-off");
                    element.classList.add('fa-toggle-on');
                    element.setAttribute("status", "Active");
                }
            })
                .catch(function (error) {
                    alert(error);
                });
        },
        //Update Filter status
        changeFilterStatus(item){

            var status=document.getElementById(item).getAttribute("status");
            var filter_id=document.getElementById(item).getAttribute("filter-id");
            axios.post('/admin/update-filter-status',{
                status:status,filter_id:filter_id
            }).then(function (response) {
                var data=document.getElementById(item).className;
                if (data=='fa fa-toggle-on'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-on");
                    element.classList.add('fa-toggle-off');
                    element.setAttribute("status", "Deactive");
                } else if (data=='fa fa-toggle-off'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-off");
                    element.classList.add('fa-toggle-on');
                    element.setAttribute("status", "Active");
                }
            })
                .catch(function (error) {
                    alert(error);
                });
        },
        //Update Filter Value Status
        changeFilterValueStatus(item){

            var status=document.getElementById(item).getAttribute("status");

            var filter_id=document.getElementById(item).getAttribute("filter-id");

            axios.post('/admin/update-filter-value-status',{
                status:status,filter_id:filter_id
            }).then(function (response) {
                var data=document.getElementById(item).className;
                if (data=='fa fa-toggle-on'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-on");
                    element.classList.add('fa-toggle-off');
                    element.setAttribute("status", "Deactive");
                } else if (data=='fa fa-toggle-off'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-off");
                    element.classList.add('fa-toggle-on');
                    element.setAttribute("status", "Active");
                }
            })
                .catch(function (error) {
                    alert(error);
                });
        },

        //Update Subscribe Value Status
        changeSubscriberStatus(item){

            var status=document.getElementById(item).getAttribute("status");

            var subscriber_id=document.getElementById(item).getAttribute("subscriber-id");

            axios.post('/admin/update-subscriber-status',{
                status:status,subscriber_id:subscriber_id
            }).then(function (response) {
                var data=document.getElementById(item).className;
                if (data=='fa fa-toggle-on'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-on");
                    element.classList.add('fa-toggle-off');
                    element.setAttribute("status", "Deactive");
                } else if (data=='fa fa-toggle-off'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-off");
                    element.classList.add('fa-toggle-on');
                    element.setAttribute("status", "Active");
                }
            })
                .catch(function (error) {
                    alert(error);
                });
        },
        //Confirm Delete
        /*confirmDelete(item){
            var title=document.getElementById(item).getAttribute("title");
           if (confirm("Are you sure to delete this "+title+"?")){
               return true;

           }else {
                loaded: false;
           }
        }*/
        changeShippingStatus(item){

            var status=document.getElementById(item).getAttribute("status");

            var shipping_id=document.getElementById(item).getAttribute("shipping-id");

            axios.post('/admin/update-shipping-status',{
                status:status,shipping_id:shipping_id
            }).then(function (response) {
                var data=document.getElementById(item).className;
                if (data=='fa fa-toggle-on'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-on");
                    element.classList.add('fa-toggle-off');
                    element.setAttribute("status", "Deactive");
                } else if (data=='fa fa-toggle-off'){
                    var element = document.getElementById(item);
                    element.classList.remove("fa-toggle-off");
                    element.classList.add('fa-toggle-on');
                    element.setAttribute("status", "Active");
                }
            })
                .catch(function (error) {
                    alert(error);
                });
        },

        //Confirm Sweet Alert Delete
        confirmDelete(item){
            var title=document.getElementById(item).getAttribute("title");
            var module=document.getElementById(item).getAttribute("module");
            var moduleid=document.getElementById(item).getAttribute("moduleid");
            Swal.fire({
                title: "از حذف بخش مورد نظر اطمینان دارید ؟",
                text: "بخش حذف شده غیر قابل برگشت می باشد",
                icon: "هشدار",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "بله حذف کن",
                cancelButtonText:"انصراف"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "حذف شد",
                        text: "بخش مورد نظر با موفقیت حذف شد",
                        icon: "موفقیت"
                    });
                    window.location="/admin/delete-"+module+"/"+moduleid;
                }
            });
        },

        selectCategory(item){
            var section_id=document.getElementById(item).value;
            axios.post('/admin/append-categories-level',{
                section_id:section_id
            }).then(function (response) {

                var element = document.getElementById('appendCategoriesLevel');
                element.innerHTML=response.data;

            }).catch(function (error) {
                    alert(error);
                });
        }

    },
    computed:{
        check_current_password(){
            axios.post('/admin/checkpassword', {
                password: this.current_password,
            })  .then(response => {
                if (this.current_password !=''){
                if (response.data==false)
                {
                    this.showmessage="<p style='color: red'>پسورد اشتباه می باشد</p>"
                    console.log(response.data)
                }else{
                    this.showmessage="<p style='color: green'>پسورد صحیح می باشد</p>"
                    console.log(response.data)
                }
                }else {
                    this.showmessage='';
                }
            })
                .catch(error => console.log(error))
        },


    }
}).mount('#app');


$(document).ready(function (){
    //Show/Hide coupon field for Manual/Automatic
    $("#AutomaticCoupon").click(function (){
        $("#couponField").show();
    });
    $("#ManualCoupon").click(function (){
        $("#couponField").hide();
    });
    $('.js-example-basic-multiple').select2();
    //Show Courier Name and Tracking Number in case of Shipped Order status
    $("#courier_name").hide();
    $("#tracking_number").hide();
    $("#order_status").on("change",function (){
       if (this.value=="Shipped"){
           $("#courier_name").show();
           $("#tracking_number").show();
       }else {
           $("#courier_name").hide();
           $("#tracking_number").hide();
       }
    });
    //Show Item Courier Name and Tracking Number in case of Shipped Order Item status



});

