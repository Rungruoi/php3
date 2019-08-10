@extends('layouts.main')
@section('content')
<div class="row">



</form>
</div>
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Users</h3>

      <div class="box-tools">
        <form action="" method="get">
          <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
            <input type="text" name="keyword" class="form-control pull-right" placeholder="Search">

            <div class="input-group-btn">
              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tbody>
          <tr>
            <th>Id</th>
            <th>Name</th>

            <th>Email</th>
            <th>Address</th>
            <th>NumberPhone</th>
            <th>Role</th>
            <th width="180px"></th>
            {{-- gyyy --}}
          </tr>
          @foreach($users as $key => $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{$item->name}}</td>

            <td>{{$item->email}}</td>
            <td>{{ substr($item->address, -100)}}
            </td>
            <td>{{"0". $item->numberphone }}</td>
            <td>@if($item->role==500)
              Admin
              @elseif($item->role==300)
              Member
              @else
              User
              @endif

            </td>
            <td>
              <a href="{{route('user.edit', 
              ['id' => $item->id])}}" class="btn btn-sm btn-success" title=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Eidt</a>

              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{ $item->id }}"><i class="fa fa-trash" aria-hidden="true"></i>
                Remove
              </button>
              <div class="modal fade" id="{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Bạn có muốn xóa tài khoản này!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
          <a href="{{route('user.remove', 
          ['id' => $item->id])}}" {{-- class="btn btn-remove btn-danger" --}} title="" >
          <button type="button" class="btn btn-primary">Đồng ý</button></a>
        </div>
      </div>
    </div>
  </div>

            </td>
          </tr>
          @endforeach
          <tr>

            <td colspan="4" class="text-center">
             {{ $users->links() }}
           </td>

         </tr>
       </tbody>
     </table>
   </div>
   <!-- Modal -->

  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>
</div>

@endsection
