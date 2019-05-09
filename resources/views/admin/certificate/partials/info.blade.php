@if(Session::has('info'))

	<div>
		<button type="button" class="close" data-dismiss="alert">
			&times;
		</button>
		{{ Session::get('info') }}
	</div>

@endif