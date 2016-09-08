<ul class="edit_account_nav">
  <li><a class="{{ $login }}" href="{{ action('UsersController@edit', ['id' => Auth::user()->id]) }}">Edit Login</a></li>
  <li><a class="{{ $company }}" href="{{ action('CompaniesController@edit', ['id' => Auth::user()->id]) }}">Edit Company</a></li>
  <li><a class="{{ $contact }}" href="{{ action('ContactsController@edit', ['id' => Auth::user()->id]) }}">Edit Contact</a></li>
  <li><a class="{{ $leaders }}" href="{{ action('LeadersController@index') }}">Edit Leaders</a></li>
</ul>
