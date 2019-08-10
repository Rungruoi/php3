@extends('layouts.main')
@section('content')

<form action="{{route('user.editprofile',['id' => Auth::user()->id])}}" method="post" enctype="multipart/form-data" novalidate>
	@csrf
	<div class="col-md-6">
	<div class="form-group">
	
		<label for="">Tên -(Name)</label>
		<input type="text" name="name" class="form-control" value="{{ Auth::user()->name}}" placeholder="">
		@if( $errors->first('name'))
		<span class="text-danger">{{ $errors->first('name')}}</span>
		@endif
	</div>	
	<div class="form-group">
		<input type="hidden" name="id" >

		<label for="">Mật khẩu cũ -(Pass old)</label>
	
		
		<input type="password" name="password" class="form-control"  placeholder="">
		@if( $errors->first('password'))
		<span class="text-danger">{{ $errors->first('password')}}</span>
		@endif
		@if(isset($mess))<span class="text-danger">{{ $mess }}</span>
		@endif
	</div>
	<div class="form-group">
		<input type="hidden" name="id" >
		<label for="">Mật khẩu mới -(Name Pass)</label>
		<input type="password" name="newpass" class="form-control" placeholder="">
		@if( $errors->first('newpass'))
		<span class="text-danger">{{ $errors->first('newpass')}}</span>
		@endif
	</div>
	<div class="form-group">
		<input type="hidden" name="id">
		<label for="">Xác nhận mật khẩu -(Repass)</label>
		<input type="password" name="repass_confirmation" class="form-control" placeholder="">
		@if( $errors->first('repass_confirmation'))
		<span class="text-danger">{{ $errors->first('repass_confirmation')}}</span>
		@endif
	</div>
	</div>
	<div class="col-md-6">
	<div class="form-group">
		<label for="">Địa chỉ-(Address)</label>
		<textarea name="address" id="editor1" rows="10" class="form-control">{{ Auth::user()->address }}</textarea>
		@if( $errors->first('address'))
		<span class="text-danger">{{ $errors->first('address')}}</span>
		@endif
	</div>	
	
	<div class="form-group">
		<label for="">Số điện thoại -(Number-phone)</label>
		<input type="number" name="numberphone" class="form-control" value="{{"0".Auth::user()->numberphone }}">
		@if( $errors->first('numberphone'))
		<span class="text-danger">{{ $errors->first('numberphone')}}</span>
		@endif
	</div>
	
	
<div>		<div>
	<button type="submit" class="btn btn-sm btn-success">Lưu</button>
	<a href="{{route('homepage')}}" class="btn btn-sm btn-danger">Hủy</a>
</div>		</div>
</div>

</form>
@endsection