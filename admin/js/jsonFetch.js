"use strict";

fetch("js/authors.json")
	.then(function(auth_resp){
		return auth_resp.json();
	})
	.then(function(auth_data){
		console.log(auth_data);
	});

fetch("js/posts.json")
	.then(function(post_resp){
		return post_resp.json();
	})
	.then(function(post_data){
		console.log(post_data);
	});

fetch("js/likes.json")
	.then(function(like_resp){
		return like_resp.json();
	})
	.then(function(like_data){
		console.log(like_data);
	});

fetch("js/comments.json")
	.then(function(comm_resp){
		return comm_resp.json();
	})
	.then(function(comm_data){
		console.log(comm_data);
	});