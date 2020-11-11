@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            THÊM SẢN PHẨM
                        </header>
                        <?php
                        $massage=Session::get('massage');
                        if($massage){
                            echo $massage;
                            Session::put('massage',null);
                        }
                        ?>
                        <div class="panel-body">
                            <div class="position-center">
                            @foreach($edit as $key =>$value)
                                <form role="form" action="{{URL::to('/update-product/'.$value->product_id)}}" method="post"  enctype="multipart/form-data">
                               {{ csrf_field() }}
                             
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="product_name" value="{{$value->product_name}}" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" class="form-control" name="product_price" value="{{$value->product_name}}" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" class="form-control" name="product_image" value="{{$value->product_name}}" placeholder="Enter email" enctype="multipart/form-data">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea type="text" class="form-control"  name="product_content" value="{{$value->product_content}}"  placeholder="Password">{{$value->product_content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea type="text" class="form-control"  name="product_desc" value="{{$value->product_desc}}"  placeholder="Password">{{$value->product_desc}}</textarea>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputPassword1">Thương hiệu</label>
                                <select name="product_brand" class="form-control input-sm m-bot15">
                                <option value="0">Dell</option>
                                <option value="1">Oppo</option>
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                <select name="product_category" class="form-control input-sm m-bot15">
                                @foreach($edit as $key =>$cate)
                                <option value="{{$cate->category_id}}">{{$cate->category_name}} </option>
                               @endforeach
                                </select>
                                </div>

                              


                                <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="product_status" class="form-control input-sm m-bot15">

                                <option value="0">Ẩn </option>
                                <option value="0">hien thi </option>
                                
                                </div>
                               
                            </select>
                            @endforeach
                                </div>
                                <div class="form-group">
                                <button type="submit" class="btn btn-info">them san pham</button>
                            </form>
                            </div>

                        </div>
                        </div>
                    </section>


            </div>
@endsection