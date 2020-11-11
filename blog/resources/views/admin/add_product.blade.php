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
                                <form role="form" action="{{URL::to('/save-product')}}" method="post"  enctype="multipart/form-data">
                               {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="product_name" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" class="form-control" name="product_price" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" class="form-control" name="product_image" placeholder="Enter email" enctype="multipart/form-data">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea type="text" class="form-control"  name="product_content"  placeholder="Password"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea type="text" class="form-control"  name="product_desc"  placeholder="Password"></textarea>
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
                                @foreach($cate_product as $key =>$cate)
                                <option value="{{$cate->category_id}}">{{$cate->category_name}} </option>
                               @endforeach
                                </select>
                                </div>

                              


                                <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="product_status" class="form-control input-sm m-bot15">

                                <option value="0">Ẩn </option>
                                
                                </div>
                               
                            </select>
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