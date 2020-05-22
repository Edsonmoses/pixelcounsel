


require('./bootstrap');

window.Vue = require('vue');


Vue.component('posts', require('./components/posts.vue'));
let url = window.location.href;
let pageNumber = url.split('=')[1];

const app = new Vue({
    el: '#app',
    data:{
    	blog:{},
    },
    mounted(){
    	axios.post('/getPosts',{
    		'page' : pageNumber
    	})
    	  .then(response => {
    	  	this.blog = response.data.data
    	    // console.log(response);
    	  })
    	  .catch(function (error) {
    	    console.log(error);
    	  });
	}
	
});

Vue.component('vectors', require('./components/vectors.vue'));
let url = window.location.href;
let pageNumber = url.split('=')[1];

const apps = new Vue({
    el: '#vector',
    data:{
    	vector:{},
    },
    mounted(){
    	axios.vector('/getVectors',{
    		'page' : pageNumber
    	})
    	  .then(response => {
    	  	this.vector = response.data.data
			//console.log(response);
			
    	  })
    	  .catch(function (error) {
    	    console.log(error);
    	  });
	}
});

Vue.component('jargons', require('./components/jargons.vue'));
let url = window.location.href;
let pageNumber = url.split('=')[1];

const app = new Vue({
    el: '#jargon',
    data:{
    	jargon:{},
    },
    mounted(){
    	axios.jargon('/getJargons',{
    		'page' : pageNumber
    	})
    	  .then(response => {
    	  	this.jargon = response.data.data
    	    // console.log(response);
    	  })
    	  .catch(function (error) {
    	    console.log(error);
    	  });
	}
	
});

Vue.component('hookups', require('./components/hookups.vue'));
let url = window.location.href;
let pageNumber = url.split('=')[1];

const app = new Vue({
    el: '#hookup',
    data:{
    	hookup:{},
    },
    mounted(){
    	axios.hookup('/getHookups',{
    		'page' : pageNumber
    	})
    	  .then(response => {
    	  	this.hookup = response.data.data
    	    // console.log(response);
    	  })
    	  .catch(function (error) {
    	    console.log(error);
    	  });
	}
	
});
	


