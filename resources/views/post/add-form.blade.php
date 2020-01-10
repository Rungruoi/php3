@extends('layouts.main')
@section('content')

<form action="{{ route('post.add') }}" method="post" enctype="multipart/form-data" novalidate>
	@csrf
	<div class="col-md-6">
	<div class="form-group">
		<label for="">Tiêu đề*</label>
		<input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="">
		@if( $errors->first('title'))
		<span class="text-danger">{{ $errors->first('title')}}</span>
		@endif
	</div>	
<div class="form-group">
		<label for="">Tác giả*</label>
				<input type="text" name="auther" class="form-control" value="{{ old('auther') }}">
				@if( $errors->first('auther'))
		<span class="text-danger">{{ $errors->first('auther')}}</span>
		@endif
		
</div>		
<div class="form-group">
	<label for="">Ngày đăng</label>
	<input type="date" name="publish_date" class="form-control" placeholder="" value="{{ old('publish_data') }}">
	@if( $errors->first('publish_date'))
		<span class="text-danger">{{ $errors->first('publish_date')}}</span>
		@endif
</div>
<div class="form-group">
	<label for="">Danh mục</label>
	<select name="cate_id" class="form-control">
		@foreach($cates as $item)
		<option value="{{$item->id}}">{{$item->name}}</option>
		@endforeach
		
	</select>

	
</div>	
@if( $errors->first('cate_id'))
		<span class="text-danger">{{ $errors->first('cate_id')}}</span>
		@endif	

</div>

<div>		<div>
	<div class="col-md-6">	
	<div class="form-group">
		<label>Ảnh</label>
		<input type="file" name="image" class="form-control" value="{{ old('image') }}" placeholder="">
		@if( $errors->first('image'))
		<span class="text-danger">{{ $errors->first('image')}}</span>
		@endif
	</div>	
	<div class="checkbox">
	<label>
		<input type="checkbox" value="1" name="status"> Active
	</label>
</div>
	</div>	
	<div class="col-md-12">	
		<div class="form-group">
		<label for="">Nội dung*</label>
		<textarea name="content" rows="10" class="form-control" id="editor1">{{ old('content') }}</textarea>
		@if( $errors->first('content'))
		<span class="text-danger">{{ $errors->first('content')}}</span>
		@endif
	</div>		
	</div>
	
			
	<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>Lưu</button>
	<a href="{{route('homepage')}}" class="btn btn-sm btn-danger">Hủy</a>
</div>		</div>

</form>
@endsection