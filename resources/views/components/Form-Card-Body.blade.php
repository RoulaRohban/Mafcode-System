<div class="card-body pt-2">

    {{ $slot }}

</div>
<div class="card-footer">
    <button onclick="submitForm('#main-form')" id="submit-button"
            class="btn btn-primary">@lang('admin.save')</button>
    <button type="reset" onclick="" class="btn btn-secondary">@lang('admin.close')</button>
</div>
