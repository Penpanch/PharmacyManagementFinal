<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Promotion;
use App\BillDetail;
use App\Bill;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use PDF;
use Charts;
use App\query;
use Redirect;
use Validator;
use Session;


class AdminController extends Controller
{
    private $curr_raw_time;
    private $curr_date;
    private $curr_date_time;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set('Asia/Bangkok');
        $this->curr_raw_time = getdate();
        $this->curr_date = $this->curr_raw_time['year'] . '-' . $this->curr_raw_time['mon'] . '-' . $this->curr_raw_time['mday'];
        $this->curr_date_time = $this->curr_raw_time['year'] . '-' . $this->curr_raw_time['mon'] . '-' . $this->curr_raw_time['mday'] . ' ' . $this->curr_raw_time['hours'] . ':' . $this->curr_raw_time['minutes'] . ':' . $this->curr_raw_time['seconds'];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

   
    public function index()
    {
        return view('adminPharmacy.a_home');
    }

    public function indexaboutAd()
    {
        return view('adminPharmacy.a_about');
    }

    public function indexaddpromotionAd()
    {
        return view('adminPharmacy.a_addpromotion');
    }

  

    public function indexadduserAd()
    {
        return view('adminPharmacy.a_adduser');
    }

    public function indexaddstockAd()
    {
        return view('adminPharmacy.a_addstock');
    }

    public function indexchangepassAd()
    {
        return view('adminPharmacy.a_changepass');
    }

    public function indexprofileAd()
    {
        return view('adminPharmacy.a_profile');
    }

    public function promotionAd(){
        $promotions = Promotion::all();
        return view('adminPharmacy.a_promotion', ['promotions' => $promotions]);
    }
    



    public function indexsaleAd()
    {
        return view('adminPharmacy.a_sale');
    }

    public function indexgraphmonthAd()
    {
        // $chart = Charts::database(BillDetail::all(), 'bar', 'highcharts')

        // ->elementLabel("amout")
        // ->dimensions(1000, 500)
        // ->responsive(false)
        // ->groupBy('name');

        // $bills = Bill::where(DB::raw("(DATE_FORMAT(updated_at,'%Y'))"),date('Y'))->get();
        // $chart = Charts::database($bills, 'bar', 'highcharts')
        // ->elementLabel("Total")
        // ->dimensions(1000, 500)
        // ->responsive(false)
        // ->groupByMonth(date('Y'), true);

        // $data = Bill::where('updated_at', '2018-12-10')->get();
        // $chart = Charts::create('line', 'highcharts')
        // ->elementLabel("Total")
        // ->dimensions(1000, 500)
        // ->responsive(false)
        // ->labels($data->pluck('updated_at'))
        // ->values($data->pluck('sum'));

        $chart = Charts::database(Bill::all(), 'bar', 'highcharts')
        ->elementLabel("Total")
        ->dimensions(1000, 500)
        ->responsive(false)
        ->lastByMonth(12, true);

        

        // $data = BillDetail::all();
        // $chart = Charts::create('line', 'highcharts')
        // ->elementLabel("Total")
        // ->dimensions(1000, 500)
        // ->responsive(false)
        // ->labels($data->pluck('name'))
        // ->values($data->pluck('amout'));


        // ->template("material")
        // ->dataset('Element 1', [5,20,100])
        // ->dataset('Element 1', [15,30,80])
        // ->dataset('Element 1', [25,10,40])
        // ->labels(['One', 'Two', 'Three']);

        return view('adminPharmacy.a_graphmonth', ['chart' => $chart]);
    }

    public function indexgraphyearAd()
    {
        // $chart = Charts::database(BillDetail::all(), 'bar', 'highcharts')

        // ->elementLabel("amout")
        // ->dimensions(1000, 500)
        // ->responsive(false)
        // ->groupBy('name');

        // $bills = Bill::where(DB::raw("(DATE_FORMAT(update_at,'%Y'))"),date('Y'))->get();
        // $chart = Charts::database($bills, 'bar', 'highcharts')
        // ->elementLabel("Total")
        // ->dimensions(1000, 500)
        // ->responsive(false)
        // ->groupByMonth(date('Y'), true);

        // $data = Bill::where('updated_at', '2018-12-10')->get();
        // $chart = Charts::create('line', 'highcharts')
        // ->elementLabel("Total")
        // ->dimensions(1000, 500)
        // ->responsive(false)
        // ->labels($data->pluck('updated_at'))
        // ->values($data->pluck('sum'));

        $chart = Charts::database(Bill::all(), 'bar', 'highcharts')
        ->elementLabel("Total")
        ->dimensions(1000, 500)
        ->responsive(false)
        ->lastByYear(6);

        

        // $data = BillDetail::all();
        // $chart = Charts::create('line', 'highcharts')
        // ->elementLabel("Total")
        // ->dimensions(1000, 500)
        // ->responsive(false)
        // ->labels($data->pluck('name'))
        // ->values($data->pluck('amout'));


        // ->template("material")
        // ->dataset('Element 1', [5,20,100])
        // ->dataset('Element 1', [15,30,80])
        // ->dataset('Element 1', [25,10,40])
        // ->labels(['One', 'Two', 'Three']);

        return view('adminPharmacy.a_graphyear', ['chart' => $chart]);
    }

