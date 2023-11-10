@extends('layouts.master')
@section('content')
    
    <!-- search -->
    <div class="search-overlay">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-close">
                    <span class="search-overlay-close-line"></span>
                    <span class="search-overlay-close-line"></span>
                </div>
                <div class="search-overlay-form">
                    <form>
                        <input type="text" class="input-search" placeholder="Search here...">
                        <button type="button"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Common Banner Area -->
    <section id="common_banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h2>{{ $article->title  }}</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">الصفحه الرئيسيه</a></li>
                            <li><span><i class="fas fa-circle"></i></span>العمل</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Area -->
    <section id="news_details_main_arae" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="news_detail_wrapper">
                        <div class="news_details_content_area">
                            
                            <img src="{{ asset('images/articles/'. $article->image1) }}" alt="img" style="height: 85vh">
                        </div>
                        <div class="row">
                            <div class="col-lg-10 offset-lg-1">
                                <div class="news_details_content_area news_details_content_tops">
                                    <div class="news_details_four_heading">
                                        <div class="new_four_card_lists">
                                            <ul>
                                                <li> <span>{{ $article->articleType->type }}</span> <i class="fas fa-circle"></i></li>
                                                <li>{{ $article->created_at->locale('ar')->format('d F Y') }}<i class="fas fa-circle"></i></li>
                                                <li>{{ $article->User->name }}</li>
                                            </ul>
                                        </div>
                                        <h2>{{ $article->title }}</h2>
                                    </div>
                                   
                                  
                                    <h3>  تصوير وانتاج برنامج مجموعة دروب الأعلاميه</h3>
                                    <ul>
                                 <li>{!! preg_replace('/[.]/u', '.<br> <i class="fas fa-circle"></i>', $article->description) !!}</li>
</ul>


                                   
                                    <div class="row">
                                    <p> يمكنك مشاهدة العرض التروجي للبرنامج من خلال :  </p>

                                        @foreach ($article->Promotion as $Promotion  )
                                            
                                        <div class="col-lg-6">
                                            <div class="news_details_left_img">
                                                <a href="{{ $Promotion->video }}">
                                                {{-- <img src="{{ asset($Promotion->image) }}" alt="img"> --}}
                                                <iframe width="560" height="315" src="{{ $Promotion->video }}" frameborder="0" allowfullscreen></iframe>
                                                </a>

                                            </div>
                                            
                                        </div>
                                        @endforeach
                                      
                                </div>
                                <div class="download_pdf_area">
                                    <div class="downloads_pdf_icon">
                                        <img src="{{ asset('assets/img/icon/pdf.png') }}" alt="icon" style="width: 120px !important"
>
                                        <h3>يمكنك تحميل السيره الذاتيه لصاحب العمل</h3>
                                    </div>
                                 
                                    <div class="downloads_pdf_button">
                                      <a href="{{ route('download-cv', ['id' => $article->id]) }}">
    <button class="btn btn_theme btn_md">Download CV</button>
</a>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cta Area -->
 

 @endsection


</body>

</html>`