<ul class="edit_account_nav">
	<li><a class="{{ $home }}" href="{{ action('AdminController@index') }}" alt="Analytics">Analytics</a></li>
	<li><a class="{{ $login }}" href="{{ action('AdminController@editOrgLogin', ['id' => Auth::user()->id]) }}" alt="Edit Admin Login">Edit My Login</a></li>
	<li><a class="{{ $contact }}" href="{{ action('AdminController@editOrgContact', ['id' => Auth::user()->id]) }}" alt="Edit Org Contact">Edit Org. Contact</a></li>
	<li><a class="{{ $articles }}" href="{{ action('ArticlesController@adminIndex') }}" alt="Manage Articles">Articles</a></li>
	<li><a class="{{ $carousels }}" href="{{ action('CarouselsController@adminIndex') }}" alt="Manage Carousels">Carousels</a></li>
	<li><a class="{{ $events }}" href="{{ action('AdminController@eventIndex') }}" alt="Manage Events">Events</a></li>
	<li><a class="{{ $rfps }}" href="{{ action('AdminController@rfpIndex') }}" alt="Manage RFPs">RFPs</a></li>
	<li><a class="{{ $users }}" href="{{ action('AdminController@manageUsers') }}" alt="Manage Users">Users</a></li>
</ul>