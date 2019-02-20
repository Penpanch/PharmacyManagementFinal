<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="icon" type="image/png" href="{{asset('frontend/images/logo2.png')}}" />
<title>Pharmacy Management System | หน้าหลัก</title>
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
        <li><a href="{{ url('/homeEm') }}">หน้าหลัก</a></li>
        <li><a href="{{ url('/aboutEm') }}">เกี่ยวกับเรา</a></li>
        <li><a href="#">โปรโมชั่น</a>
        <ul>
            <li><a href="{{ url('/promotionEm') }}">ดูโปรโมชัน</a></li>
            <li><a href="{{ url('/addpromotionEm') }}">เพิ่มโปรโมชัน</a></li>
          </ul></li>
        <li><a href="#">รายการยา</a><ul>
            <li><a href="{{ url('/stockEm') }}">ดูรายการยา</a></li>
            <li><a href="{{ url('/addstockEm') }}">เพิ่มข้อมูลยา</a></li>
          </ul></li>
        <li><a href="#">การขาย</a><ul>
            <li><a href="{{ url('/shopEm') }}">แคชเชียร์</a></li>
          </ul></li>
        <li><a href="#">สมาชิก</a><ul>
            <li><a href="{{ url('/userEm') }}">ดูลูกค้า</a></li>
            <li><a href="{{ url('/adduserEm') }}">เพิ่มสมาชิก</a></li>
          </ul></li>
        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">สวัสดี คุณ
                                    {{ Auth::user()->name }} (STAFF)<span class="caret"></span>
                                </a>
            <ul>
            <li><a href="{{ url('/profileEm') }}">ดูโปรไฟล์</a></li>
            <li><a href="{{url('/changepassEm')}}"  class="active">เปลี่ยนรหัสผ่าน</a></li>
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
            <!-- <li><a href="{{ url('/searchdrugEm') }}"><img src="{{asset('frontend/images/search.png')}}" width="20" height="25" alt="" /></a></li> -->

@section('content')
                    @if (session('status'))
                            {{ session('status') }}
                    @endif
