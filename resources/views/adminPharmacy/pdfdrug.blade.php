<!DOCTYPE html>
<html>
<head>
    <title>รายการยา</title>
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
    <h1>รายการยา</h1>

<div>
    <div class="panel panel-primary">
        <div class="panel-body">
        <br><br>
            <table class="table table-striped table-hover">
                 <thead>
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
                    
    @foreach($stocks as $stock)
          <tr class="table-active">
            <td>{{ $stock->code }}</a></td>
            <td>{{ $stock->name }}</td>
            <td>{{ $stock->size }}</td>
            <td>{{ $stock->type }}</td>
            <td>{{ $stock->groups }}</td>
            <td>{{ $stock->price }}</td>
            <td>{{ $stock->amout }}</td>
            <td>{{ $stock->unit }}</td>
            
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