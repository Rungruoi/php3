@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Posts</h3>

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
              <th>ID</th>
              <th>Title</th>
              <th>Cate</th>
              <th>Author</th>
              <th>Image</th>
              <th>Ngày Đăng</th>
              <th>Status</th>
              <th>
                <a href="{{ route('post.add') }}" class="btn btn-sm btn-success"><i class="fa fa-plus" aria-hidden="true"></i>Add</a>

              </th>
            </tr>
            @foreach($ds as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->title}}</td>
                   <td>{{$item->categorysp['name']}}</td>
                  <td>{{ $item->auther }}</td>
                    <td>
                        <img src="{{$item->image}}" width="100" >
                    </td>
                    <td>{{ $item->publish_date }}</td>
                    <td>@if($item->status==1)
                <a class="btn btn-xs btn-info">
                        Hiện
                      </a>
                @else
                <a class="btn btn-xs btn-warning">
                Ẩn</a>
              @endif</td>
                    <td>
                        <a href="{{route('post.edit', 
                        ['id' => $item->id])}}" class="btn btn-xs btn-success" title=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{ $item->id }}"><i class="fa fa-trash" aria-hidden="true"></i>
  
</button>
                  <!-- Modal -->
                <div class="modal fade" id="{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title text-success" id="exampleModalLabel">Modal</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-danger">
            
          <h4>Bạn có muốn xóa sản phẩm này không!</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            {{-- / --}}
            <a href="{{route('post.remove', 
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
                     {{ $ds->links() }}
                  </td>
                </tr>
               
            </tbody>
          </table>
        </div>
        <!-- Modal -->

      </div>
      <!-- /.box -->
    </div>
  </div>

@endsection