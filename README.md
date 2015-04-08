<h1>Newsapp</h1>
<p>Newsapp is a simple CRUD application written in PHP to handle a news article site.</p>
<p>The application features a pretty url router and RESTful API for management of articles, it also have a basic interface where the client can either read the articles or login as admin to administrate articles</p>
<p>When administrating articles the application uses a simple javascript interface to communicate with the API through ajax calls.</p>
<p>The following is valid routes: </p>
<table>
	<thead>
		<tr>
			<td>
				Method
			</td>
			<td>
				Route
			</td>
			<td>
				Description
			</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				GET
			</td>
			<td>
				/
			</td>
			<td>
				List articles
			</td>
		</tr>
		<tr>
			<td>
				GET
			</td>
			<td>
				/article/:id
			</td>
			<td>
				Shows full article with :id
			</td>
		</tr>
		<tr>
			<td>
				GET
			</td>
			<td>
				/article/:id/edit
			</td>
			<td>
				Shows edit form for article with :id, must be logged in user with admin rights
			</td>
		</tr>
		<tr>
			<td>
				GET
			</td>
			<td>
				/article/create
			</td>
			<td>
				Shows create article form, must be logged in user with admin rights
			</td>
		</tr>
		<tr>
			<td>
				GET
			</td>
			<td>
				/login
			</td>
			<td>
				Shows login form
			</td>
		</tr>
		<tr>
			<td>
				POST
			</td>
			<td>
				/login
			</td>
			<td>
				Authenticate user values.
			</td>
		</tr>
		<tr>
			<td>
				POST
			</td>
			<td>
				/api/article
			</td>
			<td>
				Creates a new article<br>
				Form values: title(string), body(string), user_email(string), user_key(string)
			</td>
		</tr>
		<tr>
			<td>
				GET
			</td>
			<td>
				/api/article/:id
			</td>
			<td>
				Get article with :id
			</td>
		</tr>
		<tr>
			<td>
				GET
			</td>
			<td>
				/api/articles
			</td>
			<td>
				Gets a list of articles with excerpt instead of body
			</td>
		</tr>
		<tr>
			<td>
				POST
			</td>
			<td>
				/api/article/:id/update
			</td>
			<td>
				Updates the article with :id<br>
				Form values: title(string), body(string), user_email(string), user_key(string)
			</td>
		</tr>
		<tr>
			<td>
				POST
			</td>
			<td>
				/api/article/:id/delete
			</td>
			<td>
				Deletes the article with :id
			</td>
		</tr>
	</tbody>
</table>