<h1>Newsapp</h1>
<p>Newsapp is a simple CRUD application written in PHP to handle a news article site.</p>
<p>The application features a pretty url router and RESTful API for management of articles, it also have a basic interface where the client can either read the articles or login as admin to administrate articles</p>
<p>When administrating articles the application uses a simple javascript interface to communicate with the API through ajax calls. The application response with json.</p>
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

<h3>Setup</h3>
<p>To setup the application you need to have PHP and MySQL running. The application needs to be hosted as a root domain or subdomain for the routing system to work. When you have this setup you can use the newsapp.sql file to create the database needed.</p>
<p>use /app/start.php to setup your DB information and base path (PATH_BASE constant) so that the application knows where it runs.</p>

<h3>User credentials</h3>
<p>The application have a basic user system that uses a simple hash instead of clear text passwords for security. The sql file is seeded with 3 user accounts, where 2 are of interest:</p>
<p>user@test.com:test1234 - User with no admin rights</p>
<p>admin@test.com:test1234 - User with admin rights</p>

<p>To gain control of administrative views you need to be logged in as admin@test.com</p>
<p>You need the email and key values to interact with the API as well, when you do this you just set:</p>
<p>user_email: email</p>
<p>user_key: key</p>

<h3>Live test</h3>
<p>You can access a live test version of the application if you go to the following url: <a href="http://newsapp.fagertveit.com/">http://newsapp.fagertveit.com</a></p>
<p>API routes can be accessed at http://newsapp.fagertveit.com/api/</p>