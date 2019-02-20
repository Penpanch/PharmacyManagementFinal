<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="image/png" href="{{asset('frontend/images/logo2.png')}}" />
  <title>Pharmacy Management System | รายการยา</title>
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
        <li><a href="{{ url('/homeUs') }}">หน้าหลัก</a></li>
        <li><a href="{{ url('/aboutUs') }}">เกี่ยวกับเรา</a></li>
        <li><a href="#">โปรโมชั่น</a>
        <ul>
            <li><a href="{{ url('/promotionUs') }}">ดูโปรโมชัน</a></li>
          </ul></li>
        <li><a href="{{ url('/stockUs') }}">รายการยา</a></li>
        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">สวัสดี คุณ
                                    {{ Auth::user()->name }}(USER) <span cass="caret"></span>
                                </a>
            <ul>
            <li><a href="{{ url('/profileUs') }}">ดูโปรไฟล์</a></li>
            <li><a href="{{ url('/changepassUs') }}">เปลี่ยนรหัสผ่าน</a></li>
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
            <!-- <li><a href="{{ url('/searchdrugUs') }}"><img src="{{asset('frontend/images/search.png')}}" width="20" height="25" alt="" /></a></li> -->

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
      <li><a href="{{url('/homeUs')}}">หน้าหลัก</a></li>
      <li><a href="#">/</a></li>
      <li><a href="{{url('/stockUs')}}"  class="active">รายการยา</a></li>
    </ul>
    <div class="clear"></div>
    <hr />
  
    <div class="row"><form action="/searchUs" method="get">
      <div class="col-md-11">
          <div>
            <input type="search" name="search" class="form-control">
          </div>
      
     </div><span>
        <button type="submit" class="btn btn-primary">ค้นหายา</button>
       </span></form>
    </div>
<br>
  <div>
    <div class="row">
      <div class="panel panel-default">
        @if(session('info'))
        <div class="col-mg-6 alert alert-success">
          {{session('info')}}
        </div>
        @endif
        <table class="table table-striped table-hover">
  <thead bgcolor="#bcbcbc">
    <tr>
      <th scope="col">รหัสยา</th>
      <th scope="col">ชื่อยา</th>
      <th scope="col">ขนาด</th>
      <th scope="col">ชนิดตัวยา</th>
      <th scope="col">หมวดหมู่</th>
      <th scope="col">ราคา</th>
      <th scope="col">จำนวน</th>
      <th scope="col">หน่วย</th>
    </tr>
  </thead>
  <tbody>
    @if(count($stocks) > 0)
    @foreach($stocks as $stock)


          <tr class="table-active">
            <td><a href='{{url("/stockUs/show/{$stock->id}")}}'>{{ $stock->code }}</a></td>
            <td>{{ $stock->name }}</td>
            <td>{{ $stock->size }}</td>
            <td>{{ $stock->type }}</td>
            <td>{{ $stock->groups }}</td>
            <td>{{ $stock->price }}</td>
            <td>{{ $stock->amout }}</td>
            <td>{{ $stock->unit }}</td>
          </tr>
    @endforeach
    @endif
   
  </tbody>
</table> 
{{ $stocks->links() }}
      </div>
    </div>
  </div>
</div>
</body>
</html>
