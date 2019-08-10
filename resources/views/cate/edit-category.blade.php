@extends('layouts.main')
@section('content')

<form action="{{route('category.edit', ['id' => $cate->id])}}" method="post" enctype="multipart/form-data" novalidate>
	@csrf
	<div class="col-md-6">
	<div class="form-group">
		<input type="hidden" name="id" value="{{ $cate->id }}">
		<label for="">Tên danh mục-(Name Cate)</label>
		<input type="text" name="name" class="form-control" value="{{ $cate->name}}" placeholder="">
		@if( $errors->first('title'))
		<span class="text-danger">{{ $errors->first('title')}}</span>
		@endif
	</div>	
	
	<div class="form-group">
		<label for="">Mô tả-(Description)</label>
		<textarea name="description" rows="10" id="editor1" class="form-control">{{ $cate->description }}</textarea>
		@if( $errors->first('description'))
		<span class="text-danger">{{ $errors->first('description')}}</span>
		@endif
	</div>		
	
	
<div>		<div>
	<button type="submit" class="btn btn-sm btn-success">Lưu</button>
	<a href="{{route('categories')}}" class="btn btn-sm btn-danger">Hủy</a>
</div>		</div>
</div>
</form>
@endsection