import { createApp } from 'vue/dist/vue.esm-bundler';
import { ref } from 'vue'
import CompomemtA from './components/CompomemtA.vue';


createApp({
    components:{
        CompomemtA
    },
    data() {
        return {
            name: 'Vue.js'
        }
    },
    methods: {
        warn(message, event) {
            // now we have access to the native event
            if (event) {
                event.preventDefault()
            }
            alert(message)
        }
    }
}).mount('#app');

