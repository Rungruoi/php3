@extends('layouts.main')
@section('content')

<form action="{{ route('category.add') }}" method="post" enctype="multipart/form-data" novalidate>
	@csrf
	<div class="form-group">
		<label for="">Tên danh mục-(Name Cate)</label>
		<input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="">
		@if( $errors->first('name'))
		<span class="text-danger">{{ $errors->first('name')}}</span>
		@endif
	</div>	
	
	<div class="form-group">
		<label for="">Mô tả-(Description)</label>
		<textarea name="description" rows="10" class="form-control">{{ old('description') }}</textarea>
		@if( $errors->first('description'))
		<span class="text-danger">{{ $errors->first('description')}}</span>
		@endif
	</div>		
	
	
<div>		<div>
	<button type="submit" class="btn btn-sm btn-success">Lưu</button>
	<a href="{{route('categories')}}" class="btn btn-sm btn-danger">Hủy</a>
</div>		</div>

</form>
@endsection