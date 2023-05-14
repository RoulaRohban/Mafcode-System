<header id="header" class="header fixed-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light pt-0">
            <a class="navbar-brand pt-0" href="#">
                <img width="70" class="navbar-brand" src="{{ asset('front_end/images/logo.jpg') }}" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="our-btn">
			    	<span class="the-bar"></span>
			    	<span class="the-bar"></span>
			    	<span class="the-bar"></span>
            </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mt-lg-n3 px-lg-0 px-3">
                    <li class="nav-item pt-lg-3 ml-1 active">
                        <a class="nav-link" href="{{ route('home') }}" >الرئيسية <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item pt-lg-3 ml-1">
                        <a class="nav-link" href="{{ route('add_advertisement') }}">اضافة اعلان </a>
                    </li>
                    <li class="nav-item pt-lg-3 ml-1">
                        <a class="nav-link" href="{{ route('added_advertisement') }}">الاعلانات</a>
                    </li>
                    <li class="nav-item pt-lg-3 ml-1">
                        <a class="nav-link" href="{{ route('store') }}">المتجر</a>
                    </li>
                    <li class="nav-item pt-lg-3 ml-1">
                        <a class="nav-link" href="{{ route('messages') }}">الرسائل</a>
                    </li>
                    <li class="nav-item pt-lg-3 ml-1">
                        <a class="nav-link" href="#">من نحن</a>
                    </li>
                    <li class="nav-item pt-lg-3 ml-1">
                        <a class="nav-link" href="#">اتصل بنا</a>
                    </li>
                </ul>
            </div>
            <ul class="nav justify-content-end mt-n3">
                <li class="nav-item pt-3">
                    <a class="nav-link hover-scl" href="#">
                        <!-- <i class="fab fa-snapchat-ghost">
                               <span class="snap">.</span>
                       </i> -->
                        <img width="24" src="{{ asset('front_end/images/navigation.png') }}">
                    </a>
                </li>
                <li class="nav-item pt-3 dropdown">
                    <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle mr-2" width="30" src="{{ asset('front_end/images/img_avatar.png') }}" alt="">حسابي
                    </a>
                    <div class="dropdown-menu user pt-5 rounded-lg shadow border-0 bg-transparent pb-0 overflow-hidden" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item hover-scl fs-11p px-2 bg-white" href="{{ route('profile') }}"><img class="pr-2" width="30" src="{{ asset('front_end/images/dashboard.png') }}" alt=""> الملف الشخصي</a>
                        <a class="dropdown-item hover-scl fs-11p px-2 bg-white" href="{{ route('information_change') }}"><img class="pr-2" width="30" src="{{ asset('front_end/images/settings.png') }}" alt=""> الإعدادات</a>
                        <a class="dropdown-item hover-scl fs-11p px-2 bg-white pb-2" href="#"> <img class="pr-2" width="30" src="{{ asset('front_end/images/sign-out.png') }}" alt="">تسجيل خروج </a>
                    </div>
                </li>

                <li class="nav-item pt-3">
                    <a class="nav-link text-black btn-outline-primary border rounded-lg p-1 px-3 mt-2" href="#">الانجليزية</a>
                </li>
            </ul>

        </nav>
    </div>
</header>
