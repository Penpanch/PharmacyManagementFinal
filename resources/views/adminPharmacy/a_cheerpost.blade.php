<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="image/png" href="{{asset('frontend/images/logo2.png')}}" />
  <title>Pharmacy Management System | แคชเชียร์/เลือกยา</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="{{asset('frontend/style/960.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('frontend/style/style.css')}}" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{{asset('frontend/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/script.js')}}"></script>
<style type="text/css">
div.iBannerFix{
    height:50px;
    position:fixed;
    left:0px;
    bottom:50px;
    width:100%;
    z-index: 99;
}
</style>
</head>
<body>
<!--container_12 start here-->
<div class="container_12">
  <!--grid_12 start here-->
  <div class="grid_12">
    <!--logo_container start here-->
    <div id="logo_container"> <a href="#" id="logo"></a>
      <div class="clear"></div>
      <div class="tag_line">Pharmacy Management System</div>
    </div>
    <!--logo_container end here-->
    <div id="nav_wrapper">
     <ul id="nav">
        <li><a href="{{ url('/homeAd') }}">หน้าหลัก</a></li>
        <li><a href="{{ url('/aboutAd') }}">เกี่ยวกับเรา</a></li>
        <li><a href="#">โปรโมชั่น</a>
        <ul>
            <li><a href="{{ url('/promotionAd') }}">ดูโปรโมชัน</a></li>
            <li><a href="{{ url('/addpromotionAd') }}">เพิ่มโปรโมชัน</a></li>
          </ul></li>
        <li><a href="#">รายการยา</a><ul>
            <li><a href="{{ url('/stockAd') }}">ดูรายการยา</a></li>
            <li><a href="{{ url('/expAd') }}">ยาที่ใกล้หมดอายุ</a></li>
            <li><a href="{{ url('/outAd') }}">ยาที่ใกล้หมดสต๊อก</a></li>
            <li><a href="{{ url('/addstockAd') }}">เพิ่มข้อมูลยา</a></li>
          </ul></li>
        <li><a href="#">การขาย</a><ul>
            <li><a href="{{ url('/shop') }}">แคชเชียร์</a></li>
            <li><a href="{{ url('/reportAd') }}">รายงานการขาย</a></li>
            <li><a href="{{ url('/graphmonthAd') }}">กราฟการขาย</a></li>
            <li><a href="{{ url('/topdrug') }}">10อันดับยาขายดี</a>
            <li><a href="{{ url('/topstaff') }}">อันดับยอดขายเภสัชกร</a>
          </ul></li>
        <li><a href="#">สมาชิก</a><ul>
            <li><a href="{{ url('/employAd') }}">ดูเภสัชกร</a></li>
            <li><a href="{{ url('/userAd') }}">ดูลูกค้า</a></li>
            <li><a href="{{ url('/adduserAd') }}">เพิ่มสมาชิก</a></li>
          </ul></li>
        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">สวัสดี คุณ
                                    {{ Auth::user()->name }} (ADMIN)<span class="caret"></span>
                                </a>
            <ul>
            <li><a href="{{ url('/profileAd') }}">ดูโปรไฟล์</a></li>
            <li><a href="{{ url('/changepassAd') }}">เปลี่ยนรหัสผ่าน</a></li>
            <li><a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            ออกจากระบบ
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
               {{ csrf_field() }}
            </form>
            </li>
            </ul>
            </li>
            <!-- <li><a href="{{ url('/searchdrugAd') }}"><img src="{{asset('frontend/images/search.png')}}" width="20" height="25" alt="" /></a></li> -->

@section('content')
                    @if (session('status'))
                            {{ session('status') }}
                    @endif
@endsection

      </ul>
    </div>
  </div>
  <div class="grid_12">
    <ul id="q_nav">
      <li><a href="#">หน้าหลัก</a></li>
      <li><a href="#">/</a></li>
      <li><a href="{{ url('/shop') }}">แคชเชียร์/เลือกยา</a></li>
    </ul>
    <div class="clear"></div>
    <hr />
    <div class="panel panel-primary">
    <div class="panel-body">
        <form action="" method="POST" role="form" id="stocks">

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            @if(isset($delete) && $delete==1)
                            <th></th>
                            @endif
                            <th><center>ลำดับที่</center></th>
                            <th><center>รหัสยา</center></th>
                            <th><center>ชื่อยา</center></th>
                            <th><center>ประเภท</center></th>
                            <th><center>จำนวน</center></th>
                            <th><center>ราคา</center></th>
                            <th><center>วันผลิต</center></th>
                            <th><center>วันหมดอายุ</center></th>
                            <th><center>เลือก</center></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $n=1;?>
                        @foreach($stocks as $item)
                        <tr>
                            @if(isset($delete) && $delete==1)
                            <td><input type="checkbox" name="checkbox[]" value="{{$item->id}}"></td>
                            @endif
                            <td><center>{{$n}}</center></td>
                            <td><center>{{$item->code}}</center></td>
                            <td><center>{{$item->name}}</center></td>
                            <td><center>{{$item->type}}</center></td>
                            <td><center>{{$item->amout}}</center></td>
                            <td><center>{{$item->price}}</center></td>
                            <td><center>{{$item->mfd}}</center></td>
                            <td><center>{{$item->exp}}</center></td>
                            <td><center><a href="adddrug/{{$item->id}}" class="btn btn-edit">Add</a></center></td>

                        </tr>
                         <?php $n++;?>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div></div>

    </div>
    
</body>
</html>
