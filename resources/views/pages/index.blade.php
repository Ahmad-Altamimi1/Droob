@extends('layouts.master')
@section('content')
    
<body>
    
   


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
                        <h2>   مجموعة دروب الأعلاميه</h2>
                        <ul>
                            <li><a href="index.html"></a></li>
                            {{-- <li><span><i class="fas fa-circle"></i></span>News</li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Area -->
    <section id="news_main_arae" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center">
                        <h2>أعمالنا</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    @foreach ($articles as $article )
                        
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="news_four_card">
                            <div class="news_four_card_img">
                                <a href="{{ route('details', ['id' => $article->id]) }} ">
                            
                                    <img src="{{ asset('images/articles/'. $article->image1) }}" alt="img" style=" max-width: 68%;">
                                </a>
                                
                            </div>
                            <div class="news_four_card_conrent">
                                <div class="new_four_card_lists">
                                    <ul>
                                        <li> <span>{{ $article->articleType->type }}</span> <i class="fas fa-circle"></i></li>
                                        @php
    app()->setLocale('ar');
@endphp

                                        <li>{{ $article->created_at->locale('ar')->format('d F Y') }}<i class="fas fa-circle"></i></li>
                                        {{-- <li>5min read</li> --}}
                                        
                                    </ul>
                                </div>
                                <h3><a href="{{ route('details', ['id' => $article->id]) }}">{{ $article->title }}</a></h3>

                                    <p>{{ Str::limit($article->description, 70, '...') }}</p>
                                <a href="{{ route('details', ['id' => $article->id]) }}">أقرأ المزيد ....</a>
                            </div>
                        </div>
                    </div>
          
                    @endforeach    

                </div>
                
                <div class="col-lg-12">
                    <div class="pagination_area">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

   

@endsection

</body>

</html>