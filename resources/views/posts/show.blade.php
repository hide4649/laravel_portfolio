@extends('layouts.app')

@section('title','記事詳細' )

@section('css')
<link rel="stylesheet" href="{{ asset('/css/show.css') }}">
@endsection

@section('js')
<script  src="{{ asset('/js/deleteConfirm.js') }}"></script>
@endsection


@section('content')
 <!-- {{-- main section --}} -->
 <div class="container mb-auto">
    <div class="row">

      <div class="col-sm-12 col-md-8 mb-5">
        <div class="card">
          <div class="card-header pt-1 pr-1 pl-1">
            <div class="container-fluid">

              <div class="row">

                  <div class="col-10 text-left">
                    <div class="row">
                    <div class="mx-2"><p>{{ $post->user->name }}さん</p></div>
                      <div ><p><i class="far fa-edit"></i>{{ $post->updated_at }}</p></div>
                    </div>
                  </div>

                @if(Auth::id() === $post->user->id)

                  <div class="col-2 text-right">
                    <div class="dropdown">
                      <button class="btn btn-light dropdown-toggle  btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-h"></i>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('editpost',$post) }}">編集する</a>
                        <a class="dropdown-item del" data-id ="{{ $post->id }}">削除する</a>
                      </div>  
                        <form method="post" action="{{ route('delete', $post->id) }}" id="form_{{ $post->id }}">
                          {{ csrf_field() }}
                          {{ method_field('delete') }}
                        </form>
                      
                      
                    </div>
                  </div>
                
                @endif
              
              </div>
              
              <div>
                <h5>{{ $post->title }}</h5>
                <div class="container">
                  <div class="row">
                    <div class="bg-primary text-light tag">
                      <p class="mb-0">{{ $post->category->category_name }}</p> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
  
          <div class="card-body">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">

                  @if($post->image)

                   <img src="{{ asset('storage/image/'.$post->image) }}" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100 postimg"  role="img" >
                  
                   @else

                   <img src="{{ asset('/img/noimage.png') }}" alt="" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" role="img">
                  
                   @endif
                </div>
              </div>
            </div>
            <p class="card-text my-3 mx-2">
              {{ $post->body }}
            </p>
          </div>
        </div>
       
        @if(Auth::id() === $post->user_id || Auth::guest() === true)

        <div class="container my-5">
          <div class="col-12 mb-1 border-bottom border-dark">
            <h5>コメント</h5>
          </div>
          <div class="row ">
            @forelse($comments as $comment)
            <div class="col-1">
              @if($comment->user->image)
              <img class="userimage" src="{{ asset('storage/proflieimage/'.$comment->user->image) }}" alt="">
              @else
              <img class="userimage" src="{{ asset('/img/taro.png') }}" alt="">
              @endif
            </div>
            <div class="col-11 mt-1">
              <div class="row">
                <div>
                  <p>{{$comment->user->name}}さん</p>
                </div>
                <div class="ml-2">
                <p>{{ $comment->user->created_at}}</p>
                </div>
                @if(Auth::id() === $comment->user_id)
                <div class="text-right">
                  <a class="del" data-id="{{ $comment->id }}">[x]</a>
                    <form method="post" action="{{ action('CommentsController@destroy', [$post, $comment]) }}" id="form_{{ $comment->id }}">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                    </form>
                </div>
                @endif
              </div>
            </div>
            <div class="col-12 ml-5">
              <p>{{ $comment->body}}</p>   
            </div>
            @empty
            <div >
            <p>{{ $post->user->name }}さんへのコメントはありません</p>
            </div>
            @endforelse
          </div>   
        </div>
        
        @else

        <div class="card mt-5">
          <div class="container bg-light">
            <div class="card-header bg-light">
              <h5 >コメント記入</h5>
            </div>
            <div class="card-body bg-light">
              <form method="post" action="{{ action('CommentsController@store', $post)}}">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="validationTextarea">コメント(100字以内)  :</label>
                  <textarea name='body' class="form-control textarea pb-3" id="form-control" placeholder="コメントを入力してください" value="{{ old('body') }}"></textarea>
                  <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                </div>

                @if($errors->has('body'))
                  <div class="my-4">
                    <span class="alert alert-danger" role="alert">{{ $errors->first('body') }}</span>
                  </div>
                @endif
                <button type="submit" class="btn btn-primary ml-4">送信</button>
              </form>
            </div>
          </div>
        </div>
        
      
        <div class="container my-5">
          <div class="col-12 mb-1 border-bottom border-dark">
            <h5>コメント</h5>
          </div>
          <div class="row">

              @foreach($comments as $comment)
                <div class="col-1">
                  @if($comment->user->image)
                  <img class="userimage" src="{{ asset('storage/proflieimage/'.$comment->user->image) }}" alt="">
                  @else
                  <img class="userimage" src="{{ asset('/img/taro.png') }}" alt="">
                  @endif
                </div>
                <div class="col-11 mt-1">
                  <div class="row">
                    <div>
                      <p>{{$comment->user->name}}さん</p>
                    </div>
                    <div class="ml-2">
                    <p>{{ $comment->user->created_at}}</p>
                    </div>
                    @if(Auth::id() === $comment->user_id)
                    <div class="ml-1 ">
                      <a class="del" data-id="{{ $comment->id }}"><p>[x]</p></a>
                        <form method="post" action="{{ action('CommentsController@destroy', [$post, $comment]) }}" id="form_{{ $comment->id }}">
                          {{ csrf_field() }}
                          {{ method_field('delete') }}
                        </form>
                    </div>
                    @endif
                  </div>
                </div>
                <div class="col-12 ml-5">
                  <p>{{ $comment->body}}</p>   
                </div>

              @endforeach
          </div>
        </div>

        @endif
      </div>
  
      <div class="col-sm-12 col-md-4">
        <div class="card">
          <div class="card-header text-center">
          <h6>{{ $post->user->name}}さんのその他の投稿</h6>
          </div>
          @foreach($randoms as $random)
          <div class="col-12">
            <div class="card">

              @if($random->image)
              <a href="{{ route('show',$random) }}">
                <img src="{{ asset('/storage/image/'.$random->image) }}" alt="" class="card-img-top" width="10%" height="180">
              </a>
              
              @else

              <a href="{{ route('show',$random) }}">
                <img src="{{ asset('/img/noimage.png') }}" alt="" class=" card-img-top" width="100%" height="180">
              </a>
              @endif

              <div class="card-body">
                <p class="card-text">{{ $random->title }}</p>
              </div>
            </div>
          </div> 
          @endforeach
        </div>
  

        
        <div class="card mt-5">
          <div class="card-header text-center">
            <h6>{{ $post->user->name}}さんの新着投稿</h6>
          </div>
          
          @foreach($orderbys as $orderby)
          <div class="col-12">
            <div class="card">

              @if($orderby->image)
              <a href="{{ route('show',$orderby) }}">
                <img src="{{ asset('/storage/image/'.$orderby->image) }}" alt="" class="card-img-top" width="10%" height="180">
              </a>
              
              @else

              <a href="{{ route('show',$orderby) }}">
                <img src="{{ asset('/img/noimage.png') }}" alt="" class=" card-img-top" width="100%" height="180">
              </a>
              @endif

              <div class="card-body">
                <p class="card-text">{{ $orderby->title }}</p>
              </div>
            </div>
          </div> 
          @endforeach
        </div>
      </div>
    
    </div> 
  </div>
@endsection