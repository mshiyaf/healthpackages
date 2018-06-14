<option></option>
@if(!empty($tests))
  @foreach($tests as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@endif
