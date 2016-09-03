<ul>
  <li><a href="{{ action('UsersController@edit', [$id = Auth::user()->id]] }}">Manage Account</a></li>
  <li><a href="{{ action('CompaniesController@edit', [$id = Auth::user()->id]) }}">Manage Company</a></li>
  <li><a href="{{ action('ContactsController@edit', [$id = Auth::user()->id]) }}">Manage Contact</a></li>
</ul>
