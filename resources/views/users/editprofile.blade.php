@extends('layouts.app')

@section('title','プロフィール編集' )

@section('css')
<link rel="stylesheet" href="{{ asset('/css/editprofile.css') }}">
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('/js/profileImgpreview.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/profileImgDelete.js') }}"></script>
@endsection


@section('content')
<div class="container mb-auto profile">
  <div class="row">
    <div class="col-8 text-left">
      <h2>プロフィール編集</h2>
    </div>
    <div class="col-4 text-right">
      <a href="{{ route('mypage',$user) }}">
        <button type="button" class="btn btn-outline-light border-dark text-dark">戻る</button>
       </a>
    </div>
  </div>



  <form method="post" action="{{ route('profileUpdate',$user->id) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('patch') }}

  <p>画像;<br>
    <div class="container text-center">
      <div class="row">
        <div class="col-xs-6 col-12">
          <label>
            <input name="image" type="file" accept="image/*" class="input_file" id="input_file" onchange="preview_file(this.id);">

            @if(isset($user->image))
            <img src="{{ asset('/storage/proflieimage/'.$user->image) }}" alt=""  class="rounded-circle profileimg" style="cursor:pointer">

            @else
            <img src="{{ asset('/img/noimage.png') }}" alt=""  
            class="rounded-circle" style="cursor:pointer">
            @endif

          </label>
          <div class="col-12 text-center"></div>
        </div>
       
      </div>
    </div>


  <div class="form-group">
    <label class="mt-3" for="exampleInputname">ニックネーム(10文字以内)   :</label>
    <div class="form-row">
      <div class="form-group col-12">
      <input name="name" value="{{ $user->name }}" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" placeholder="ニックネームを入力してください">
      </div>
    </div> 

    <div class="d-flex flex-column">

      @if($errors->has('name'))
      <div class="my-4 ">
        <span class="alert alert-danger" role="alert">{{ $errors->first('name') }}</span>
      </div>
    @endif
  </div>   
  </div>

  <button type="submit" class="btn btn-primary">保存</button>
</form>
</div>

@endsection