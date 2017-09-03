import Vue from 'vue'
import Vuex from 'vuex'


const store = new Vuex.Store({

	state: {
		ideas: []
	},
	mutations: {
		setIdeas(state, ideas){
			state.ideas = ideas;
		}
	},
	getters: {
		getIdeas(state){
			return state.ideas;
		}
	},
	actions: {
		saveIdeas({commit}, ideas){
			commit('setIdeas', ideas);
		}
	}

});

export default store;