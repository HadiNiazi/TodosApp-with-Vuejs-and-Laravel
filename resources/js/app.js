
require('./bootstrap');

import Vue from 'vue'
import App from './vue/App'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faPlusSquare, faTrash, faSpinner, faTasks } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faPlusSquare, faTrash, faSpinner, faTasks)

Vue.component('font-awesome-icon', FontAwesomeIcon)

const app = new Vue({
    el:'#app',
    components:{
        App
    }
});
