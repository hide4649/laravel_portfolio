@extends('layouts.app')

@section('title','記事編集' )

@section('css')
<link rel="stylesheet" href="{{ asset('/css/editpost.css') }}">
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('/js/postImgpreview.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/postImgDelete.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/editPostImgDelete.js') }}"></script>
@endsection


@section('content')
<div class="container mb-auto">
  <div class="row">
    <div class="col text-left">
      <h1>編集</h1>
    </div>
    <div class="col text-right">
    <a href="{{ route('show',$post) }}">
      <button type="button" class="btn btn-outline-light border-dark text-dark mt-1">戻る</button>
     </a>
    </div>
  </div>


  <div class="text-left mt-2">
    <p>画像は１～6枚まで  :</p>
  </div>

  <form method="POST" action="{{ route('postUpdate', $post->id) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('patch') }}
    
    <p>■画像ファイルを選択してください。<br>
      <div class="contaniner">
        <div class="row">
          <div class="form-group col-sm-12  col-md-8 col-lg-9">
          
            <div class="col-sm-6 col-md-6 col-lg-6 border">
  
              <label class="col-12 text-center pointer d-none">
                <input name="image" type="file" class="input_file" id="image_1" onchange="preview_file(this.id);" value="{{ old('image', $post->image) }}">
                <img class="my-5" src="{{ asset('/img/camera.png') }}" alt="">
              </label>
    
              <div class="text-center">
                <img class="preview"  src="{{ asset('/storage/image/'.$post->image) }}">
                <button type="button" class="btn btn-primary" id="del" onclick="oldDelete(this.id);">削除</button>
              </div>
  
            </div>
          </div>
        </div>
        
        
        @if($errors->has('image'))
          <div class="my-4">
            <span class="alert alert-danger" role="alert">{{ $errors->first('image') }}</span>
          </div>
        @endif
        
      </div>
 
  
    <div class="form-group">
      <label class="mt-3" for="exampleInputEmail1">タイトル(255文字以内)   :</label>
      <div class="form-row">
        <div class="form-group col-sm-12  col-md-8 col-lg-9">
          
          <input name='title' type="text" class="form-control" aria-describedby="emailHelp" placeholder="タイトルを入力してください" value="{{ old('title',$post->title) }}">

          <div class="d-flex flex-column">

              @if($errors->has('title'))
              <div class="my-4 ">
                <span class="alert alert-danger" role="alert">{{ $errors->first('title') }}</span>
              </div>
            @endif
          </div>
        </div>

        <div class="form-group col-sm-12 col-md-4 col-lg-3">
            <select id="select1a" class="form-control" name="category_id" value="{{  old('category_id',$post->category_id) }}">
              <option class="center" selected>--言語選択--</option>
              <option value="1" @if(old('category_id',$post->category_id)=='1') selected @endif>HTML</option>
              <option value="2" @if(old('category_id',$post->category_id)=='2') selected @endif>CSS</option>
              <option value="3" @if(old('category_id',$post->category_id)=='3') selected @endif>Javascript</option>
            </select>
            @if($errors->has('category_id'))
            <div class="my-4">
              <span class="alert alert-danger" role="alert">{{ $errors->first('category_id', $post->category_id) }}</span>
            </div>
            @endif
          </div>
         
      </div>    
    </div>
    
    <div class="form-group">
      <label for="validationTextarea">本文:</label>
      
      <textarea name="body" class="form-control textarea" id="form-control" placeholder="本文を入力してください">{{ old('body' ,$post->body) }}</textarea>

      
    </div>
    @if($errors->has('body'))
    <div class="my-4">
       <span class="alert alert-danger" role="alert">{{ $errors->first('body') }}</span>
    </div>
    @endif

    <input type="hidden" name="user_id" value="{{ Auth::id() }}">

    <button type="submit" class="btn btn-primary">編集完了</button>
  </form>
</div>


@endsection