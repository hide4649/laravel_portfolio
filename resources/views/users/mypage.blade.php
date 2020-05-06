@extends('layouts.app')

@section('title','マイページ' )

@section('css')
<link rel="stylesheet" href="{{ asset('/css/mypage.css') }}">
@endsection

<!-- {{-- main section --}} -->
@section('content')
<div class="container text-center mb-auto">
  <div class="text-right">
    <a href="{{ route('editprofile',$user) }}">
    <button type="button" class="btn btn-outline-light border-dark text-dark">編集</button>
    </a>
  </div>
  
  <div class="profile text-center">
    @if($user->image)
    <img src="{{ asset('/storage/proflieimage/'.$user->image) }}" alt=""  class=" profileimg" >
    @else
    <img src="{{ asset('/img/noimage.png') }}" alt=""  class="rounded-circle" >
    @endif
    <p>{{ $user->name }} さん</p>
  </div>
    
    <div class="card postindex">
      <div class="card-header">
        投稿一覧
      </div>
      <div class="card-body">
        <div class="container-fluid">
          <div class="row">

            @forelse ( $user->posts as $post )
              <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card post">

                  @if($post->image)
                  <a href="{{ route('show',$post) }}">
                    <img src="{{ asset('storage/image/'.$post->image) }}" alt="" class=" card-img-top postimg" >
                  </a>
                  
                  @else
    
                  <a href="{{ route('show',$post) }}">
                    <img src="{{ asset('/img/noimage.png') }}" alt="" class=" card-img-top" width="100%" height="180">
                  </a>
                  @endif

                  <div class="card-body">
                    <p class="card-text">{{ Illuminate\Support\Str::limit($post->title, 20, '(...)') }}</p>
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
    </div>
  </div>


@endsection