import './bootstrap'
import store from './store'
import router from './router'
import TopBarComponent from './components/TopBarComponent'
import SidebarComponent from './components/SidebarComponent'

Vue.use( store )

const app = new Vue({
	el: '#app',
	components: {
        'top-bar' : TopBarComponent,
		'side-bar' : SidebarComponent
	},
    router,
    store
});
