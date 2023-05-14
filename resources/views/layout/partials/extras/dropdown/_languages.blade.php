{{-- Nav --}}
<ul class="navi navi-hover py-4">
    {{-- Item --}}
    <form action="{{ route('admin.settings.changeLanguage') }}" method="POST" id="language-form">
        @csrf
        <input type="hidden" name="lang" id="lang">
        <li class="navi-item">
            <a href="#" class="navi-link">
            <span class="symbol symbol-20 mr-3">
                <img src="{{ asset('media/svg/flags/226-united-states.svg') }}" alt=""/>
            </span>
                <span class="navi-text" onclick="changeLanguage('en')">@lang('languages.en')</span>
            </a>
        </li>

        {{-- Item --}}
        <li class="navi-item active">
            <a href="#" class="navi-link">
            <span class="symbol symbol-20 mr-3">
                <img src="{{ asset('media/svg/flags/008-saudi-arabia.svg') }}" alt=""/>
            </span>
                <span class="navi-text" onclick="changeLanguage('ar')" >@lang('languages.ar')</span>
            </a>
        </li>
    </form>


</ul>
