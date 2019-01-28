@extends('layouts.admin.master')
@section('title','Sản phẩm')
@section('content')
@if (isset($msg))
        <h5 class="text-danger">{{$msg}}</h5>
        @endif
<div class="box">
    <div class="box-header">
        <div class="row">
            <form action="" method="get" class="col-sm-4 col-sm-offset-3">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" name="keyword" value="{{$keyword}}">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-warning btn-flat fa fa-search"> Tìm kiếm</button>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <p></p>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <table class="table table-striped table-bordered">
        <tbody><tr>
            <th style="width: 10px">#</th>
            <th>Tên sp</th>
            <th>Ảnh</th>
            <th>Danh mục</th>
            <th>Giá</th>
            <th>Views</th>
            <th>Star</th>
            <th><a href="{{route('ad-product.add')}}" class="btn btn-sm btn-warning"><i class="fa fa-plus"></i> Tạo mới</a></th>
        </tr>
        @foreach ($products as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>
                    <img src="{{asset($item->image)}}" width="50">
                </td>
                <td>{{$item->category->cate_name}}</td>
                <td>{{$item->price}}đ</td>
                <td>{{$item->views}}</td>
                <td>{{$item->star}}</td>
                <td>
                    <a href="{{route('ad-product.edit', ['id' => $item->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>Sửa</a>
                    <a href="javascript:void(0);" linkUrl="{{route('ad-product.remove', ['id' => $item->id])}}" class="btn btn-danger btn-sm btn-remove"><i class="fa fa-trash"></i> Xóa</a>
                </td>
            </tr>
        @endforeach
        <tr>
            <div class="pagination">
                <td colspan="8" class="text-center">
                {{$products->links()}}
            </td>
            </div>
            
        </tr>
        </tbody></table>
    </div>
    <!-- /.box-body -->
</div>

@endsection

@section('js')
    <script>
    	
        $(document).ready(function(){
            $('.btn-remove').on('click', function(){
                var url = $(this).attr('linkUrl');
                var r= confirm("Bạn chắc chắn muốn xóa???");

                if(r){
                	window.location.href = url;
                }
                
               
            });

        });

    </script>
@endsection