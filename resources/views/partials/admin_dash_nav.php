<ul class="edit_account_nav">
	<li><a class="{{ $home }}" href="{{ action('UsersController@getAdminDashboard') }}" alt="Analytics">Analytics</a></li>
	<li><a class="{{ $edit_login }}" href="{{ action('UsersController@edit', ['id' => Auth::user()->id]) }}" alt="Edit Admin Login">Edit My Login</a></li>
	<li><a class="{{ $edit_contact }}" href="{{ action('ContactsController@edit', ['id' => Auth::user()->id]) }}" alt="Edit Org Contact">Edit Org. Contact</a></li>
	<li><a class="{{ $articles }}" href="{{ action('ArticlesController@adminIndex') }}" alt="Manage Articles">Articles</a></li>
	<li><a class="{{ $carousels }}" href="{{ action('CarouselsController@adminIndex') }}" alt="Manage Carousels">Carousels</a></li>
	<li><a class="{{ $events }}" href="{{ action('EventsController@adminIndex') }}" alt="Manage Events">Events</a></li>
	<li><a class="{{ $rfps }}" href="{{ action('RFPController@adminIndex') }}" alt="Manage RFPs">RFPs</a></li>
	<li><a class="{{ $users }}" href="{{ action('UsersController@adminIndex') }}" alt="Manage Users">Users</a></li>
</ul>