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
	store,
	mounted() {
		let scope = this;
		if(scope.$store.getters.getCollections.length == 0){
			axios.get('/api/get/collections/')
			.then(function(res){
				scope.$store.dispatch('saveCollections', res.data)
				console.log("Got collections");
				console.log(res.data);
			})
			.catch(function(err){
				swal("An error ocurred", "Could not fetch collections", "error")
			})
		}

	}
});
