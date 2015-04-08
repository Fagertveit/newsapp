var NA = {
	// Api base path
	API_PATH : "/api/",

	// Javascript representation of model for ajax communication with API
	Article : function(params) {
		var article = {
			id : 0,
			title : "",
			body : "",
			excerpt : "",
			created_at : "",
			updated_at : "",

			constructor : function(params) {
				for(key in params) {
					if(this[key] != undefined) {
						this[key] = params[key];
					}
				}
			},

			create : function(success, fail) {
				var _this = this;
				var url = NA.API_PATH + "article";
				var user_email = $('#user_email').val();
				var user_key = $('#user_key').val();

				$.ajax({
					url: url,
					type: "POST",
					dataType: "json",
					data: {
						title: this.title,
						body: this.body,
						user_email: user_email,
						user_key: user_key
					}
				}).done(function(data) {
					success(data);
				}).fail(function(data) {
					fail(data);
				});
			},

			update : function(success, fail) {
				var _this = this;
				var url = NA.API_PATH + "article/" + this.id + "/update";
				var user_email = $('#user_email').val();
				var user_key = $('#user_key').val();

				$.ajax({
					url: url,
					type: "POST",
					dataType: "json",
					data: {
						title: this.title,
						body: this.body,
						user_email: user_email,
						user_key: user_key
					}
				}).done(function(data) {
					success(data);
				}).fail(function(data) {
					fail(data);
				});
			},

			delete : function(success, fail) {
				var _this = this;
				var url = NA.API_PATH + "article/" + this.id + "/delete";
				var user_email = $('#user_email').val();
				var user_key = $('#user_key').val();

				$.ajax({
					url: url,
					type: "POST",
					dataType: "json",
					data: {
						user_email: user_email,
						user_key: user_key
					}
				}).done(function(data) {
					success(data);
				}).fail(function(data) {
					fail(data);
				});
			},
		};
		article.constructor(params);

		return article;
	},

	// General manager for application.
	Newsapp : function(params) {
		var newsapp = {
			constructor : function(params) {
				this.addEventListeners();
			},

			addEventListeners : function() {
				$('article.news-article').on('click', function(event) {
					var id = $(event.currentTarget).attr('data-id');

					document.location = "/article/" + id;

					console.log("Clicked on article with id " + id);
				});

				$('.edit-btn').on('click', function(event) {
					var id = $(event.currentTarget).attr('data-id');

					document.location = "/article/" + id + "/edit";
				});

				$('.delete-btn').on('click', function(event) {
					var id = $(event.currentTarget).attr('data-id');

					article = new NA.Article({
						id: id
					});

					article.delete(function(data){
						document.location = "/";
					}, function(data) {
						console.log("Something went wrong");
					});
				})

				$('#publish-article').on('submit', function(event) {
					event.preventDefault();

					var title = $('input[name="title"]').val();
					var body = $('textarea[name="body"]').val();

					article = new NA.Article({
						title: title,
						body: body,
					});

					article.create(function(data){
						document.location = "/article/" + data.id;
					}, function(data) {
						console.log("Something went wrong.");
					});
				});

				$('#update-article').on('submit', function(event){
					event.preventDefault();

					var id = $('input[name="id"]').val();
					var title = $('input[name="title"]').val();
					var body = $('textarea[name="body"]').val();

					article = new NA.Article({
						id: id,
						title: title,
						body: body,
					});

					article.update(function(data){
						document.location = "/article/" + data.id;
					}, function(data){
						console.log("Something went wrong.");
					});
				})
			}
		};
		newsapp.constructor(params);

		return newsapp;
	},
};

// Start the application manager
new NA.Newsapp({});