    public function indexstockAd()
    {
        return view('adminPharmacy.a_stock');
    }

    // public function indexreportAd()
    // {
    //     $bill_details = DB::table('bill_details')->paginate(15);
    //     return view('adminPharmacy.a_report', ['bill_details' => $bill_details]);
    // }

    // public function charts()
    // {
    //     $chart = Charts::new('line', 'highcharts')
    //         ->setTitle("My website users")
    //         ->setLabels(["ES", "FR", "RU"])
    //         ->setValues([100,50,25])
    //         ->setElementLabel("Total users");

    //     return view('adminPharmacy.a_graph', ['chart' => $chart]);
    // }

    public function adminAd(){
        $users = User::all();
        return view('adminPharmacy.a_admin', ['users' => $users]);
    }



    

    // //

    public function employAd(){
        $users = User::all();
        return view('adminPharmacy.a_employ', ['users' => $users]);
    }




   

    //user
    public function userAd(){
        $users = User::all();
        return view('adminPharmacy.a_user', ['users' => $users]);
    }



    public function addUser(Request $request){
        $this->validate($request, [
            'code_user' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'role' => 'required',
            'email' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'birth' => 'required',
            'age' => 'required',
            'sex' => 'required',
            'tel' => 'required',
            'disease' => 'required',
            'drug' => 'required'
            // 'size_imguser' => 'required',
             // 'type_imguser' => 'required'
        ]);

        $users = new User;
        $users->code_user = $request->input('code_user');
        $users->name = $request->input('name');
        $users->surname = $request->input('surname');
        $users->role = $request->input('role');
        $users->email = $request->input('email');
        $users->password  = Hash::make($request->input('password'));
        $users->birth = $request->input('birth');
        $users->age = $request->input('age');
        $users->sex = $request->input('sex');
        $users->tel = $request->input('tel');
        $users->disease = $request->input('disease');
        $users->drug = $request->input('drug');
        $users->size_imguser = $request->input('size_imguser');
        $users->type_imguser = $request->input('type_imguser');
        if(Input::hasFile('image')){
            $user=Input::file('image');
            $user->move(public_path(). '/frontend/images/', $user->getClientOriginalName());

            $users->name_imguser = $user->getClientOriginalName();
            $users->size_imguser = $user->getClientsize();
            $users->type_imguser = $user->getClientMimeType();
        }

        $users->save();
            return redirect('/userAd')->with('info', 'User Saved Successfully!');
    }

    public function updateUser($id){
        $users = User::find($id);

        return view('adminPharmacy.a_updateuser', ['users' => $users]);
    }

    public function editUser(Request $request, $id){
        $this->validate($request, [
            'code_user' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            // 'password' => 'required|string|min:6|confirmed',
            'birth' => 'required',
            'age' => 'required',
            'sex' => 'required',
            'tel' => 'required',
            'disease' => 'required',
            'drug' => 'required'
        ]);
        $data = array(
        'code_user' => $request->input('code_user'),
        'name' => $request->input('name'),
        'surname' => $request->input('surname'),
        'name_img' => $request->input('name_img'),
        'email' => $request->input('email'),
        'password'  => Hash::make($request->input('password')),
        'birth' => $request->input('birth'),
        'age' => $request->input('age'),
        'sex' => $request->input('sex'),
        'tel' => $request->input('tel'),
        'disease' => $request->input('disease'),
        'drug' => $request->input('drug'),
        'size_imguser' => $request->input('size_imguser'),
        'type_imguser' => $request->input('type_imguser'),


        );

        User::where('id', $id)->update($data);
        return redirect('/userAd')->with('info', 'User Update Successfully!');
    }

    public function showUser($id){
        $users = User::find($id);

        return view('adminPharmacy.a_showuser', ['users' => $users]);

    }

    public function deleteUser($id){
        User::where('id', $id)
        ->delete();
        return redirect('/userAd')->with('info', 'User Deleted Successfully!');
    }

