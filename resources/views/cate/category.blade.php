@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-xs-6">
    <form action="{{ route('category.add') }}" method="post" enctype="multipart/form-data" novalidate>
      @csrf
      <div class="form-group">
        <label for="">Tên danh mục-(Name Cate*)</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="">
        @if( $errors->first('name'))
        <span class="text-danger">{{ $errors->first('name')}}</span>
        @endif
      </div>  
      
      <div class="form-group">
        <label for="">Mô tả-(Description*)</label>
        <textarea name="description" rows="10" class="form-control" id="editor1">{{ old('description') }}</textarea>
        @if( $errors->first('description'))
        <span class="text-danger">{{ $errors->first('description')}}</span>
        @endif
      </div>    
      
      
      <div>   <div>
        <button type="submit" class="btn btn-sm btn-success">Lưu</button>
        
        <a href="{{route('categories')}}" class="btn btn-sm btn-danger">Hủy</a>
        
        <!-- Modal -->

        
        

      </div>    </div>

    </form>
  </div>
  <div class="col-xs-6">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Category</h3>

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
              
              <th>Name</th>
              
              <th>Description</th>
              
              <th >
               {{--  <a href="{{ route('category.add') }}" class="btn btn-sm btn-success"><i class="fa fa-plus" aria-hidden="true"></i>Add</a> --}}
              </th>
            </tr>
            @foreach($cate as $key => $item)
            <tr>
              
              <td>{{$item->name}}</td>
              
              <td>{!!$item->description!!}</td>
              <td>
                <a href="{{route('category.edit', 
                ['id' => $item->id])}}" class="btn btn-sm btn-success" title=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Eidt</a>
                
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{ $item->id }}"><i class="fa fa-trash" aria-hidden="true"></i>
                  Remove
                </button>
                <!-- Modal -->
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
            <h4>Bạn có muốn xóa danh mục này!</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
            <a href="{{route('category.remove', 
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
               {{ $cate->links() }}
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
