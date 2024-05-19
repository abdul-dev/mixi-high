@php $lang  =  substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2); @endphp
<!--begin::Aside-->
<div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
    <!--begin::Aside-->
    <div class="d-flex flex-center flex-lg-start flex-column">
        <!--begin::Logo-->
        <a href="#" class="mb-7">
            <img alt="Logo" class="img-fluid h-100px w-auto" src="{{asset('assets/media/logo.png')}}"/>
        </a>
        <!--end::Logo-->
        <!--begin::Title-->
        <h1 class="text-white m-0" style="font-size: 3.15rem">
            @if ($lang == 'en')
                MedQueen
            @elseif ($lang == 'de')
                MedQueen
            @elseif ($lang == 'it')
                MedQueen
            @endif
        </h1>
        <!--end::Title-->
    </div>
    <!--begin::Aside-->
</div>
<!--begin::Aside-->
