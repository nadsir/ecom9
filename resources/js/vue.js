import { createApp } from 'vue/dist/vue.esm-bundler';
import { ref } from 'vue'


createApp({
    components:{

    },
    data() {
        return {
            name: 'Vue.js',
            data:''
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
        getdata(event){
            this.data=event;
        }
    }
}).mount('#app');

