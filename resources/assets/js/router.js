import VueRouter from 'vue-router';
import HomeComponent from './components/HomeComponent';
import CreateIdeaComponent from './components/CreateIdeaComponent';
import ViewIdeasComponent from './components/views/ViewIdeasComponent';

Vue.use(VueRouter);

const routes = [
	{ path: '/', component: HomeComponent },
	{ path: '/ideas', component: ViewIdeasComponent },
	{ path: '/ideas/create', component: CreateIdeaComponent },
	{ path: '/ideas/view/:id', component: CreateIdeaComponent },
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
