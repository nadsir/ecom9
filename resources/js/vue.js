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

        //Confirm Delete
        /*confirmDelete(item){
            var title=document.getElementById(item).getAttribute("title");
           if (confirm("Are you sure to delete this "+title+"?")){
               return true;

           }else {
                loaded: false;
           }
        }*/

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

