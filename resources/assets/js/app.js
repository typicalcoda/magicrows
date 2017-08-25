import './bootstrap'
import router from './router'
import TopBarComponent from './components/TopBarComponent'
import SidebarComponent from './components/SidebarComponent'



const app = new Vue({
	el: '#app',
	components: {
        'top-bar' : TopBarComponent,
		'side-bar' : SidebarComponent
	},
    router
});
