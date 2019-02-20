<!DOCTYPE html>
<html>
<head>
    <title>สรุปรายงานการซื้อ-ขายยา</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }
 
        body {
            font-family: "THSarabunNew";
        }
    </style>
</head>
<body>
    <h1>สรุปรายงานการซื้อ-ขายยา</h1>

<div>
    <div class="panel panel-primary">
        <div class="panel-body">
        <br><br>
            <table class="table table-striped table-hover">
                 <thead>
                    <tr>
                        <th><center>วันที่ขาย</center></th>
                        <th><center>บิลที่</center></th>
                        <th><center>รหัสยา</center></th>
                        <th><center>ชื่อยา</center></th>
                        <th><center>จำนวนที่ซื้อ</center></th>
                        <th><center>ราคา/หน่วย</center></th>
                        <th><center>ราคารวม</center></th>
                        
                        
                       
                    </tr>
                </thead>
                <tbody>
                    
    @foreach($bill_details as $bill_detail)
          <tr class="table-active">
            <td><center>{{ $bill_detail->updated_at }}</center></td>
            <td><center>{{ $bill_detail->bill_id }}<center></td>
            <td><center>{{ $bill_detail->code }}<center></td>
            <td><center>{{ $bill_detail->name }}<center></td>
            <td><center>{{ $bill_detail->amout }}<center></td>
            <td><center>{{ $bill_detail->price }}<center></td>
            <td><center>{{$bill_detail->amout * $bill_detail->price }}</center></td>
            
          </tr>
    @endforeach
                </tbody>
            </table><center>
            <div class="pagination"></div></center>
        </div>
    </div>
  </div>

  </body>
</html>