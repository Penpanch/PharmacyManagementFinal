<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="image/png" href="{{asset('frontend/images/logo2.png')}}" />
  <title>Pharmacy Management System | 5 อันดับสูงสุด</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="{{asset('frontend/style/960.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('frontend/style/style.css')}}" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{{asset('frontend/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/script.js')}}"></script>
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
      <li><a href="{{url('/homeAd')}}">หน้าหลัก</a></li>
      <li><a href="#">/</a></li>
      <li><a href="#"  class="active">อันดับยอดขายเภสัชกร</a></li>
    </ul>
    <div class="clear"></div>
    <hr />

    <div class="contianer">

</br>
     <div class="panel panel-default"> 
          <div class="panel-body">
            <form action="topstaff2" method="post" role="form">
                <div class="col-md-2">
                    <div class="form-group" >
                        <label style="padding-top:6px;">ค้นหาอันดับเภสัชกร</label>
                    </div>
                </div>
                <div class="col-md-2 ">
                    <div class="form-group ">
                        <select name="range" id="input" class="form-control" required="required" >
                            @if(Session::get('range') == 'month')
                                <option value="date">วันที่</option>
                                <option selected="" value="month">เดือน</option>
                                <option value="year">ปี</option>
                            @elseif(Session::get('range') == 'year')
                                <option value="date">วันที่</option>
                                <option value="month">เดือน</option>
                                <option selected="" value="year">ปี</option>
                            @else
                                <option selected="" value="date">วันที่</option>
                                <option value="month">เดือน</option>
                                <option value="year">ปี</option>
                            @endif
          
                        </select>
                    </div>
                </div>
                    <div class="col-md-8">
                    <div class="col-md-4">
                        <input type="date" name="keyword" class="form-control" value="{{Session::get('keyword')}}">
                    </div>
                    <div class="col-md-1">
                        <input type="submit" value="ค้นหา" class="btn btn-danger">
                        {!! csrf_field() !!}
                    </div>
                </div>
                <table class="table table-striped table-hover" style="font-size: 13px;">
                <thead>
                    <tr>
                        
                        <th><center>ลำดับที่</center></th>
                        <th><center>ชื่อผู้ขาย</center></th>
                        <th><center>ยอดขายรวม</center></th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php $count=0; ?>
                    @if(isset($results))
                        @foreach ($results as $item)
                        <?php $count++; ?>
                        <tr>
                          
                            <td><center>{{$count}}</center></td>
                            <td><center>{{$item->staff}}</center></td>
                            <td><center>{{$item->sum_sum}}</center></td>
                           
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            </form>

            </div>
            <!-- <div class="panel-footer panel-alinge">
                <p align = "right">
             <a href="{{url('stat')}}" class="btn btn-success">OK!</a>
                 </p>
            </div> -->
</div>

    
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        
      </div>
    </div>
  </div>
</body>
</html>