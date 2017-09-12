import VueRouter from 'vue-router';
import HomeComponent from './components/HomeComponent';
import CreateCollectionComponent from './components/CreateCollectionComponent';
import ViewCollectionsComponent from './components/views/ViewCollectionsComponent';

Vue.use(VueRouter);

const routes = [
	{ path: '/', component: HomeComponent },
	{ path: '/collections', component: ViewCollectionsComponent },
	{ path: '/collections/create', component: CreateCollectionComponent },
	{ path: '/collections/view/:id', component: CreateCollectionComponent },
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
