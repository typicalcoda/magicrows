import Vue from 'vue'
import Vuex from 'vuex'


const store = new Vuex.Store({

	state: {
		collections: []
	},
	mutations: {
		setCollections(state, collections){
			state.collections = collections;
		},
		setField(state, field){
			var collection = state.collections.find(c=>c.id.toLowerCase() == field.collection_id.toLowerCase());
			let idx = collection.fields.map(f=>f.id.toLowerCase()).indexOf(field.id.toLowerCase());
			collection.fields.splice(idx, 1, field);
		}
	},
	getters: {
		getCollections(state){
			return state.collections;
		}
	},
	actions: {
		saveCollections({commit}, collections){
			commit('setCollections', collections);
		},
		saveField({commit}, field){
			commit('setField', field);
		}
	}

});

export default store;