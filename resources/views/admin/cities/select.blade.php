<option value="">@lang('cities.select_region')</option>
@foreach($regions as $region)
    <option value="{{ $region->id }}">{{ $region->name }}</option>
@endforeach
