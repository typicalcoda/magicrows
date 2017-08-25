import lodash from 'lodash'
import Vue from 'vue'
import jQuery from 'jquery'


window._ = lodash
window.Vue = Vue;

window.axios = require('axios/dist/axios.js')

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
	window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
	console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}