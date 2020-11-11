@extends('admin_layout');
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            THEM DANH MUC SAN PHAM
                        </header>
                        @foreach($edit_brand_product as $key =>$edit_pro)
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-brand-product/'.$edit_pro->brand_id)}}" method="post">
                               {{ csrf_field() }}
                             
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sua danh muc</label>
                                    <input type="text" class="form-control" name="edit_brand_product_name" value="{{$edit_pro->brand_name}}" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">mo ta danh muc</label>
                                    <textarea type="text" class="form-control"   name="edit_brand_product_desc"   placeholder="Password">{{$edit_pro->brand_desc}}</textarea>
                                    </div>
                                @endforeach
                                <div class="form-group">
                                
                               
                            </select>
                                </div>
                                <div class="form-group">
                                <button type="submit" class="btn btn-info">cap nhap</button>
                            </form>
                            </div>

                        </div>
                        </div>
                    </section>


            </div>
@endsection