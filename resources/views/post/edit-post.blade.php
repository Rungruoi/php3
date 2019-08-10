@extends('layouts.main')
@section('content')

<form action="{{ route('post.edit',['id'=>$post->id]) }}" method="post" enctype="multipart/form-data" novalidate>
	@csrf
	<div class="col-md-6">
		<div class="form-group">
		<label for="">Tiêu đề</label>
		<input type="text" name="title" class="form-control" value="{{ $post->title }}" placeholder="">
		@if( $errors->first('title'))
		<span class="text-danger">{{ $errors->first('title')}}</span>
		@endif
		</div>
		<div class="form-group">
		<label for="">Tác giả</label>
				<input type="text" name="auther" class="form-control" value="{{ $post->auther }}">
				@if( $errors->first('auther'))
		<span class="text-danger">{{ $errors->first('auther')}}</span>
		@endif
		
	</div>
	<div class="form-group">
	<label for="">Ngày đăng</label>
	<input type="date" name="publish_date" class="form-control" placeholder="" id="datepicker" value="{{ $post->publish_date }}">
	@if( $errors->first('publish_date'))
		<span class="text-danger">{{ $errors->first('publish_date')}}</span>
		@endif
</div>

<div class="form-group">
	<label for="">Danh mục</label>
	<select name="cate_id" class="form-control">
		<option value="{{ $post->cate_id }}">{{ $post->category->name }}</option>
		@foreach($cates as $item)
		<option  value="{{$item->id}}" >{{$item->name}}</option>
		
		@endforeach
		
	</select>

	
</div>	
@if( $errors->first('cate_id'))
		<span class="text-danger">{{ $errors->first('cate_id')}}</span>
		@endif	

</div>
<div class="col-md-6">

		<div class="form-group">
        <img id="showImage" src="{{ $post->image }}" width="200" class="img-responsive" name="img"> 

     	</div>

		<div class="form-group">
		<label>Ảnh</label>
		<input type="file" name="image" class="form-control"  placeholder="">
		@if( $errors->first('image'))
		<span class="text-danger">{{ $errors->first('image')}}</span>
		@endif
 		</div>	
 		</div>
 		<div class="col-md-12">	
		<div class="form-group">
		<label for="">Nội dung</label>
		<textarea name="content" rows="10" id="editor1" class="form-control">{{ $post->content }}</textarea>
		@if( $errors->first('content'))
		<span class="text-danger">{{ $errors->first('content')}}</span>
		@endif
		</div>
		</div>

<div class="form-group">
	<label>
		<input type="checkbox" value="1" name="status" @if($post->status==1) checked @endif> Active
	</label>
	
</div>
		<div>
	<button type="submit" class="btn btn-sm btn-success">Lưu</button>
	<a href="{{route('homepage')}}" class="btn btn-sm btn-danger">Hủy</a>
		</div>

</form>
<script type="text/javascript">
  $(document).ready(function(){
    $('[name="detail"]').wysihtml5();
    var img = document.querySelector('[name="image"]');
    img.onchange = function(){
      var anh = this.files[0];
      if(anh == undefined){
        document.querySelector('#showImage').src ="{{ $post->image }}";
      }else{
        getBase64(anh, '#showImage');
      }
    }
</script>
@endsection
