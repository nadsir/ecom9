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
            current_password:''
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
        }
    }
}).mount('#app');