@endsection

      </ul>
    </div>
    <!--#nav_wrapper-->
  </div>
  <!--grid_12 end here-->
  <div class="clear"></div>
  <!--grid_12 start here-->
  <div class="grid_12">
    <div id="slider">
      <div id="slideshow">
        <div class="slide_entry">
          <ul>
            <li>
              <img src="{{asset('frontend/images/slider1.jpg')}}" alt=""  /></li>
            <li>
              <img src="{{asset('frontend/images/slider2.jpg')}}" alt="" /> </li>
            <li>
              <img src="{{asset('frontend/images/slider3.jpg')}}" alt=""  /> </li>
          </ul>
          <div id="number"></div>
        </div>
        <!-- end slide_entry_full div -->
      </div>
      <!-- end slideshow_full div -->
    </div>
    <!--slider end here-->
  </div>
  <!--grid_12 end here-->
  <div class="clear"></div>
  <!--grid_3 start here-->
  <div class="grid_3">
    <div class="circle"><a href="#"><img src="{{asset('frontend/images/tylenol.png')}}" width="220" height="211" alt="" /></a></div>
  </div>
  <!--grid_3 end here-->
  <!--grid_3 start here-->
  <div class="grid_3">
    <div class="circle"><a href="#"><img src="{{asset('frontend/images/decongen.png')}}" width="220" height="211" alt="" /></a></div>
  </div>
  <!--grid_3 end here-->
  <!--grid_3 start here-->
  <div class="grid_3">
    <div class="circle"><a href="#"><img src="{{asset('frontend/images/haemovit.png')}}" width="220" height="211" alt="" /></a></div>
  </div>
  <!--grid_3 end here-->
  <!--grid_3 start here-->
  <div class="grid_3">
    <div class="circle"><a href="#"><img src="{{asset('frontend/images/yathad.png')}}" width="220" height="211" alt="" /></a></div>
  </div>
  <!--grid_3 end here-->
  <div class="clear"></div>
  <!--grid_3 start here-->
  <div class="grid_3">
    <!--box start here-->
    <div class="box">
      <h2 class="home-items">ไทลินอล 500 ชนิดเม็ด</h2>
      <br />
      <h3>สรรพคุณ</h3>
      <p>ใช้บรรเทาอาการปวดในระดับอ่อนถึงปานกลาง ปวดศีรษะทั่วไป ปวดกล้ามเนื้อ ลดไข้เนื่องจากหวัด</p>
    </div>
    <!--box end here-->
  </div>
  <!--grid_3 end here-->
  <!--grid_3 start here-->
  <div class="grid_3">
    <!--box start here-->
    <div class="box">
      <h2 class="home-items">ดีคอลเจน ชนิดเม็ด</h2>
      <br />
      <h3>สรรพคุณ</h3>
      <p>บรรเทาอาการไข้หวัด/โรคหวัด ไซนัสอักเสบ ไข้ละอองฟาง ลดอาการคัดจมูกเนื่องจากน้ำมูกมาก</p>
    </div>
    <!--box end here-->
  </div>
  <!--grid_3 end here-->
  <!--grid_3 start here-->
  <div class="grid_3">
    <!--box start here-->
    <div class="box">
      <h2 class="home-items">เฮโม-วิต ยาบำรุงเม็ดสีแดง</h2>
      <br />
      <h3>สรรพคุณ</h3>
      <p>เป็นยาบำรุงเม็ดสีแดง ตัวยาประกอบด้วย ธาตุเหล็ก วิตามินบี 1, บี 6 และ บี 12 สามารถใช้สำหรับ บำรุงโลหิต บำรุงร่างกาย บำรุงประสาท แก้โลหิตจาง และช่วยเจริญอาหาร</p>
    </div>
    <!--box end here-->
  </div>
  <!--grid_3 end here-->
  <!--grid_3 start here-->
  <div class="grid_3">
    <!--box start here-->
    <div class="box">
      <h2 class="home-items">ยาธาตุน้ำขาว กระต่ายบิน</h2>
      <br />
      <h3>สรรพคุณ</h3>
      <p>ใช้รับประทานเพื่อทำลายเชื้อโรคในลำไส้ รักษาอาการอักเสบของลำไส้ แก้ปวดท้อง แก้ท้องเสีย (อาการท้องเสียจากการติดเชื้อแบบไม่รุนแรง) แก้อาการท้องอืดท้องเฟ้อ จุกเสียดแน่นท้อง ช่วยขับลม นอกจากนี้ยังช่วยเคลือบกระเพาะอาหารเพื่อการทำลายเชื้อโรคในลำไส้ หรือควบคุมเชื้อแบคทีเรียในกระเพาะอาหารที่เป็นต้นเหตุทำให้กระเพาะอาหารมีกรดมาก (แต่ยานี้ไม่ได้มีส่วนช่วยในการลดกรด)</p>
    </div>
    <!--box end here-->
  </div>
  <!--grid_3 end here-->