    public function addpromotion(Request $request){
        $this->validate($request, [
            'description_pro' => 'required',
        ]);

        $promotions = new Promotion;
        $promotions->description_pro = $request->input('description_pro');
        $promotions->size_imgpromotion = $request->input('size_imgpromotion');
        $promotions->type_imgpromotion = $request->input('type_imgprommotion');
        if(Input::hasFile('image')){
            $promotion=Input::file('image');
            $promotion->move(public_path(). '/frontend/images/', $promotion->getClientOriginalName());

            $promotions->name_imgpromotion = $promotion->getClientOriginalName();
            $promotions->size_imgpromotion = $promotion->getClientsize();
            $promotions->type_imgpromotion = $promotion->getClientMimeType();
        }
        $promotions->save();
        return redirect('/promotionAd')->with('info', 'Promotion Saved Successfully!');

    }

 
    public function deletepromotion($id){
        Promotion::where('id', $id)
        ->delete();
        return redirect('/promotionAd')->with('info', 'Promotion Deleted Successfully!');
    }



public function exp() {
        
        $curr_date = $this->curr_raw_time['year'] . '-' . $this->curr_raw_time['mon'] . '-' . $this->curr_raw_time['mday'];
        $ages = DB::table('stocks')
        ->orderBy('exp', 'asc')->get();
        $expire_count = 0;
        $exp = array();
        foreach ($ages as $item) {
            if ((strtotime($item->exp) - strtotime($curr_date)) / (60 * 60 * 24) <= 90) array_push($exp, $item);
        }
        return View('adminPharmacy.a_exp')->with('stocks', $exp);
    }

public function out() {
        
        $out = array();
        $amount = DB::table('stocks')->where('amout', '<', 30)
        ->orderBy('amout', 'asc')->get();
        foreach ($amount as $item) {
            
            array_push($out, $item);
        }
        
        return View('adminPharmacy.a_out')->with('stocks', $out);
    }

    public function topdrug() {
        return View('adminPharmacy.a_top');
    }

    public function topstaff() {
        return View('adminPharmacy.a_topstaff');
    }

    public function topdrug2() {
        $date       = Input::get('keyword') . "%";
        $date_start = substr($date, 0, 8) . "01";
        $date_end   = substr($date, 0, 8) . "31";

        $year = substr($date, 0, 4) . '%';
        $count = 0;
        Session::flash('keyword', Input::get('keyword'));
        Session::flash('range', Input::get('range'));

        if(Input::get('range') == "date"){
            $result = DB::table('bill_details')
                    ->selectRaw('*, sum(amout) as sum_amount, sum(price) as sum_price')
                    ->where('updated_at', 'like', $date)
                    ->groupBy('code')
                    ->orderBy('sum_amount', 'desc')
                    ->orderBy('name')
                    ->paginate(25);
        }

        else if(Input::get('range') == "year"){
            $result = DB::table('bill_details')
                    ->selectRaw('*, sum(amout) as sum_amount, sum(price) as sum_price')
                    ->where('updated_at', 'LIKE', $year)
                    ->groupBy('code')
                    ->orderBy('sum_amount', 'desc')
                    ->orderBy('name')
                    ->paginate(25);

        }
        else if(Input::get('range') == "month") {
            $result = DB::table('bill_details')
                    ->selectRaw('*, sum(amout) as sum_amount, sum(price) as sum_price')
                    ->whereBetween('updated_at', [$date_start, $date_end])
                    ->groupBy('code')
                    ->orderBy('sum_amount', 'desc')
                    ->orderBy('name')
                    ->paginate(25);

        }
         else $result = false;  
         $count = count($result);
        return View('adminPharmacy.a_top',compact('result','count'));
    }
    
    public function topstaff2() {
        $date       = Input::get('keyword') . "%";
        $date_start = substr($date, 0, 8) . "01";
        $date_end   = substr($date, 0, 8) . "31";

        $year = substr($date, 0, 4) . '%';
        $counts = 0;
        Session::flash('keyword', Input::get('keyword'));
        Session::flash('range', Input::get('range'));
        if(Input::get('range') == "date")
            $results = DB::table('bills')
                    ->selectRaw('*, sum(sum) as sum_sum')
                    ->where('updated_at', 'like', $date)
                    ->groupBy('staff')
                    ->orderBy('sum_sum', 'desc')
                    ->orderBy('updated_at')
                    ->paginate(25);

        else if(Input::get('range') == "year")
            $results = DB::table('bills')
                    ->selectRaw('*, sum(sum) as sum_sum')
                    ->where('updated_at', 'LIKE', $year)
                    ->groupBy('staff')
                    ->orderBy('sum_sum', 'desc')
                    ->orderBy('updated_at')
                    ->paginate(25);
            

        else if(Input::get('range') == "month") 
            $results = DB::table('bills')
                    ->selectRaw('*, sum(sum) as sum_sum')
                    ->whereBetween('updated_at', [$date_start, $date_end])
                    ->groupBy('staff')
                    ->orderBy('sum_sum', 'desc')
                    ->orderBy('updated_at')
                    ->paginate(25);

        $counts = count($results);
        return View('adminPharmacy.a_topstaff')->with('results', $results);
    }

