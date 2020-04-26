@extends('layouts.app')

@section('title','みんなのツミアゲ' )

@section('css')
<link rel="stylesheet" href="{{ asset('/css/index.css') }}">
@endsection


@section('content')
<div class="container mb-auto">


  <div class="text-center">
    <h1>ＨＴＭＬのツミアゲ</h1> 
  </div>
  <div class="text-right">
  <div class="dropdown mb-4">
    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    --言語で絞り込み-- 
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="{{ route('html')}}" selected>HTML</a>
      <a class="dropdown-item" href="{{ route('css')}}">CSS</a>
      <a class="dropdown-item" href="#">Javascript</a>
    </div>
  </div>
  </div>  
    
 

  <div class="container-fluid">
    <div class="row">
        @forelse ( $arrHtml as $html )

        <div class="col-sm-12 col-md-6 col-lg-4 padding">
          <div class="card post">

            @if($html->image)
            <a href="{{ route('show',$html) }}">
              <img src="{{ asset('/storage/image/'.$html->image) }}" alt="" class=" card-img-top" width="100%" height="180">
            </a>
            
            @else

            <a href="{{ route('show',$html) }}">
              <img src="{{ asset('/img/noimage.png') }}" alt="" class=" card-img-top" width="100%" height="180">
            </a>
            @endif

            <div class="card-body">
              <p class="card-text">{{ $html->title }}</p>
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

  <div class="d-flex justify-content-center mt-5">
    {{ $arrHtml->links() }}
  </div>
</div>
@endsection