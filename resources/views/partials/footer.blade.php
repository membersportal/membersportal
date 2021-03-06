<footer>
	<div class="footer container">
		<div class="row">
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
				<h4 class="footer">Contact Us</h4>
				<p class="footer_head">{{ $admin->company->name }}</p>
				<p class="footer_text">{{ $admin->contact->address_line_1 }}</p>
				@if ($admin->contact->address_line_2)
					<p class="footer_text">{{ $admin->contact->address_line_2 }}</p>
				@endif
				@if ($admin->contact->address_line_3)
					<p class="footer_text">{{ $admin->contact->address_line_3 }}</p>
				@endif
				<p class="footer_text">{{ $admin->contact->city . ' ' . $admin->contact->state . ' ' . $admin->contact->zip }}</p>
				<p class="footer_text">{{ '(' . substr($admin->contact->phone_no, 0, 3) . ') ' . substr($admin->contact->phone_no, 3, 3) . '-' . substr($admin->contact->phone_no, 6, 4) }}</p>
				<a href="{{ $admin->contact->website }}" alt="Members Portal"><p class="footer_text">{{ substr($admin->contact->website, 12) }}</p></a>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
				<h4 class="footer">Job Opportunities</h4>
				<ul class="footer">
					<li><a class="footer_triangle" href="#">Junior PHP Developer</a></li>
					<li><a class="footer_triangle" href="#">Senior Software Developer</a></li>
					<li><a class="footer_triangle" href="#">Principle Software Engineer</a></li>
					<li><a class="footer_triangle" href="#">UI/UX Designer</a></li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 col-xl-5">
				<h4 class="footer">Design &amp; Development By:</h4>
				<a href="http://randimariedesigns.com" alt="Randi Mays Developer Designer"><img class="logo randi" src="/img/R_Logo2.png" alt="Randi Mays"></a>
				<a href="http://objectant.co" alt="Anthony Martinez"><img class="logo" src="/img/Logo2.png" alt="Anthony Martinez"></a>
				<a href="http://jaynichols.info" alt="Jay Nichols"><img class="logo" src="/img/JNichols_Logo.png" alt="Jay Nichols"></a>
			</div>
		</div>
	</div>
</footer>