<!--start-->
  <div class="clear"></div>
  <!--grid_3 start here-->
  <div class="grid_3">
    <div class="circle"><a href="#"><img src="{{asset('frontend/images/hirudoid.png')}}" width="220" height="211" alt="" /></a></div>
  </div>
  <!--grid_3 end here-->
  <!--grid_3 start here-->
  <div class="grid_3">
    <div class="circle"><a href="#"><img src="{{asset('frontend/images/sara.png')}}" width="220" height="211" alt="" /></a></div>
  </div>
  <!--grid_3 end here-->
  <!--grid_3 start here-->
  <div class="grid_3">
    <div class="circle"><a href="#"><img src="{{asset('frontend/images/yasatree.png')}}" width="220" height="211" alt="" /></a></div>
  </div>
  <!--grid_3 end here-->
  <!--grid_3 start here-->
  <div class="grid_3">
    <div class="circle"><a href="#"><img src="{{asset('frontend/images/namman.png')}}" width="220" height="211" alt="" /></a></div>
  </div>
  <!--grid_3 end here-->
  <div class="clear"></div>
  <!--grid_3 start here-->
  <div class="grid_3">
    <!--box start here-->
    <div class="box">
      <h2 class="home-items">ฮีรูดอยด์</h2>
      <br />
      <h3>สรรพคุณ</h3>
      <p>เป็นครีมลดรอยแผลเป็นทำให้รอยแผลเป็นต่างๆที่แข็ง ยุบและนุ่มลงได้ บรรเทาอาการอักเสบ ปวดแสบแดงร้อนบริเวณผิวหนัง ที่เกิดเนื่องจากการเผาไหม้ของแสงแดด ช่วยการดูดซึมของน้ำเหลืองและทำให้การบวมลดลง อาการตึงในบริเวณและอาการปวดจะบรรเทาลง</p>
    </div>
    <!--box end here-->
  </div>
  <!--grid_3 end here-->
  <!--grid_3 start here-->
  <div class="grid_3">
    <!--box start here-->
    <div class="box">
      <h2 class="home-items">ซาร่า ชนิดน้ำ รสสตรอเบอรี่</h2>
      <br />
      <h3>สรรพคุณ</h3>
      <p>บรรเทาอาการปวดเล็กน้อยถึงปานกลาง เช่น ปวดศีรษะ ปวดกล้ามเนื้อ ปวดฟัน ปวดกระดูกและข้อ รวมถึงสามารถใช้ลดไข้ได้ทั้งในเด็กและผู้ใหญ่</p>
    </div>
    <!--box end here-->
  </div>
  <!--grid_3 end here-->
  <!--grid_3 start here-->
  <div class="grid_3">
    <!--box start here-->
    <div class="box">
      <h2 class="home-items">ยาสตรีเพ็ญภาค</h2>
      <br />
      <h3>สรรพคุณ</h3>
      <p>ช่วยในการฟอกเลือด บำรุงเลือด บำรุงร่างกาย บำรุงผิวพรรณให้เปล่งปลั่ง ดูมีเลือดฝาด บำรุงธาตุในร่างกาย ช่วยให้เจริญอาหาร แก้ปัญหาประจำเดือนที่มาไม่ปกติ แก้จุกเสียด ปวดท้องประจำเดือน ทำให้มดลูกแห้งเร็ว ขับน้ำคาวปลา เป็นต้น</p>
    </div>
    <!--box end here-->
  </div>
  <!--grid_3 end here-->
  <!--grid_3 start here-->
  <div class="grid_3">
    <!--box start here-->
    <div class="box">
      <h2 class="home-items">น้ำมันมวย</h2>
      <br />
      <h3>สรรพคุณ</h3>
      <p>บรรเทาอาการปวดเมื่อยของกล้ามเนื้อ หลังจากการเล่นกีฬาหรือออกกำลังกาย ลดการปวด ฟกช้ำบริเวณผิวหนัง ช่วยผ่อนคลายความตึงเครียดของกล้ามเนื้อ และช่วยให้อบอุ่น ทำให้เลือดลมไหลเวียนได้มากขึ้น</p>
    </div>
    <!--box end here-->
  </div>
  <!--grid_3 end here-->


  <div class="clear"></div>
  <!--grid_12 start here-->
  <div class="grid_12">
    <div class="divider"></div>
  </div>
  <!--grid_12 end here-->
  <div class="clear"></div>
  <!--grid_12 start here-->
  <div class="grid_12">
    <!--bottom_heading start here-->
    <div class="bottom_heading">ร้านขายยาไถ่ซัวตึ๊ง <br> 006-008 ถนนชายน้ำ ตำบลปากพนัง อำเภอปากพนัง จังหวัดนครศรีธรรมราช 80140 <br>
    เปิดบริการเวลา 08.00น.-19.00น. <br> โทร 075-517-454</div>
    <!--bottom_heading end here-->
    </div>
  <!--grid_12 end here-->
  <div class="clear"></div>
  <!--grid_12 start here-->
  <div class="grid_12">
    <div class="divider"></div>
  </div>
  <!--grid_12 end here-->
  <div class="clear"></div>
  <!--grid_12 start here-->
  <div class="grid_12">
    <!--footer start here-->
    
    <div class="copyright">Copyright©2018 - Pharmacy</div>
    
  </div>
  <!--grid_12 start here-->
  <div class="clear"></div>
</div>
<!--container_12 end here-->
</body>
</html>
