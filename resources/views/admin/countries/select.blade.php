<option value="">@lang('countries.select_city')</option>
@foreach($cities as $city)
    <option value="{{ $city->id }}">{{ $city->name }}</option>
@endforeach
