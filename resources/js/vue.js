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
        changeStatus(item){
           this.info=document.getElementById(item).className;
           if (this.info=='fa fa-toggle-on'){
               var element = document.getElementById(item);
               element.classList.remove("fa-toggle-on");
               document.getElementById(item).classList.add('fa-toggle-off');
           } else if (this.info=='fa fa-toggle-off'){
               var element = document.getElementById(item);
               element.classList.remove("fa-toggle-off");
               document.getElementById(item).classList.add('fa-toggle-on');
           }
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

