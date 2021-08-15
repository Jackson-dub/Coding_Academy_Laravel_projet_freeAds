<div>
	@isset($label)
		<label for="{{ $name }}">{{ $label }}</label>
	@endisset($label)
	<div class="custom-select">
		<select name="{{ $name }}">
			@foreach ($options as $option)
				<option value="{{ $option->id }}" >{{ $option->name }}</option>
			@endforeach
		</select>
	</div>
</div>
