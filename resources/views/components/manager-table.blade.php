@if(session()->has('message'))
<div class="w-4/5 m-auto mt-10 pl-2">
	<p class="w-1/6 mb-4 text-gray-50 bg-green-500 rounded-2x1 py-4">
		{{ session()->get('message') }}
	</p>
</div>
@endif
	
	<table>
		<tr>
			@foreach ($headers as $col)
				<th>{{ $col ?? '' }}</th>
			@endforeach
			<th colspan="2">Action</th>
		</tr>

		@foreach($rows as $row)
			<tr>
			@foreach($row->getAttributes() as $cell)
				<td>{{ $cell }}</td> 
			@endforeach
				<td>
					<a href="{{ $row->id }}/edit" class="w3-large fa fa-edit"></a>
				</td>
				<td>
					<a href="{{ $row->id }}/delete" class="w3-large fa fa-trash"></a>
				</td>
			</tr>
		@endforeach
	</table>
	<div class="pagination">
		<a href="">1</a>
		<a href="">2</a>
		<a href="">3</a>
		<a href="">Next</a>
	</div>
