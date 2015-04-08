<h1>Newsapp</h1>
<p>Newsapp is a simple CRUD application written in PHP to handle a news article site.</p>
<p>The application features a pretty url router and RESTful API for management of articles, it also have a basic interface where the client can either read the articles or login as admin to administrate articles</p>
<p>When administrating articles the application uses a simple javascript interface to communicate with the API through ajax calls.</p>
<p>The following is valid routes: </p>
<table>
	<tr>
		<td>
			GET
		</td>
		<td>
			/
		</td>
	</tr>
	<tr>
		<td>
			GET
		</td>
		<td>
			/article/:id
		</td>
	</tr>
	<tr>
		<td>
			GET
		</td>
		<td>
			/article/:id/edit
		</td>
	</tr>
	<tr>
		<td>
			GET
		</td>
		<td>
			/
		</td>
	</tr>
</table>

# GET    /
# GET    /article/:id
# GET    /article/:id/edit
# POST   /article/:id/delete
# GET    /article/create
# POST 	 /article
# GET 	 /login
# POST   /login

# POST   /api/article
# GET    /api/article/:id
# GET    /api/articles
# POST   /api/article/:id/update
# POST   /api/article/:id/delete