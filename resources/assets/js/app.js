import './bootstrap'
import Router from './router'
import TopBarComponent from './components/TopBarComponent'



const app = new Vue({
    el: '#app',
    components: {
    	'top-bar' : TopBarComponent
    }
});
