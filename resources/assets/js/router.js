import VueRouter from 'vue-router';
import HomeComponent from './components/HomeComponent';
import IdeasComponent from './components/IdeasComponent';

Vue.use(VueRouter);

const routes = [
	{ path: '/', component: HomeComponent },
	{ path: '/ideas', component: IdeasComponent },
	{ path: '/messages', component: HomeComponent },
	{ path: '/plugins', component: HomeComponent },
	{ path: '/support', component: HomeComponent },
	{ path: '/settings', component: HomeComponent },
];

const router = new VueRouter({
	mode: 'history',
	routes

});

export default router;
