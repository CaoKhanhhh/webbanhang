@extends('layouts.admin.master')
@section('title','Sửa sản phẩm')
@section('content')
@php
    $defaultImg = $model->image == null ? asset('images/default-image.png') : $model->image;
@endphp
<input type="hidden" value="{{asset($defaultImg)}}" id="defaultImage">
<div>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#main-info">Thông tin chung</a></li>
        <li><a data-toggle="tab" href="#gallery">Ảnh sản phẩm</a></li>
    </ul>
    <div class="tab-content">
        <div id="main-info" class="tab-pane fade in active">
            <form action="{{route('ad-product.save-edit')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$model->id}}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tên sản phẩm <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{old('name', $model->name)}}" placeholder="Tên sp">
                            @if ($errors->first('name'))
                                <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Danh mục <span class="text-danger">*</span></label>
                            <select name="cate_id" class="form-control">
                                @foreach ($cates as $c)
                                <option 
                                    @if ($c->id === $model->cate_id)
                                        selected
                                    @endif
                                    value="{{$c->id}}">{{$c->cate_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Giá bán <span class="text-danger">*</span></label>
                            <input type="number" name="price" 
                                value="{{old('price', $model->price)}}"
                                class="form-control" placeholder="Giá sp">
                        </div>
                        <div class="form-group">
                            <label for="">Số lượng views </label>
                            <input type="number" name="views" 
                                value="{{old('views', $model->views)}}"
                                class="form-control" placeholder="Số lượt xem" value="0">
                        </div>
                        <div class="form-group">
                            <label for="">Sao đánh giá </label>
                            <input type="number" name="star" 
                                value="{{old('star', $model->star)}}"
                                class="form-control" placeholder="Sao đánh giá" value="5">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="preview-img">
                           
                            <img id="preview" src="{{asset($defaultImg)}}" class="img-responsive">
                            
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh sản phẩm <span class="text-danger">*</span></label>
                            <input type="file" name="image" class="form-control" onchange="encodeImageFileAsURL(this, 'preview')">
                            @if ($errors->first('image'))
                                <span class="text-danger">{{$errors->first('image')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Mô tả ngắn</label>
                            <textarea name="short_desc" rows="10" class="form-control">{!! old('short_desc', $model->short_desc)!!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Chi tiết </label>
                            <textarea name="detail" rows="20" class="form-control">{!!old('detail', $model->detail)!!}</textarea>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-sm btn-primary">Cập nhật sản phẩm</button>
                            <a href="{{route('ad-product.list')}}" class="btn btn-sm btn-danger">Hủy</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="gallery" class="tab-pane fade">
            <table class="table table-stripped">
                <tr>
                    <th>#</th>
                    <th>Ảnh</th>
                    <th>URL</th>
                    <th>
                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-add">
                            <i class="fa fa-plus"></i> Thêm ảnh
                        </button>
                    </th>
                </tr>
                @foreach ($galleries as $item)
                    <tr id="gl_{{$item->id}}">
                        <td>{{$loop->iteration}}</td>
                        <td>
                            <img src="{{asset($item->img_url)}}" width="100">
                        </td>
                        <td>
                            {{asset($item->img_url)}}
                        </td>
                        <td>
                            <a href="javascript:;" gallery_id="{{$item->id}}" class="btn btn-sm btn-danger btn-gallery-remove"><i class="fa fa-trash"></i> Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-add" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"> Thêm ảnh</h4>
            </div>
            <form action="{{route('ad-product.upload-gallery')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" value="{{$model->id}}">
                <div class="modal-body">
                    <div class="preview-img">
                        <img id="modal-preview" src="{{asset('images/default-image.png')}}" class="img-responsive">
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh gallery <span class="text-danger">*</span></label>
                        <input type="file" name="imageGallery" class="form-control" onchange="encodeImageFileAsURL(this, 'modal-preview')">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection
@section('js')
    <script>
        $(document).ready(function(){
            tinymce.init({
                selector: 'textarea',
                plugins : 'advlist autolink link image lists charmap print preview'
            });
            $('.btn-gallery-remove').on('click', function(){
                var galleryId = $(this).attr('gallery_id');
                var r= confirm("Bạn chắc chắn muốn xóa???");

                if(r){
                	 $.ajax({
                            url: '{{route('ad-product.remove-gallery')}}',
                            method: 'POST',
                            data: {
                                id: galleryId,
                                _token: '{{ csrf_token() }}'
                            },
                            dataType: 'JSON',
                            success: function(rp){
                                $('#gl_'+rp.id).remove();
                            },
                            error: function(){
                                console.log('error');
                            }
                        });
                }
            });
               
        function encodeImageFileAsURL(element, deploySelector) {
            var file = element.files[0];
            if(file == undefined){
                $('#' + deploySelector).attr('src', $('#defaultImage').val());
                return false;
            }
            var reader = new FileReader();
            reader.onloadend = function() {
                
                $('#' + deploySelector).attr('src', reader.result);
            }
            reader.readAsDataURL(file);
        }
    });
    </script>
@endsection