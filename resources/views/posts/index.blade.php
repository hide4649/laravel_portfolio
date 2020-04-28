@extends('layouts.app')

@section('title','みんなのツミアゲ' )

@section('css')
<link rel="stylesheet" href="{{ asset('/css/index.css') }}">
@endsection


@section('content')
<div class="container mb-auto">
  
  <div class="text-center">
    <h1>みんなのツミアゲ</h1> 
    @isset($search_result)
    <h3>{{ $search_result }}</h3> 
    @endisset
  </div>
  

  <div class="text-right">
  <div class="dropdown mb-4">
    <button class="btn btn-light dropdown-toggle mt-3" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    --言語で絞り込み-- 
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="{{ route('html')}}">HTML</a>
      <a class="dropdown-item" href="{{ route('css')}}">CSS</a>
      <a class="dropdown-item" href="{{ route('js')}}">Javascript</a>
    </div>
  </div>
  </div>  
    
 

  <div class="container">
    <div class="row">
      @forelse ( $posts as $post )

          <div class="col-sm-6 col-md-6 col-lg-4 padding">
            <div class="card mb-2">

              @if($post->image)
                <a href="{{ route('show',$post) }}">
                  <img src="{{ asset('/storage/image/'.$post->image) }}" alt="" class=" card-img-top" width="100%" height="180">
                </a>
              
              @else

                <a href="{{ route('show',$post) }}">
                  <img src="{{ asset('/img/noimage.png') }}" alt="" class=" card-img-top" width="100%" height="180">
                </a>

              @endif

              <div class="card-body">
                <p class="card-text">{{ $post->title }}</p>
              </div>
            </div>
          </div> 

      @empty

          <div class="container null">
            <div class="row">
              <div class="col-xl-12 text-center">
                <h1 class="">まだツミアゲはありません</h1>
              </div>
            </div>
          </div>

      @endforelse

    </div>
  </div>
</div>

   {{-- @isset($posts)
       
    <div class="d-flex justify-content-center mt-5">
      {{ $posts->links() }}
    </div>

   @endisset --}}
@endsection