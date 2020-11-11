@extends('admin_layout')
@section('admin_content')

		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      LIET KE  SAN PHAM
    </div>
    <?php
    $massage=Session::get('message');
    if($massage){
      echo $massage;
      Session::put('massage','null');
    }
    ?>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Ten san pham</th>
            <th> gia </th>
            <th> hinh anh </th>
            <th> noi dung </th>
            <th> mo ta </th>
            <th> thuong hieu </th>
            <th> danh sach </th>
            <th> hien thi </th>
          
            <th style="width:30px;"></th>
          </tr>
        </thead>
        
        @foreach($product as $key =>$pro)
        <tbody>
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td> {{$pro->product_name}}</td>
            <td> {{$pro->product_price}}</td>
            <td> <img src="uploads/product/{{$pro->product_image}}"></td>
            <td> {{$pro->product_content}}</td>
            <td> {{$pro->product_desc}}</td>
            <td> {{$pro->category_name}}</td>
            <td> {{$pro->brand_id}}</td>

            <td><span class="text-ellipsis"> 
              <?php 
              if ($pro->product_status==0){
                ?>
                <a href="{{URL::to('/unactive-pro/'.$pro->product_id)}}" ><span>an</span> </a>
              <?php 
              }else{
                ?>
                <a href="{{URL::to('/active-pro/'.$pro->product_id)}}" ><span class="text-danger text">hien thi</span></a>
                <?php 
              }
              ?>
              </span></td>
           
            <td>
              <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="active" ui-toggle-class="">
                <i class=" text-active">sua</i>
               <a onclick="return confirm('ban co muon xoa ko')" href="{{URL::to('/delete-product/'.$pro->product_id)}}"  class="active" ui-toggle-class="">
                <i class="text-danger text">xoa</i></a>
            </td>
          </tr>
        </tbody>
        
        @endforeach
     
        
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
@endsection