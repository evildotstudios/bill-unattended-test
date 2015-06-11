<h2>Calls</h2>
<table class="table callList">
	<tr>
		<th>Number</th>
		<th>Duration</th>
		<th>Cost</th>
	</tr>
	@if(count($data->callCharges->calls)<1)
		<tr>
			<td colspan="4"><em>No calls registered for the period</em></td>
		</tr>
	@else
		@foreach($data->callCharges->calls as $title => $calls)
		<div @if($title != 'page_1') class="hide" @endif>
			@foreach($calls as $call)
			<tr>
				<td>{{$call->called}}</td>
				<td>{{$call->duration}}</td>
				<td>{{money_format('%i',$call->cost)}}</td>
			</tr>
			@endforeach
		</div>
		@endforeach
	@endif
</table>
<nav>
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    @foreach($data->callCharges->calls as $title => $call)
		    <li><a href="#">{{$title}}</a></li>
	@endforeach
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>