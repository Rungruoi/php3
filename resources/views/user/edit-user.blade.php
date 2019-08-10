@extends('layouts.main')
@section('content')

<form action="{{route('user.edit', ['id' => $users->id])}}" method="post" enctype="multipart/form-data" novalidate>
	@csrf
	<div class="col-md-6">
	<div class="form-group">
		<input type="hidden" name="id" value="{{ $users->id }}">
		<label for="">Tên - (Name users)</label>
		<input type="text" name="name" class="form-control" value="{{ $users->name }}" placeholder="">
		@if( $errors->first('name'))
		<span class="text-danger">{{ $errors->first('name')}}</span>
		@endif
	</div>	
	<div class="form-group">
		<label for="">Email</label>

		<input type="email" name="email" class="form-control" value="{{ $users->email }}">
		@if( $errors->first('email'))
		<span class="text-danger">{{ $errors->first('email')}}</span>
		@endif
	</div>
	<div class="form-group">
		<label for="">Quyền truy cập-(Role)</label>
		<select name="role" id="" class="form-control" @if($users->role==900) readonly @endif>

		<option value="1" @if($users->role==1) selected @endif >User</option>
		<option value="300" @if($users->role==300) selected @endif>Member</option>
		<option value="500" @if($users->role==500) selected @endif>Admin</option>
		</select>
	</div>	
	<div class="form-group">
		<label for="">Số điện thoại -(Number-phone)</label>
		<input type="number" name="numberphone" class="form-control" value="{{"0".$users->numberphone }}">
		@if( $errors->first('numberphone'))
		<span class="text-danger">{{ $errors->first('numberphone')}}</span>
		@endif
	</div>
	
	</div>
	<div class="col-md-6">
	<div class="form-group">
		<label for="">Địa chỉ-(Address)</label>
		<textarea name="address"  rows="10" class="form-control">{{ $users->address }}</textarea>
		@if( $errors->first('address'))
		<span class="text-danger">{{ $errors->first('address')}}</span>
		@endif
	</div>	
</div>
	
	<button type="submit" class="btn btn-sm btn-success">Lưu</button>
	<a href="{{route('user')}}" class="btn btn-sm btn-danger">Hủy</a>
</div>		</div>

</form>
@endsection