@extends('layouts.main')
@section('content')

<form action="{{ route('product.add') }}" method="post" enctype="multipart/form-data" novalidate>
	@csrf
	<div class="col-md-6">
	<div class="form-group">
		<label for="">Tên sản phẩm-(Name Product)</label>
		<input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="">
		@if( $errors->first('name'))
		<span class="text-danger">{{ $errors->first('name')}}</span>
		@endif
	</div>	
	<div class="form-group">
		<label for="">Tối ưu SEO-(Slug)</label>
		<input type="text" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="">
		@if( $errors->first('slug'))
		<span class="text-danger">{{ $errors->first('slug')}}</span>
		@endif
	</div>	
	<div class="form-group">
		<label for="">Danh mục</label>
		<select name="pro_id" class="form-control">
		
			@foreach($cates as $item)
			<option value="{{$item->id}}" >{{$item->name}}</option>
			@endforeach

		</select>

	</div>	
	@if( $errors->first('pro_id'))
	<span class="text-danger">{{ $errors->first('pro_id')}}</span>
	@endif	
	<div class="form-group">
		<lable>Giá Sản Phẩm</lable>
		<input type="number" name="price" class="form-control" value="{{ old('price') }}">
	</div>
	@if( $errors->first('price'))
		<span class="text-danger">{{ $errors->first('price')}}</span>
		@endif	
</div>
<div class="col-md-6">
	<div class="form-group">
        <img id="showImage" src="" width="200" class="img-responsive" name="img"> 

     	</div>
	<div class="form-group">
		<label>Ảnh-(feature_image)</label>
		<input type="file" name="feature_image" class="form-control"  placeholder="">
		@if( $errors->first('feature_image'))
		<span class="text-danger">{{ $errors->first('feature_image')}}</span>
		@endif
	</div>

</div>	
<div class="col-md-12">	
	<div class="form-group">
		<label for="">Mô tả-(Description)</label>
		<textarea name="description" rows="10" class="form-control"></textarea>
		@if( $errors->first('description'))
		<span class="text-danger">{{ $errors->first('description')}}</span>
		@endif
	</div>		
	</div>
	
<div class="form-group">
	<label>
		<input type="checkbox" value="1" name="status" > Active
	</label>
	
</div>
<div>		<div>
	<button type="submit" class="btn btn-sm btn-success">Lưu</button>
	<a href="{{route('homepage')}}" class="btn btn-sm btn-danger">Hủy</a>
</div>		</div>

</form>
@endsection