    public function reportAd() {
        return View('adminPharmacy.a_report');
    }

    public function pdf()
    {
        $bill_details = BillDetail::all();
        $pdf = PDF::loadView('adminPharmacy.pdf', ['bill_details' => $bill_details]);
        return $pdf->stream();
    }
    // public function pdf()
    // {
    //     $date       = Input::get('keyword') . "%";
    //     $date_start = substr($date, 0, 8) . "01";
    //     $date_end   = substr($date, 0, 8) . "31";

    //     $year = substr($date, 0, 4) . '%';
    //     $count = 0;
    //     Session::flash('keyword', Input::get('keyword'));
    //     Session::flash('range', Input::get('range'));

    //     if(Input::get('range') == "date"){
    //         $result = DB::table('bill_details')
    //                 ->selectRaw('*, sum(amout) as sum_amount')
    //                 ->where('updated_at', 'like', $date)
    //                 ->groupBy('id')
    //                 ->orderBy('bill_id')
    //                 ->orderBy('updated_at', 'asc')
    //                 ->paginate(25);
    //     }

    //     else if(Input::get('range') == "year"){
    //         $result = DB::table('bill_details')
    //                 ->selectRaw('*, sum(amout) as sum_amount')
    //                 ->where('updated_at', 'LIKE', $year)
    //                 ->groupBy('id')
    //                 ->orderBy('bill_id')
    //                 ->orderBy('updated_at', 'asc')
    //                 ->paginate(25);

    //     }
    //     else if(Input::get('range') == "month") {
    //         $result = DB::table('bill_details')
    //                 ->selectRaw('*, sum(amout) as sum_amount')
    //                 ->whereBetween('updated_at', [$date_start, $date_end])
    //                 ->groupBy('id')
    //                 ->orderBy('bill_id')
    //                 ->orderBy('updated_at', 'asc')
    //                 ->paginate(25);

    //     }
    //      else $result = false;  
         
    //      $pdf = PDF::loadView('adminPharmacy.pdf',compact('result','count'));
    //      $count = count($result);
    //     return $pdf->stream();
    // }

    public function pdfdown()
    {
        $bill_details = BillDetail::all();
        $pdf = PDF::loadView('adminPharmacy.pdf', ['bill_details' => $bill_details]);
        return $pdf->download('report.pdf');
    }

    public function reportAd2() {
        $date       = Input::get('keyword') . "%";
        $date_start = substr($date, 0, 8) . "01";
        $date_end   = substr($date, 0, 8) . "31";

        $year = substr($date, 0, 4) . '%';
        $count = 0;
        Session::flash('keyword', Input::get('keyword'));
        Session::flash('range', Input::get('range'));

        if(Input::get('range') == "date"){
            $result = DB::table('bill_details')
                    ->selectRaw('*, sum(amout) as sum_amount')
                    ->where('updated_at', 'like', $date)
                    ->groupBy('id')
                    ->orderBy('bill_id')
                    ->orderBy('updated_at', 'asc')
                    ->paginate(25);
        }

        else if(Input::get('range') == "year"){
            $result = DB::table('bill_details')
                    ->selectRaw('*, sum(amout) as sum_amount')
                    ->where('updated_at', 'LIKE', $year)
                    ->groupBy('id')
                    ->orderBy('bill_id')
                    ->orderBy('updated_at', 'asc')
                    ->paginate(25);

        }
        else if(Input::get('range') == "month") {
            $result = DB::table('bill_details')
                    ->selectRaw('*, sum(amout) as sum_amount')
                    ->whereBetween('updated_at', [$date_start, $date_end])
                    ->groupBy('id')
                    ->orderBy('bill_id')
                    ->orderBy('updated_at', 'asc')
                    ->paginate(25);

        }
         else $result = false;  
         $count = count($result);
        return View('adminPharmacy.a_report',compact('result','count'));
    }

}
