<!DOCTYPE html>
<html lang="en" dir="{{env('SITE_RTL') == 'on'?'rtl':''}}">
    @php
        $userstore = \App\Models\UserStore::where('store_id', $store->id)->first();
        $settings   =\DB::table('settings')->where('name','company_favicon')->where('created_by', $userstore->user_id)->first();
    @endphp
    @include('layouts.shophead')
    @php
        if(!empty(session()->get('lang')))
        {
            $currantLang = session()->get('lang');
        }else{
            $currantLang = $store->lang;
        }
        $languages= Utility::languages();
    @endphp
<body class="loaded">
    @include('layouts.shopheader') 
    <div class="wrapper">
        @yield('content')
    </div>  

    @if($demoStoreThemeSetting['enable_footer_note'] == 'on' || $demoStoreThemeSetting['enable_footer'] == 'on')
        <footer class="site-footer">
            <div class="container {{($demoStoreThemeSetting['enable_footer_note'] != 'on')?'pt-1':'' }}">
                <div class="footer-row">
                    @if($demoStoreThemeSetting['enable_footer_note'] == 'on')
                        <div class="footer-logo footer-col">
                            <a href="{{route('store.slug',$store->slug)}}">
                                {{-- <img src="assets/images/logo.png" alt=""> --}}
                                @if(!empty($demoStoreThemeSetting['footer_logo']))
                                    <img src="{{asset('assets/img/lmsgo-logo.svg')}}" alt="lmsgo-logo">
                                @else
                                    <img src="{{asset(Storage::url('uploads/store_logo/'.$demoStoreThemeSetting['footer_logo']))}}" alt="Footer logo">
                                @endif
                            </a>
                        </div>
                        <div class="footer-col footer-link footer-link-1">
                            <div class="footer-widget">
                                <ul>
                                    @if($page_slug_urls->count()>0)
                                        <li>
                                            @foreach($page_slug_urls as $k=>$page_slug_url)
                                                @if($page_slug_url->enable_page_footer == 'on')
                                                    <a href="{{env('APP_URL') . '/page/' . $page_slug_url->slug}}">{{ucfirst($page_slug_url->name)}}</a>
                                                @endif
                                            @endforeach
                                        </li>
                                    @endif
                                    @if($store->blog_enable == 'on' && $blog->count()>0)
                                        <li>
                                            <a href="{{route('store.blog',$store->slug)}}">{{__('Blog')}}</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @endif
                    @if($demoStoreThemeSetting['enable_footer'] == 'on')
                        <div class="footer-col footer-link footer-link-2 {{($demoStoreThemeSetting['enable_footer_note'] == 'on')?'delimiter-top mt-2':'' }}">
                            <div class="footer-widget">
                                <ul class="share-links">
                                    @if(isset($demoStoreThemeSetting['email']))
                                        <li>
                                            <a href="mailto:{{$demoStoreThemeSetting['email']}}" target="_blank">
                                                {{-- <img src="{{ asset('assets/imgs/Email.svg') }}" alt=""> --}}
                                                {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" viewBox="0 0 30 30"
                                                    width="30px" height="30px">
                                                    <path d="m0 0h8v6h-8zm.75 .75v4.5h6.5v-4.5zM0 0l4 3 4-3v1l-4 3-4-3z"/>
                                                    </svg> --}}

                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                    <path d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z"/>
                                                </svg>
                                            </a>
                                        </li>
                                    @endif
                                    @if(isset($demoStoreThemeSetting['facebook']))                                    
                                        <li>
                                            <a href="{{$demoStoreThemeSetting['facebook']}}" target="_blank">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" viewBox="0 0 30 30"
                                                    width="30px" height="30px">
                                                    <path
                                                        d="M12,27V15H8v-4h4V8.852C12,4.785,13.981,3,17.361,3c1.619,0,2.475,0.12,2.88,0.175V7h-2.305C16.501,7,16,7.757,16,9.291V11 h4.205l-0.571,4H16v12H12z" />
                                                    </svg>
                                            </a>
                                        </li>
                                    @endif
                                    @if(isset($demoStoreThemeSetting['whatsapp']))
                                        <li>
                                            <a href="https://wa.me/{{$demoStoreThemeSetting['whatsapp']}}" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="10"
                                                    viewBox="0 0 11 10" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.213 0.572998C4.25741 0.572998 3.07645 0.863855 2.12129 1.52701C1.14637 2.20388 0.413086 3.26767 0.413086 4.75497C0.413086 5.66158 0.741096 6.34886 1.07262 6.80921C1.21571 7.0079 1.35955 7.16463 1.47851 7.27985L0.994642 9.07154C0.941156 9.26959 1.01711 9.47835 1.18913 9.60609C1.36116 9.73383 1.59777 9.75718 1.79502 9.66588L3.8328 8.72268C4.98711 9.08069 6.56858 8.95863 7.88401 8.39913C9.32616 7.78575 10.5776 6.58561 10.5776 4.75497C10.5776 3.13648 9.80643 2.05718 8.71186 1.4072C7.65196 0.777791 6.33135 0.572998 5.213 0.572998ZM2.65501 7.23412C2.70978 7.0313 2.62874 6.81791 2.44925 6.69142L2.44725 6.68995C2.44376 6.68736 2.43655 6.68193 2.42614 6.67368C2.40531 6.65715 2.3719 6.62945 2.33001 6.59067C2.24595 6.51286 2.12964 6.39217 2.01233 6.22928C1.77916 5.9055 1.54248 5.41661 1.54248 4.75497C1.54248 3.62854 2.07976 2.86272 2.79893 2.36341C3.53785 1.85038 4.47451 1.61849 5.213 1.61849C6.21199 1.61849 7.29134 1.80576 8.10206 2.28719C8.87812 2.74804 9.44822 3.49836 9.44822 4.75497C9.44822 6.06081 8.58206 6.95167 7.41249 7.44912C6.21558 7.9582 4.8323 7.99315 4.02371 7.67235C3.87103 7.61178 3.69729 7.6165 3.54872 7.68527L2.38809 8.22248L2.65501 7.23412ZM5.28342 3.82403C5.05873 3.65764 4.73482 3.67424 4.53135 3.86259L3.40196 4.90809C3.18143 5.11223 3.18143 5.44322 3.40196 5.64736C3.62249 5.85151 3.98004 5.85151 4.20056 5.64736L4.97256 4.93271L5.98963 5.68592C6.21432 5.85232 6.53823 5.83571 6.74169 5.64736L7.87109 4.60187C8.09161 4.39772 8.09161 4.06674 7.87109 3.86259C7.65056 3.65845 7.29301 3.65845 7.07249 3.86259L6.30048 4.57724L5.28342 3.82403Z"
                                                        fill="white"></path>
                                                </svg></a>
                                        </li>
                                    @endif
                                    @if(isset($demoStoreThemeSetting['instagram']))                                    
                                        <li>
                                            <a href="{{$demoStoreThemeSetting['instagram']}}" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="13"
                                                    viewBox="0 0 11 13" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M0.31543 4.32341C0.31543 2.47088 1.68067 0.969116 3.36479 0.969116H7.4306C9.11471 0.969116 10.48 2.47088 10.48 4.32341V8.7958C10.48 10.6483 9.11471 12.1501 7.4306 12.1501H3.36479C1.68067 12.1501 0.31543 10.6483 0.31543 8.7958V4.32341ZM3.36479 2.08721C2.24205 2.08721 1.33188 3.08839 1.33188 4.32341V8.7958C1.33188 10.0308 2.24205 11.032 3.36479 11.032H7.4306C8.55334 11.032 9.4635 10.0308 9.4635 8.7958V4.32341C9.4635 3.08839 8.55334 2.08721 7.4306 2.08721H3.36479ZM4.38124 6.55961C4.38124 7.17711 4.83632 7.6777 5.39769 7.6777C5.95906 7.6777 6.41415 7.17711 6.41415 6.55961C6.41415 5.9421 5.95906 5.44151 5.39769 5.44151C4.83632 5.44151 4.38124 5.9421 4.38124 6.55961ZM5.39769 4.32341C4.27495 4.32341 3.36479 5.32459 3.36479 6.55961C3.36479 7.79462 4.27495 8.7958 5.39769 8.7958C6.52044 8.7958 7.4306 7.79462 7.4306 6.55961C7.4306 5.32459 6.52044 4.32341 5.39769 4.32341ZM7.68471 3.20531C7.26368 3.20531 6.92237 3.58075 6.92237 4.04389C6.92237 4.50702 7.26368 4.88246 7.68471 4.88246C8.10574 4.88246 8.44705 4.50702 8.44705 4.04389C8.44705 3.58075 8.10574 3.20531 7.68471 3.20531Z"
                                                        fill="white"></path>
                                                </svg></a>
                                        </li>
                                    @endif
                                    @if(isset($demoStoreThemeSetting['twitter']))
                                        <li>
                                            <a href="{{$demoStoreThemeSetting['twitter']}}" target="_blank"><svg width="9" height="8" viewBox="0 0 9 8">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M4.43044 2.01763C4.20198 2.38004 4.12486 2.80517 4.12486 3.00696C4.12486 3.13991 4.05847 3.2642 3.94764 3.33873C3.83681 3.41326 3.69598 3.42833 3.57171 3.37896C3.49044 3.34667 3.39989 3.31384 3.30198 3.27834C3.04833 3.18637 2.74529 3.0765 2.42621 2.91169C2.10216 2.74431 1.74904 2.51698 1.34908 2.17945C1.35404 2.33012 1.38755 2.46812 1.44386 2.59602C1.5753 2.89457 1.85401 3.18975 2.31554 3.46466C2.44181 3.53987 2.51679 3.67745 2.51116 3.8236C2.50553 3.96974 2.42018 4.10122 2.28849 4.16663L2.28805 4.16685L2.28757 4.16708L2.28649 4.16761L2.28388 4.16889L2.27684 4.17226C2.27135 4.17486 2.26425 4.17815 2.25561 4.18202C2.23832 4.18978 2.21479 4.1999 2.18543 4.21157C2.12676 4.23488 2.0444 4.2645 1.94161 4.29367C1.83351 4.32435 1.70189 4.3548 1.55078 4.37673C1.63701 4.68088 1.82918 4.87072 2.03627 5.01412C2.15804 5.09845 2.27585 5.16051 2.39425 5.22289C2.4237 5.23841 2.45319 5.25394 2.48279 5.26985C2.54745 5.30459 2.63246 5.35155 2.70276 5.40742C2.75702 5.45053 2.91481 5.58438 2.91481 5.81155C2.91481 5.9568 2.84849 6.06999 2.80651 6.13049C2.7574 6.20126 2.69541 6.26513 2.63051 6.32098C2.49957 6.43363 2.32381 6.54189 2.11542 6.63057C1.87548 6.73268 1.58255 6.81297 1.2477 6.84189C1.27513 6.85651 1.30429 6.87047 1.33522 6.88378C1.6288 7.01014 2.05815 7.06186 2.57539 7.01516C3.60087 6.92257 4.81744 6.45773 5.65361 5.72899C6.29461 4.99357 6.56609 4.26592 6.67908 3.72664C6.73623 3.45384 6.7529 3.22867 6.75565 3.07497C6.75702 2.99819 6.75491 2.93951 6.75271 2.90197C6.75161 2.88322 6.75048 2.86977 6.74976 2.86203L6.74903 2.85475C6.73716 2.75686 6.76202 2.65782 6.81894 2.57699L6.74914 2.85564L6.74923 2.85633L6.81894 2.57699L7.5609 2.91673C7.55476 2.92604 7.56646 2.90839 7.5609 2.91673C7.5609 2.91673 7.56341 3.02243 7.56222 3.0892C7.5587 3.28607 7.53762 3.56172 7.46886 3.8899C7.331 4.5479 7.00173 5.4149 6.24413 6.2756C6.23297 6.28827 6.22103 6.30023 6.20836 6.31141C5.22888 7.17573 3.83384 7.70615 2.64841 7.81318C2.0563 7.86664 1.47721 7.8182 1.01448 7.61903C0.535329 7.4128 0.165766 7.033 0.0939387 6.46223C0.0781412 6.33669 0.122962 6.21112 0.214839 6.12351C0.306716 6.03589 0.434855 5.99653 0.560485 6.01733C1.08522 6.1042 1.51159 6.01578 1.79775 5.894C1.82628 5.88186 1.87832 5.85712 1.87832 5.85712C1.87832 5.85712 1.67888 5.74345 1.57492 5.67146C1.1493 5.37672 0.696379 4.87855 0.696379 4.0086C0.696379 3.78732 0.876965 3.60794 1.09973 3.60794C1.12906 3.60794 1.15782 3.60739 1.18599 3.60635C0.980502 3.39979 0.816425 3.17076 0.704743 2.91708C0.478326 2.40281 0.49016 1.83928 0.725227 1.25554C0.775582 1.13049 0.885814 1.03894 1.01863 1.01186C1.15144 0.984784 1.28907 1.0258 1.38494 1.12103C1.96468 1.69689 2.41932 2.00496 2.79838 2.20075C3.01615 2.31324 3.20289 2.38736 3.38967 2.45617C3.45442 2.18313 3.56756 1.87656 3.74671 1.59236C4.07763 1.06742 4.64862 0.603027 5.53659 0.603027C6.08741 0.603027 6.44184 0.87266 6.66502 1.05746C6.69191 1.07973 6.71524 1.0992 6.73573 1.11632C6.78733 1.1594 6.82097 1.18749 6.84839 1.20736C7.03175 1.12103 7.19731 1.06054 7.34453 1.03268C7.50103 1.00305 7.72657 0.993969 7.91227 1.14166C8.10767 1.29706 8.13029 1.52058 8.12359 1.65298C8.11656 1.79153 8.07503 1.93028 8.03137 2.04589C7.94217 2.28205 7.80026 2.53308 7.68962 2.71408C7.64115 2.79337 7.59639 2.8629 7.5609 2.91673C7.56797 3.00419 7.56013 2.90847 7.5609 2.91673L6.81894 2.57699L6.8194 2.57634L6.82172 2.57302L6.83176 2.55849C6.84073 2.54543 6.85404 2.52588 6.87061 2.50101C6.90384 2.45113 6.94977 2.38048 7.00007 2.2982C7.07155 2.18126 7.14615 2.05 7.20595 1.92583C7.18168 1.93712 7.15597 1.94948 7.12875 1.963C7.12329 1.96571 7.11776 1.96831 7.11218 1.97077C6.86539 2.07975 6.64304 2.01587 6.48694 1.92807C6.37916 1.86744 6.26913 1.77458 6.1897 1.70755C6.17482 1.69499 6.16101 1.68333 6.14849 1.67296C5.95962 1.51658 5.79247 1.40434 5.53659 1.40434C4.98329 1.40434 4.64674 1.67448 4.43044 2.01763Z">
                                                    </path>
                                                </svg></a>
                                        </li>
                                    @endif
                                    @if(isset($demoStoreThemeSetting['youtube']))                                    
                                        <li>
                                            <a href="{{$demoStoreThemeSetting['youtube']}}" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    viewBox="0 0 11 11" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M2.59131 2.23909C3.27183 2.11998 4.32047 2.00996 5.87035 2.00996C7.42023 2.00996 8.46887 2.11998 9.14939 2.23909C9.60942 2.3196 9.93616 2.77372 9.93616 3.42342V7.45757C9.93616 8.10727 9.60942 8.56138 9.14939 8.6419C8.46887 8.761 7.42023 8.87102 5.87035 8.87102C4.32047 8.87102 3.27183 8.761 2.59131 8.6419C2.13128 8.56138 1.80454 8.10727 1.80454 7.45757V3.42342C1.80454 2.77372 2.13128 2.3196 2.59131 2.23909ZM5.87035 0.866455C4.27902 0.866455 3.17701 0.979313 2.43505 1.10917C1.37337 1.29498 0.788086 2.34061 0.788086 3.42342V7.45757C0.788086 8.54038 1.37337 9.586 2.43505 9.77182C3.17701 9.90167 4.27902 10.0145 5.87035 10.0145C7.46168 10.0145 8.56369 9.90167 9.30564 9.77182C10.3673 9.586 10.9526 8.54038 10.9526 7.45757V3.42342C10.9526 2.34061 10.3673 1.29498 9.30564 1.10917C8.56369 0.979313 7.46168 0.866455 5.87035 0.866455ZM5.12231 3.79288C5.28757 3.69339 5.48808 3.70429 5.64404 3.82126L7.16872 4.96477C7.3101 5.07081 7.39503 5.24933 7.39503 5.44049C7.39503 5.63166 7.3101 5.81018 7.16872 5.91622L5.64404 7.05973C5.48808 7.1767 5.28757 7.1876 5.12231 7.0881C4.95706 6.98861 4.8539 6.79486 4.8539 6.584V4.29698C4.8539 4.08612 4.95706 3.89238 5.12231 3.79288Z"
                                                        fill="white"></path>
                                                </svg></a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="footer-bottom">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            {{-- <p>© 2022 My Store. All rights reserved</p> --}}
                            {{-- <p>{{$demoStoreThemeSetting['footer_note']}}</p> --}}
                            {{-- <p>{{  $footer->footer_note }}</p> --}}
                            {{$store->footer_note}}
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    @endif
  
    <!-- Model Popup Start -->
    <div class="modal fade edit-profile" id="commonModalBlur" role="dialog" >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header align-items-center">
                    <h3 class="modal-title profile-heading" id="modelCommanModelLabel"></h3>
                    <button type="button" class="close" data-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                        <path d="M27.7618 25.0008L49.4275 3.33503C50.1903 2.57224 50.1903 1.33552 49.4275 0.572826C48.6647 -0.189868 47.428 -0.189965 46.6653 0.572826L24.9995 22.2386L3.33381 0.572826C2.57102 -0.189965 1.3343 -0.189965 0.571605 0.572826C-0.191089 1.33562 -0.191186 2.57233 0.571605 3.33503L22.2373 25.0007L0.571605 46.6665C-0.191186 47.4293 -0.191186 48.666 0.571605 49.4287C0.952952 49.81 1.45285 50.0007 1.95275 50.0007C2.45266 50.0007 2.95246 49.81 3.3339 49.4287L24.9995 27.763L46.6652 49.4287C47.0465 49.81 47.5464 50.0007 48.0463 50.0007C48.5462 50.0007 49.046 49.81 49.4275 49.4287C50.1903 48.6659 50.1903 47.4292 49.4275 46.6665L27.7618 25.0008Z" fill="white">
                        </path>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
    <!-- Model Popup End -->

    {!! $demoStoreThemeSetting['storejs'] !!}
    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <script> app_url = "{{asset('assets/img/')}}" </script>

    <script src="{{ asset('libs/frontjs/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('libs/frontjs/bootstrap/bootstrap.min.js')}}"></script>  
   
    <script src="{{asset('js/slick.min.js')}}" defer="defer"></script>
    <script src="{{ asset('libs/bootstrap-notify/bootstrap-notify.min.js')}}"></script> 
    <script src="{{asset('js/lmscustom.js')}}"></script>

    
    <!-- WISHLIST -->
    <script>
        $(document).on('click', '.add_to_wishlist', function (e) {
            // alert('hey');
            e.preventDefault();
            var id = $(this).attr('data-id');
            var id_2 = $(this).attr('data-id-2');
            var _url;
            if (id_2 == null) {
                _url = '{{route('student.addToWishlist',[$store->slug, '__course_id'])}}'.replace('__course_id', id);
            } else {
                _url = '{{route('student.addToWishlist', [$store->slug,'__course_id'])}}'.replace('__course_id', id_2);
            }
            $.ajax({
                type: "POST",
                url: _url,
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                context: this,
                success: function (response) {
                    if (response.status == "Success") {
                        show_toastr('Success', response.success, 'success');
                        if (id_2 == null) {
                            $('.fygyfg_' + id).children().attr('src', '{{asset('assets/img/wishlist.svg')}}');
                        } else {
                            $('.fygyfg_' + id_2).children().attr('src', '{{asset('assets/img/wishlist.svg')}}');
                        }
                        // console.log(response.item_count);
                        $('.wishlist_item_count').html(response.item_count);
                        $(this).toggleClass("wishlist_btn");

                    } else {
                        show_toastr('Error', response.error, 'error');
                    }

                },
                error: function (result) {
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $(document).on('click', '#search_icon', function () {

                //FETCH AND SEARCH
                function fetch_course_data(query = '') {
                    $.ajax({
                        url: "{{ route('store.searchData',[$store->slug,'__query']) }}".replace('__query', query),
                        method: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            $('#search_data_div').html(data.table_data);
                            $('#total_records').text(data.total_data);
                        }
                    })
                }
                $(document).on('keyup', '#search_box', function () {
                    var query = $(this).val();
                    /*console.log(query);
                    return false;*/
                    if (query != '') {
                        fetch_course_data(query);
                    } else {
                        $('#search_data_div').html('');
                    }

                });
            });
        });
    </script>
    @php
        $store_settings = \App\Models\Store::where('slug',$store->slug)->first();
    @endphp
    <script async src="https://www.googletagmanager.com/gtag/js?id={{$store_settings->google_analytic}}"></script>

    {!! $store_settings->storejs !!}

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', '{{ $store_settings->google_analytic }}');
    </script>

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '{{$store_settings->fbpixel_code}}');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=0000&ev=PageView&noscript={{$store_settings->fbpixel_code}}"
    /></noscript>


    @stack('script-page')
    @if($message = Session::get('success'))
        <script>
            show_toastr('Success', '{!! $message !!}', 'success');
        </script>
    @endif
    @if($message = Session::get('error'))
        <script>
            show_toastr('Error', '{!! $message !!}', 'error');
        </script>
    @endif
</body>
</html>
