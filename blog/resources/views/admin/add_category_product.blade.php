@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            THEM DANH MUC SAN PHAM
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
                                <form role="form" action="{{URL::to('/save-category-product')}}" method="post">
                               {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ten danh muc</label>
                                    <input type="text" class="form-control" name="category_product_name" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">mo ta danh muc</label>
                                    <textarea type="text" class="form-control"  name="category_product_desc"  placeholder="Password"></textarea>
                                </div>
                                <div class="form-group">
                                <select name="category_product_status" class="form-control input-sm m-bot15">
                                <option value="0">An </option>
                                <option value="1">hien thi</option>
                               
                            </select>
                                </div>
                                <div class="form-group">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                        </div>
                    </section>


            </div>
@endsection