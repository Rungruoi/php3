@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Products</h3>

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
              <th>Price</th>
              <th>cate</th>
              <th>slug</th>
              <th>Description</th>
              <th>Image</th>
              <th>Status</th>
              <th >
                <a href="{{ route('product.add') }}" class="btn btn-sm btn-success">Add</a>
              </th>
            </tr>
            @foreach($pro as $key => $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td>{{ $item->name}}</td>
              <td>{{ $item->price }}</td>
              <td>{{ $item->categorysp->name}}</td>
              <td>{{ substr($item->slug,-100)}}</td>
              <td>{!! substr($item->description,-150)!!}</td>
              <td>
                <img src="{{$item->feature_image}}" width="100" >
              </td>
              <td>@if($item->status==1)
              
                        Hiện
                    
                @else
                              Ẩn
              @endif</td>
              <td>
                <a href="{{route('product.edit', 
                ['id' => $item->id])}}" class="btn btn-sm btn-success" title="">Eidt</a>
                
                
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{ $item->id }}">
  Remove
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
            
          <h4>Bạn có muốn xóa bài viết này không!</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            {{-- / --}}
            <a href="{{route('product.remove', 
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
               {{ $pro->links() }}
             </td>

           </tr>
         </tbody>
       </table>
     </div>
     <!-- /.box-body -->



  </div>
  <!-- /.box -->
</div>
</div>

@endsection
