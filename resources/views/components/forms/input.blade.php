<div>
	@isset($label)
		<label for="{{ $name }}">{{ $label }}</label>
	@endisset($label)
	<input name="{{ $name }}" type="{{ $type }}" value="{{ $value ?? old($name) }}" {{ $slot }}>
	@error($name)
		<p class="input-error"><i>{{ $message }}</i></p>
	@enderror
</div>
