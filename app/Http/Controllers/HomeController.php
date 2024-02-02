<?php

namespace App\Http\Controllers;

use App\Models\SprintTask;
use DateTime;
use DateTimeZone;

use App\Models\MerchantId;
use App\Models\RouteHistory;

use Illuminate\Http\Request;

use Illuminate\Support\Carbon;

use App\Models\SprintConfirmation;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input\Input;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
// get index page
   public function index()
   {
       return view('website.index');
   }

   public function index2()
   {
        return view('website.index-main');
   }

   public function clients()
    {
        return view('website.clients');
    }
   public function home()
   {
       return view('home');
   }

   public function joey()
    {
        return view('website.joey');
    }

// get login page
//    public function login()
//    {
//        return view('website.login');
//    }
// get signup page
//    public function signup()
//    {
//        return view('website.signup');
//    }
// get service_detail page
   public function service_detail()
   {
       return view('website.service-detail');
   }

   // get service_detail page
   public function clientIndex()
   {
       return view('website.clients');
   }
// get industries page
   public function industries()
   {
       return view('website.industries');
   }
// get about page
   public function about()
   {
       return view('website.about');
   }
// get announcment page
   public function announcements()
   {
       return view('website.announcements');
   }
// get testimonal page
   public function testimonials()
   {
       return view('website.testimonials');
   }
// get career page
   public function careers()
   {
       return view('website.careers');
   }
// get privacy page
   public function privacy()
   {
       return view('website.privacy');
   }
// get terms page
   public function terms()
   {
       return view('website.terms');
   }
// get become a joey page
   public function become_joey()
   {
        return view('website.become-joey');
   }
// get become joey success page
   public function become_joey_success()
   {
       return view('website.become-joey-success');
   }
   public function job_detail()
   {
        return view('website.job-details');
   }

   public function book_demo(Request $request)
   {
       $data=$request->all();
       // print_r($data);
       $first_name=$data['first_name']??'';
       $last_name=$data['last_name']??'';
       $maildata['name']= $first_name.' '. $last_name;
       $maildata['email']=$data['email']??'';
       $maildata['phone']=$data['phone']??'';
       $maildata['msg']=$data['message']??'';
       $bg_img = 'background-image:url(' . url("/images/icon/joeyco_icon.png") . ');';
       $bg_img = trim($bg_img);
       $style = "font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';color: black !important;";
       $style1 = "font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';";
       $body = '<div class="row" style=" width: 32%;margin: 0 AUTO;">
               <div style="text-align: center;
       background-color: lightgrey;"><img src="' . url('/') . '/images/icon/logo.png" alt="Web Builder" class="img-responsive" style="margin:0 auto; width:150px;" /></div>
                   <div style="' . $bg_img . '
       background-size: contain;
       background-repeat: no-repeat;
       background-position: center;">
                 <h1 style="'.$style.'">Hi,  JoeyCo  !</h1>
               <p style="'.$style.'">'.$maildata['msg'].'</p>
               <p style="margin: 0px;">Regards</p>
               <p style="margin: 0px;">Name: '.$maildata['name'].' </p><p style="margin: 0px;">Email: '.$maildata['email'].' </p><p style="margin: 0px;">Phone: '.$maildata['phone'].' </p>
               <br/>
               </div>
                <div style="background-color: lightgrey;padding: 5px;">
       <p style="padding-bottom: -1px;margin: 0px;margin-left: 20px;'.$style.'">JoeyCo Inc.</p>
       <p style="margin-top: 0x;margin: 0px;margin-left: 20px;'.$style.'">16 Four Seasons Pl., Etobicoke, ON M9B 6E5</p>
       <p style="margin: 0px;margin-left: 20px;'.$style.'">+1 (855) 556-3926 · support@joeyco.com </p>
       </div>
               </div>
               ';
       Mail::send([], [], function ($message) use($maildata,$body){
           $message->to('sales@joeyco.com')
             ->subject('Request A Demo')
             ->setBody($body, 'text/html');
           //   ->setBody('<h1>Details</h1>', 'text/html') // for HTML rich messages
           //   ->setBody('<p>Name: '.$maildata['name'].' </p><p>Email: '.$maildata['email'].' </p><p>Phone: '.$maildata['phone'].' </p><p>Message: '.$maildata['msg'].' </p>', 'text/html');
       });
         return redirect('/book-demo/success');
   }

    public function book_demo_success($code=null)
    {

        if(request()->segment(count(request()->segments()))=='success'){
            return view('website.demo-success');
        }
        else{
            return redirect('/');
        }
    }

    public function track_order_get(Request $request)
    {
        $request->validate([
            'trackingId' => 'required',
        ]);
        $track_id=$request->input('trackingId');
        return  redirect('track-order/'.$track_id);
    }

// get tracking order page and order details
public function track_order($track_id)
{
    date_default_timezone_set('America/Toronto');


    if($track_id!=null){


        $merchantid=MerchantId::where('tracking_id',$track_id)->orderBy('id', 'desc')->whereNull('deleted_at')->first();


        if(!empty($merchantid)){ //if tracking id found
            $response['tracking_id']=$track_id;


            if(!empty($merchantid->sprintTaskDetail->sprintReattemptDetail)){

                $reattempt_sprint_task_histories=$merchantid->sprintTaskDetail->sprintReattemptDetail->sprintTaskHistoryDetails;

                $return_history=[];

                if(count($reattempt_sprint_task_histories)>0){


                    $count_for_first_confiramtion=0;
                    foreach($reattempt_sprint_task_histories as $reattempt_sprint_task_history){
                        $s_id=$reattempt_sprint_task_history->status_id;

                        if($s_id==13){//at hub processing
                            $return_history[0][$count_for_first_confiramtion]['attempt']=1;
                            $return_history[0][$count_for_first_confiramtion]['status_id']=$s_id;
                            $return_history[0][$count_for_first_confiramtion]['status_msg']="At Hub Processing - Reattempt";
                            $return_history[0][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                            $return_history[0][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                        }
                        elseif($s_id==61){//order at store

                            $response['order_confirmed_date']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                            $response['order_confirmed_time']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');

                            // $return_history[0][$count_for_first_confiramtion]['count']=0;
                            $return_history[0][$count_for_first_confiramtion]['attempt']=1;
                            $return_history[0][$count_for_first_confiramtion]['status_id']=$s_id;
                            $return_history[0][$count_for_first_confiramtion]['status_msg']="Order At Store";
                            $return_history[0][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                            $return_history[0][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                        }
                        elseif($s_id==121){//out for delivery

                            $return_history[0][$count_for_first_confiramtion]['attempt']=1;
                            $return_history[0][$count_for_first_confiramtion]['status_id']=$s_id;
                            $return_history[0][$count_for_first_confiramtion]['status_msg']="Out For Delivery";
                            $return_history[0][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                            $return_history[0][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                        }
                        elseif($s_id==124){//at hub processing

                            $return_history[0][$count_for_first_confiramtion]['attempt']=1;
                            $return_history[0][$count_for_first_confiramtion]['status_id']=$s_id;
                            $return_history[0][$count_for_first_confiramtion]['status_msg']="At Hub Processing";
                            $return_history[0][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                            $return_history[0][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');

                        }
                        elseif($s_id==125){//pickup at store
                            // if($return_history[0]['count']<50){$return_history[0]['count']=50;}
                            $return_history[0][$count_for_first_confiramtion]['status_msg']="Pickup At Store";
                            // $return_history[0][$count_for_first_confiramtion]['count']=0;
                            $return_history[0][$count_for_first_confiramtion]['attempt']=1;
                            $return_history[0][$count_for_first_confiramtion]['status_id']=$s_id;
                            $return_history[0][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                            $return_history[0][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');

                        }
                        elseif($s_id==133){//packages sorted
                            // if($return_history[0]['count']<50){$return_history[0]['count']=50;}
                            // $return_history[0][$count_for_first_confiramtion]['count']=0;
                            $return_history[0][$count_for_first_confiramtion]['attempt']=1;
                            $return_history[0][$count_for_first_confiramtion]['status_id']=$s_id;
                            $return_history[0][$count_for_first_confiramtion]['status_msg']="Packages Sorted";
                            $return_history[0][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                            $return_history[0][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');

                        }

                        // if($s_id==114 ||$s_id==113 || $s_id==116 || $s_id==17){//successfully delivered at door,successfully hand delivered,successfully delivered to neighbour,successfully delivered
                        //     //    if($return_history[0]['count']<100){$return_history[0]['count']=100;}
                        //     $return_history[0][17]['time']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                        //    $return_history[0][17]['date']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                        //     $return_history[0]['success_message']= $this->statusmap($s_id);
                        //     if(!empty($reattempt_sprint_task_history->getSprintConfirmationDetail)){
                        //      $return_history[0]['attachment']= $reattempt_sprint_task_history->getSprintConfirmationDetail->attachment_path;
                        //     }
                        // }
                        else{
                            //  $return_history[0][$count_for_first_confiramtion]['count']=0;
                            $return_history[0][$count_for_first_confiramtion]['attempt']=1;
                            $return_history[0][$count_for_first_confiramtion]['status_id']=$s_id;
                            $return_history[0][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                           $return_history[0][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                            $return_history[0][$count_for_first_confiramtion]['status_msg']= $this->statusmap($s_id);
                            if(!empty($reattempt_sprint_task_history->getSprintConfirmationDetail)){
                             $return_history[0][$count_for_first_confiramtion]['attachment']= $reattempt_sprint_task_history->getSprintConfirmationDetail->attachment_path??'';
                             $response['reattempt_first_attachment']= $reattempt_sprint_task_history->getSprintConfirmationDetail->attachment_path??'';
                            }
                        }
                        $count_for_first_confiramtion++;
                    }
                }

                if(!empty($merchantid->sprintTaskDetail->sprintReattemptDetail->getReattempt->sprint_id)){


                    // $reattempt_second_task_history=DB::table('sprint__tasks_history')->where('sprint_id',$merchantid->sprintTaskDetail->sprintReattemptDetail->getReattempt->reattempt_of)->get();
                    $reattempt_second_task_history=$merchantid->sprintTaskDetail->sprintReattemptDetail->getReattempt->sprintTaskHistoryDetails;
                    // print_r($merchantid->sprintTaskDetail->sprintReattemptDetail->getReattempt);die;
                    if(count($reattempt_second_task_history)>0){
                        $response['order_confirmed_date']=$this->ConvertTimeZone($merchantid->sprintTaskDetail->sprintReattemptDetail->getReattempt->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                        $response['order_confirmed_time']=$this->ConvertTimeZone($merchantid->sprintTaskDetail->sprintReattemptDetail->getReattempt->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                        // echo 1;die;
                        // $return_history[1]['count']=0;
                        // $return_history[1]['attempt']=2;
                        $count_for_first_confiramtion=0;
                        foreach($reattempt_second_task_history as $reattempt_second_sprint_task_history){

                            $s_id=$reattempt_second_sprint_task_history->status_id;

                            // if($s_id==125){//order at store
                            //     if($return_history[1]['count']<25){$return_history[1]['count']=25;}
                            //     $return_history[1][$s_id]['time']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','H:i:s');
                            //     $return_history[1][$s_id]['date']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','Y-m-d');
                            // }
                            // if($s_id==133){//packages sorted
                            //     if($return_history[1]['count']<50){$return_history[1]['count']=50;}
                            //     $return_history[1][$s_id]['time']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','H:i:s');
                            //     $return_history[1][$s_id]['date']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','Y-m-d');

                            // }
                            // if($s_id==121){//out for delivery
                            //   if($return_history[1]['count']<75){$return_history[1]['count']=75;}
                            //   $return_history[1][$s_id]['time']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','H:i:s');
                            //   $return_history[1][$s_id]['date']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','Y-m-d');
                            // }
                            // if($s_id==114 ||$s_id==113 || $s_id==116 || $s_id==17){//successfully delivered at door,successfully hand delivered,successfully delivered to neighbour,successfully delivered
                            //    if($return_history[1]['count']<100){$return_history[1]['count']=100;}
                            //     $return_history[1][17]['time']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','H:i:s');
                            //    $return_history[1][17]['date']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','Y-m-d');
                            //     $return_history[1]['success_message']= $this->statusmap($s_id);
                            //     if(!empty($reattempt_second_sprint_task_history->getSprintConfirmationDetail)){
                            //     $return_history[1]['attachment']= $reattempt_second_sprint_task_history->getSprintConfirmationDetail->attachment_path;
                            //     }
                            // }



                            if($s_id==13){//at hub processing
                                // if($return_history[0]['count']<25){$return_history[0]['count']=25;}
                                // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                $return_history[1][$count_for_first_confiramtion]['attempt']=2;
                                $return_history[1][$count_for_first_confiramtion]['status_id']=$s_id;
                                $return_history[1][$count_for_first_confiramtion]['status_msg']="At Hub Processing - Reattempt";
                                $return_history[1][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                                $return_history[1][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                            }
                            if($s_id==61){//order at store
                                // if($return_history[1]['count']<25){$return_history[1]['count']=25;}
                                // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                $response['order_confirmed_date']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                                $response['order_confirmed_time']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');

                                $return_history[1][$count_for_first_confiramtion]['attempt']=2;
                                $return_history[1][$count_for_first_confiramtion]['status_id']=$s_id;
                                $return_history[1][$count_for_first_confiramtion]['status_msg']="Order At Store";
                                $return_history[1][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                                $return_history[1][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                            }
                            if($s_id==121){//out for delivery
                                //   if($return_history[1]['count']<75){$return_history[1]['count']=75;}
                                // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                $return_history[1][$count_for_first_confiramtion]['attempt']=2;
                                $return_history[1][$count_for_first_confiramtion]['status_id']=$s_id;
                                $return_history[1][$count_for_first_confiramtion]['status_msg']="Out For Delivery";
                                $return_history[1][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                                $return_history[1][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                            }
                            if($s_id==124){//at hub processing
                                // if($return_history[1]['count']<50){$return_history[1]['count']=50;}
                                // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                $return_history[1][$count_for_first_confiramtion]['attempt']=2;
                                $return_history[1][$count_for_first_confiramtion]['status_id']=$s_id;
                                $return_history[1][$count_for_first_confiramtion]['status_msg']="At Hub Processing";
                                $return_history[1][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                                $return_history[1][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');

                            }
                            if($s_id==125){//pickup at store
                                // if($return_history[1]['count']<50){$return_history[1]['count']=50;}
                                // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                $return_history[1][$count_for_first_confiramtion]['attempt']=2;
                                $return_history[1][$count_for_first_confiramtion]['status_id']=$s_id;
                                $return_history[1][$count_for_first_confiramtion]['status_msg']="Pickup At Store";
                                $return_history[1][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                                $return_history[1][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');

                            }
                            if($s_id==133){//packages sorted
                                // if($return_history[1]['count']<50){$return_history[1]['count']=50;}
                                // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                $return_history[1][$count_for_first_confiramtion]['attempt']=2;
                                $return_history[1][$count_for_first_confiramtion]['status_id']=$s_id;
                                $return_history[1][$count_for_first_confiramtion]['status_msg']="Packages Sorted";
                                $return_history[1][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                                $return_history[1][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');

                            }

                            // if($s_id==114 ||$s_id==113 || $s_id==116 || $s_id==17){//successfully delivered at door,successfully hand delivered,successfully delivered to neighbour,successfully delivered
                            //     //    if($return_history[1]['count']<100){$return_history[1]['count']=100;}
                            //     $return_history[1][17]['time']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                            //    $return_history[1][17]['date']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                            //     $return_history[1]['success_message']= $this->statusmap($s_id);
                            //     if(!empty($reattempt_second_sprint_task_history->getSprintConfirmationDetail)){
                            //      $return_history[1]['attachment']= $reattempt_second_sprint_task_history->getSprintConfirmationDetail->attachment_path;
                            //     }
                            // }
                            else{
                                // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                $return_history[1][$count_for_first_confiramtion]['attempt']=2;
                                $return_history[1][$count_for_first_confiramtion]['status_id']=$s_id;
                                $return_history[1][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                                $return_history[1][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                                $return_history[1][$count_for_first_confiramtion]['status_msg']= $this->statusmap($s_id);
                                if(!empty($reattempt_second_sprint_task_history->getSprintConfirmationDetail)){
                                 $return_history[1][$count_for_first_confiramtion]['attachment']= $reattempt_second_sprint_task_history->getSprintConfirmationDetail->attachment_path??'';
                                 $response['reattempt_second_attachment']= $reattempt_sprint_task_history->getSprintConfirmationDetail->attachment_path??'';
                                }
                            }
                            $count_for_first_confiramtion++;




                        }



                    }
                }
                if(isset($return_history)){
                    if(!empty($return_history)){
                        if(count($return_history)>1){
                            $return_history=array_reverse($return_history);
                        }
                    }
                }

                $response['return_history']=$return_history;

            }


            if(isset($merchantid->sprintConfirmationDetail->joeyInfo)){
                $response['joey_name']=$merchantid->sprintConfirmationDetail->joeyInfo->first_name.' '.$merchantid->sprintConfirmationDetail->joeyInfo->last_name;
                $response['joey_image']=$merchantid->sprintConfirmationDetail->joeyInfo->image;
                if(isset($merchantid->sprintConfirmationDetail->joeyInfo->joeyLocationDetail)){
                $response['joey_lat']=$merchantid->sprintConfirmationDetail->joeyInfo->joeyLocationDetail->latitude;
                $response['joey_long']=$merchantid->sprintConfirmationDetail->joeyInfo->joeyLocationDetail->longitude;

                }
                else{
                    $response['joey_lat']=0;
                    $response['joey_long']=0;
                }
                $response['joey_lat'] =(float)substr_replace($response['joey_lat'], '.', 2, 0);



                if(isset($response['joey_long'])){if (strlen($response['joey_long']) >= 9){

                    $response['joey_long'] = (float)substr_replace($response['joey_long'], '.', 4, 0);

                }
                else {
                    $response['joey_long'] =(float)substr_replace($response['joey_long'], '.', 3, 0);

                }}

                $response['joey_phone']=$merchantid->sprintConfirmationDetail->joeyInfo->phone;
               // $response['assigned_to_joey_date']=0;
               // $response['assigned_to_joey_time']=0;
               //print_r($merchantid->joeyRouteLocationDetail);
               //print_r($merchantid->joeyRouteLocationDetail->joeyRouteDetail);
               //die();

            }


            if(!empty($merchantid->joeyRouteLocationDetail->joeyRouteDetail)){
                if ($merchantid->joeyRouteLocationDetail->joeyRouteDetail->date!=null) {
                    // $response['assigned_to_joey_date']=$this->ConvertTimeZone( $merchantid->joeyRouteLocationDetail->joeyRouteDetail->date,"UTC",'America/Toronto','Y-m-d');
                    // $response['assigned_to_joey_time']=$this->ConvertTimeZone( $merchantid->joeyRouteLocationDetail->joeyRouteDetail->date,"UTC",'America/Toronto','H:i:s');
                    if (isset($merchantid->joeyRouteLocationDetail->routeHistory[0])) {
                    $response['assigned_to_joey_date']= $this->ConvertTimeZone($merchantid->joeyRouteLocationDetail->routeHistory[0]->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                    $response['assigned_to_joey_time']= $this->ConvertTimeZone($merchantid->joeyRouteLocationDetail->routeHistory[0]->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                    }
                }
            }
            if(!empty($merchantid->joeyRouteLocationDetail->routeHistory)){



                $joeyDateTime=[];
                if(isset($merchantid->joeyRouteLocationDetail->routeHistory[0]->joey_id)){

                    $joey_fname=$merchantid->joeyRouteLocationDetail->routeHistory[0]->getJoey->first_name??'';
                    $joey_lname=$merchantid->joeyRouteLocationDetail->routeHistory[0]->getJoey->last_name??'';
                    $response['joey_name']=$joey_fname.' '.$joey_lname;
                    $response['joey_image']=$merchantid->joeyRouteLocationDetail->routeHistory[0]->getJoey->image??'';

                    $joeyDateTime=RouteHistory::where('joey_id',$merchantid->joeyRouteLocationDetail->routeHistory[0]->joey_id)->where('route_id',$merchantid->joeyRouteLocationDetail->routeHistory[0]->route_id)->whereIn("status",[0,1])->orderBy('id',"DESC")->first();
                }
                if(!empty($joeyDateTime)){
                    $response['assigned_to_joey_date']= $this->ConvertTimeZone($joeyDateTime->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                    $response['assigned_to_joey_time']= $this->ConvertTimeZone($joeyDateTime->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                }
            }


            if (isset($merchantid->address_line2))
            {
                $response['cityname'] = $merchantid->sprintTaskDetail->locationDetail->cityDetail->name ?? '';
                $response['delivery_address'] = $merchantid->address_line2 ?? '';
            }
            elseif (isset($merchantid->sprintTaskDetail->locationDetail)) {
                $response['cityname'] = $merchantid->sprintTaskDetail->locationDetail->cityDetail->name ?? '';
                $response['delivery_address'] = $merchantid->sprintTaskDetail->locationDetail->address ?? '';
            }


           // print_r($response);die();

            $laststatus=$merchantid->sprintTaskDetail->sprintTaskHistoryDetailData;

            $laststatus_key=$merchantid->sprintTaskDetail->sprintTaskHistoryDetailData[count($laststatus)-1]->status_id;
         //    print_r($merchantid->sprintTaskDetail->sprintTaskHistoryDetailData);die;
            // $laststatus_key=17;
            $vendor_check=$merchantid->sprintTaskDetail->sprintDetail->creator_id;
            $response['vendor_id'] = $vendor_check;
            foreach ($merchantid->sprintTaskDetail->sprintTaskHistoryDetailData as $sprintTaskHistoryDetailvalue) {

                if($vendor_check==477260 || $vendor_check==477282 || $vendor_check==476592){

                    if($sprintTaskHistoryDetailvalue['status_id']==133 || $sprintTaskHistoryDetailvalue['status_id']==13){ // processing
                        $response['processing_date']=$this->ConvertTimeZone( $sprintTaskHistoryDetailvalue->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                        $response['processing_time']=$this->ConvertTimeZone( $sprintTaskHistoryDetailvalue->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                    }

                }
                else{
                    if($sprintTaskHistoryDetailvalue['status_id']==124 ||$sprintTaskHistoryDetailvalue['status_id']==13){ // processing
                        $response['processing_date']=$this->ConvertTimeZone( $sprintTaskHistoryDetailvalue->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                        $response['processing_time']=$this->ConvertTimeZone( $sprintTaskHistoryDetailvalue->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                    }
                }

                 if($sprintTaskHistoryDetailvalue['status_id']==121){ //out for delivery //101 previous
                     $response['out_for_delivery_date']=$this->ConvertTimeZone( $sprintTaskHistoryDetailvalue->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                     $response['out_for_delivery_time']=$this->ConvertTimeZone( $sprintTaskHistoryDetailvalue->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                 }
                 if($sprintTaskHistoryDetailvalue['status_id']==17 || $sprintTaskHistoryDetailvalue['status_id']==113 ||$sprintTaskHistoryDetailvalue['status_id']==114 ||$sprintTaskHistoryDetailvalue['status_id']==116 ||$sprintTaskHistoryDetailvalue['status_id']==117 ||$sprintTaskHistoryDetailvalue['status_id']==118 ||$sprintTaskHistoryDetailvalue['status_id']==132 ||$sprintTaskHistoryDetailvalue['status_id']==138 ||$sprintTaskHistoryDetailvalue['status_id']==139||$sprintTaskHistoryDetailvalue['status_id']==144){ //completed
                     $response['delivered_success_message']= $this->statusmap($laststatus_key);
                 }

            }

            $count=0;

            if($laststatus_key==61 || $laststatus_key==125){ // order approved
                $count=20;
            }
            if($laststatus_key==133 ||$laststatus_key==124 ||$laststatus_key==13){ // processing
                $count=40;
            }
         //    if($laststatus_key==121){ //assigned to joey
            //  if(isset($merchantid->joeyRouteLocationDetail->joeyRouteDetail->created_at)){
            if(isset($response['assigned_to_joey_date'])){
                $count=60;
            }
            if($laststatus_key==121){ //out for delivery //101 previous
                $count=80;
            }
            if($laststatus_key==113 ||$laststatus_key==114 ||$laststatus_key==116 ||$laststatus_key==117 ||$laststatus_key==118 ||$laststatus_key==132 ||$laststatus_key==138 ||$laststatus_key==139||$laststatus_key==144){ //completed
                $response['completed_date']=$this->ConvertTimeZone( $merchantid->sprintTaskDetail->sprintTaskHistoryDetailData[count($laststatus)-1]->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                $response['completed_time']=$this->ConvertTimeZone( $merchantid->sprintTaskDetail->sprintTaskHistoryDetailData[count($laststatus)-1]->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                $count=100;

                $response['joey_lat'] =(float)substr_replace($merchantid->sprintTaskDetail->locationDetail->latitude, '.', 2, 0);

                if(isset($response['joey_long'])){ if (strlen($response['joey_long']) >= 9){

                    $response['joey_long'] = (float)substr_replace($merchantid->sprintTaskDetail->locationDetail->longitude, '.', 4, 0);

                }
                else {
                    $response['joey_long'] =(float)substr_replace($merchantid->sprintTaskDetail->locationDetail->longitude, '.', 3, 0);

                }
                }

            }

            if(in_array($laststatus_key,[101,102,103,104,105,106,107,108,109,110,111,112,155,131,135,136,140,145])){ //returned
                $response['completed_date']=$this->ConvertTimeZone( $merchantid->sprintTaskDetail->sprintTaskHistoryDetailData[count($laststatus)-1]->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                $response['completed_time']=$this->ConvertTimeZone( $merchantid->sprintTaskDetail->sprintTaskHistoryDetailData[count($laststatus)-1]->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                $count=101;
                $response['delivered_success_message']= $this->statusmap($laststatus_key);

            }

         //    echo $merchantid->sprintTaskDetail->sprintTaskHistoryDetailData[count($laststatus)-1]->id;die;
            $response['latest_status_count']=$count;

            // $response['customer_lat']=$merchantid->sprintTaskDetail->locationDetail->latitude;
            // $response['customer_long']=$merchantid->sprintTaskDetail->locationDetail->longitude;





            $response['instructions']='No Instructions found';
            if(!empty($merchantid->sprintTaskDetail->description)){
             $response['instructions']=$merchantid->sprintTaskDetail->description;
            }

            if(!isset($response['order_confirmed_date'])){
                $response['order_confirmed_date']=$this->ConvertTimeZone($merchantid->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                $response['order_confirmed_time']=$this->ConvertTimeZone($merchantid->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
            }

            // merchant se task id lkr task se sprint id lkr sprint reattempt me check kro


            // echo $merchantid->sprintTaskDetail->id;die;
            $expected_date='';
            $response['is_amazon']=0;
            // echo $merchantid->sprintTaskDetail->id;die;
            $vendor_check=$merchantid->sprintTaskDetail->sprintDetail->creator_id;
            if($vendor_check==477260 || $vendor_check==477282  || $vendor_check==476592){

                // echo 1;die;
                $response['is_amazon']=1;
                // $expected_date=date('Y-m-d H:i:s', strtotime($this->ConvertTimeZone($merchantid->created_at->toDateTimeString(),"UTC",'America/Toronto'). ' +1 day'));
                $amazon_sprint_task_histories=$merchantid->sprintTaskDetail->sprintTaskHistoryDetailData;
                if(!empty($amazon_sprint_task_histories)){
                    foreach ($amazon_sprint_task_histories as $amazon_sprint_task_history) {
                        if($amazon_sprint_task_history->status_id==13){
                            $expected_date=date('Y-m-d H:i:s', strtotime($this->ConvertTimeZone($amazon_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto'). ' +1 day'));
                        }
                    }
                    if($expected_date==''){
                        foreach ($amazon_sprint_task_histories as $amazon_sprint_task_history) {
                            if($amazon_sprint_task_history->status_id==61){
                                $expected_date=date('Y-m-d H:i:s', strtotime($this->ConvertTimeZone($amazon_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto'). ' +1 day'));

                            }
                        }
                    }
                }


            }else{
                // echo 2;die;

                // $expected_date=date('Y-m-d H:i:s', strtotime($this->ConvertTimeZone($merchantid->created_at->toDateTimeString(),"UTC",'America/Toronto'). ' +1 day'));
                $other_sprint_task_histories=$merchantid->sprintTaskDetail->sprintTaskHistoryDetailData;
                if(!empty($other_sprint_task_histories)){
                    foreach ($other_sprint_task_histories as $other_sprint_task_history) {
                        if($other_sprint_task_history->status_id==125){
                            $expected_date=date('Y-m-d H:i:s', strtotime($this->ConvertTimeZone($other_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto'). ' +1 day'));
                        }
                    }
                    if($expected_date==''){
                        foreach ($other_sprint_task_histories as $other_sprint_task_history) {
                            if($other_sprint_task_history->status_id==133){
                                $expected_date=date('Y-m-d H:i:s', strtotime($this->ConvertTimeZone($other_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto'). ' +1 day'));

                            }
                        }
                    }

                }


            }

            if($expected_date!='' || $expected_date!=null){
                $response['expected_date'] = date("Y-m-d",strtotime($expected_date));
                $response['expected_time'] ="21:00:00";
            }
            if(!empty($merchantid->sprintConfirmationDetail)){
                $response['current_attachment']=$merchantid->sprintConfirmationDetail->attachment_path;
            }

            return view('website.track-order-new')->with('data',$response);


        }
        else{ //if tracking id not found
             return view('website.no-orders-found')->with('track_id',$track_id);
        }

    }


}

public function track_order_ajax(Request $request)
{
    date_default_timezone_set('America/Toronto');

    $request->validate([
        'trackingId' => 'required',
    ]);
    $track_id=$request->input('trackingId');

    if($track_id!=null){


        $merchantid=MerchantId::where('tracking_id',$track_id)->first();


        if(!empty($merchantid)){ //if tracking id found
            $response['tracking_id']=$track_id;


            if(!empty($merchantid->sprintTaskDetail->sprintReattemptDetail)){

                $reattempt_sprint_task_histories=$merchantid->sprintTaskDetail->sprintReattemptDetail->sprintTaskHistoryDetails;

                $return_history=[];

                if(count($reattempt_sprint_task_histories)>0){


                    $count_for_first_confiramtion=0;
                    foreach($reattempt_sprint_task_histories as $reattempt_sprint_task_history){
                        $s_id=$reattempt_sprint_task_history->status_id;

                        if($s_id==13){//at hub processing
                            $return_history[0][$count_for_first_confiramtion]['attempt']=1;
                            $return_history[0][$count_for_first_confiramtion]['status_id']=$s_id;
                            $return_history[0][$count_for_first_confiramtion]['status_msg']="At Hub Processing - Reattempt";
                            $return_history[0][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                            $return_history[0][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                        }
                        elseif($s_id==61){//order at store

                            $response['order_confirmed_date']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                            $response['order_confirmed_time']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');

                            // $return_history[0][$count_for_first_confiramtion]['count']=0;
                            $return_history[0][$count_for_first_confiramtion]['attempt']=1;
                            $return_history[0][$count_for_first_confiramtion]['status_id']=$s_id;
                            $return_history[0][$count_for_first_confiramtion]['status_msg']="Order At Store";
                            $return_history[0][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                            $return_history[0][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                        }
                        elseif($s_id==121){//out for delivery

                            $return_history[0][$count_for_first_confiramtion]['attempt']=1;
                            $return_history[0][$count_for_first_confiramtion]['status_id']=$s_id;
                            $return_history[0][$count_for_first_confiramtion]['status_msg']="Out For Delivery";
                            $return_history[0][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                            $return_history[0][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                        }
                        elseif($s_id==124){//at hub processing

                            $return_history[0][$count_for_first_confiramtion]['attempt']=1;
                            $return_history[0][$count_for_first_confiramtion]['status_id']=$s_id;
                            $return_history[0][$count_for_first_confiramtion]['status_msg']="At Hub Processing";
                            $return_history[0][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                            $return_history[0][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');

                        }
                        elseif($s_id==125){//pickup at store
                            // if($return_history[0]['count']<50){$return_history[0]['count']=50;}
                            $return_history[0][$count_for_first_confiramtion]['status_msg']="Pickup At Store";
                            // $return_history[0][$count_for_first_confiramtion]['count']=0;
                            $return_history[0][$count_for_first_confiramtion]['attempt']=1;
                            $return_history[0][$count_for_first_confiramtion]['status_id']=$s_id;
                            $return_history[0][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                            $return_history[0][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');

                        }
                        elseif($s_id==133){//packages sorted
                            // if($return_history[0]['count']<50){$return_history[0]['count']=50;}
                            // $return_history[0][$count_for_first_confiramtion]['count']=0;
                            $return_history[0][$count_for_first_confiramtion]['attempt']=1;
                            $return_history[0][$count_for_first_confiramtion]['status_id']=$s_id;
                            $return_history[0][$count_for_first_confiramtion]['status_msg']="Packages Sorted";
                            $return_history[0][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                            $return_history[0][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');

                        }

                        // if($s_id==114 ||$s_id==113 || $s_id==116 || $s_id==17){//successfully delivered at door,successfully hand delivered,successfully delivered to neighbour,successfully delivered
                        //     //    if($return_history[0]['count']<100){$return_history[0]['count']=100;}
                        //     $return_history[0][17]['time']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                        //    $return_history[0][17]['date']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                        //     $return_history[0]['success_message']= $this->statusmap($s_id);
                        //     if(!empty($reattempt_sprint_task_history->getSprintConfirmationDetail)){
                        //      $return_history[0]['attachment']= $reattempt_sprint_task_history->getSprintConfirmationDetail->attachment_path;
                        //     }
                        // }
                        else{
                            //  $return_history[0][$count_for_first_confiramtion]['count']=0;
                            $return_history[0][$count_for_first_confiramtion]['attempt']=1;
                            $return_history[0][$count_for_first_confiramtion]['status_id']=$s_id;
                            $return_history[0][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                           $return_history[0][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                            $return_history[0][$count_for_first_confiramtion]['status_msg']= $this->statusmap($s_id);
                            if(!empty($reattempt_sprint_task_history->getSprintConfirmationDetail)){
                             $return_history[0][$count_for_first_confiramtion]['attachment']= $reattempt_sprint_task_history->getSprintConfirmationDetail->attachment_path??'';
                             $response['reattempt_first_attachment']= $reattempt_sprint_task_history->getSprintConfirmationDetail->attachment_path??'';
                            }
                        }
                        $count_for_first_confiramtion++;
                    }
                }

                if(!empty($merchantid->sprintTaskDetail->sprintReattemptDetail->getReattempt->sprint_id)){


                    // $reattempt_second_task_history=DB::table('sprint__tasks_history')->where('sprint_id',$merchantid->sprintTaskDetail->sprintReattemptDetail->getReattempt->reattempt_of)->get();
                    $reattempt_second_task_history=$merchantid->sprintTaskDetail->sprintReattemptDetail->getReattempt->sprintTaskHistoryDetails;
                    // print_r($merchantid->sprintTaskDetail->sprintReattemptDetail->getReattempt);die;
                    if(count($reattempt_second_task_history)>0){
                        $response['order_confirmed_date']=$this->ConvertTimeZone($merchantid->sprintTaskDetail->sprintReattemptDetail->getReattempt->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                        $response['order_confirmed_time']=$this->ConvertTimeZone($merchantid->sprintTaskDetail->sprintReattemptDetail->getReattempt->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                        // echo 1;die;
                        // $return_history[1]['count']=0;
                        // $return_history[1]['attempt']=2;
                        $count_for_first_confiramtion=0;
                        foreach($reattempt_second_task_history as $reattempt_second_sprint_task_history){

                            $s_id=$reattempt_second_sprint_task_history->status_id;

                            // if($s_id==125){//order at store
                            //     if($return_history[1]['count']<25){$return_history[1]['count']=25;}
                            //     $return_history[1][$s_id]['time']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','H:i:s');
                            //     $return_history[1][$s_id]['date']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','Y-m-d');
                            // }
                            // if($s_id==133){//packages sorted
                            //     if($return_history[1]['count']<50){$return_history[1]['count']=50;}
                            //     $return_history[1][$s_id]['time']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','H:i:s');
                            //     $return_history[1][$s_id]['date']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','Y-m-d');

                            // }
                            // if($s_id==121){//out for delivery
                            //   if($return_history[1]['count']<75){$return_history[1]['count']=75;}
                            //   $return_history[1][$s_id]['time']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','H:i:s');
                            //   $return_history[1][$s_id]['date']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','Y-m-d');
                            // }
                            // if($s_id==114 ||$s_id==113 || $s_id==116 || $s_id==17){//successfully delivered at door,successfully hand delivered,successfully delivered to neighbour,successfully delivered
                            //    if($return_history[1]['count']<100){$return_history[1]['count']=100;}
                            //     $return_history[1][17]['time']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','H:i:s');
                            //    $return_history[1][17]['date']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','Y-m-d');
                            //     $return_history[1]['success_message']= $this->statusmap($s_id);
                            //     if(!empty($reattempt_second_sprint_task_history->getSprintConfirmationDetail)){
                            //     $return_history[1]['attachment']= $reattempt_second_sprint_task_history->getSprintConfirmationDetail->attachment_path;
                            //     }
                            // }



                            if($s_id==13){//at hub processing
                                // if($return_history[0]['count']<25){$return_history[0]['count']=25;}
                                // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                $return_history[1][$count_for_first_confiramtion]['attempt']=2;
                                $return_history[1][$count_for_first_confiramtion]['status_id']=$s_id;
                                $return_history[1][$count_for_first_confiramtion]['status_msg']="At Hub Processing - Reattempt";
                                $return_history[1][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                                $return_history[1][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                            }
                            if($s_id==61){//order at store
                                // if($return_history[1]['count']<25){$return_history[1]['count']=25;}
                                // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                $response['order_confirmed_date']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                                $response['order_confirmed_time']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');

                                $return_history[1][$count_for_first_confiramtion]['attempt']=2;
                                $return_history[1][$count_for_first_confiramtion]['status_id']=$s_id;
                                $return_history[1][$count_for_first_confiramtion]['status_msg']="Order At Store";
                                $return_history[1][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                                $return_history[1][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                            }
                            if($s_id==121){//out for delivery
                                //   if($return_history[1]['count']<75){$return_history[1]['count']=75;}
                                // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                $return_history[1][$count_for_first_confiramtion]['attempt']=2;
                                $return_history[1][$count_for_first_confiramtion]['status_id']=$s_id;
                                $return_history[1][$count_for_first_confiramtion]['status_msg']="Out For Delivery";
                                $return_history[1][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                                $return_history[1][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                            }
                            if($s_id==124){//at hub processing
                                // if($return_history[1]['count']<50){$return_history[1]['count']=50;}
                                // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                $return_history[1][$count_for_first_confiramtion]['attempt']=2;
                                $return_history[1][$count_for_first_confiramtion]['status_id']=$s_id;
                                $return_history[1][$count_for_first_confiramtion]['status_msg']="At Hub Processing";
                                $return_history[1][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                                $return_history[1][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');

                            }
                            if($s_id==125){//pickup at store
                                // if($return_history[1]['count']<50){$return_history[1]['count']=50;}
                                // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                $return_history[1][$count_for_first_confiramtion]['attempt']=2;
                                $return_history[1][$count_for_first_confiramtion]['status_id']=$s_id;
                                $return_history[1][$count_for_first_confiramtion]['status_msg']="Pickup At Store";
                                $return_history[1][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                                $return_history[1][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');

                            }
                            if($s_id==133){//packages sorted
                                // if($return_history[1]['count']<50){$return_history[1]['count']=50;}
                                // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                $return_history[1][$count_for_first_confiramtion]['attempt']=2;
                                $return_history[1][$count_for_first_confiramtion]['status_id']=$s_id;
                                $return_history[1][$count_for_first_confiramtion]['status_msg']="Packages Sorted";
                                $return_history[1][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                                $return_history[1][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');

                            }

                            // if($s_id==114 ||$s_id==113 || $s_id==116 || $s_id==17){//successfully delivered at door,successfully hand delivered,successfully delivered to neighbour,successfully delivered
                            //     //    if($return_history[1]['count']<100){$return_history[1]['count']=100;}
                            //     $return_history[1][17]['time']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                            //    $return_history[1][17]['date']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                            //     $return_history[1]['success_message']= $this->statusmap($s_id);
                            //     if(!empty($reattempt_second_sprint_task_history->getSprintConfirmationDetail)){
                            //      $return_history[1]['attachment']= $reattempt_second_sprint_task_history->getSprintConfirmationDetail->attachment_path;
                            //     }
                            // }
                            else{
                                // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                $return_history[1][$count_for_first_confiramtion]['attempt']=2;
                                $return_history[1][$count_for_first_confiramtion]['status_id']=$s_id;
                                $return_history[1][$count_for_first_confiramtion]['time']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                                $return_history[1][$count_for_first_confiramtion]['date']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                                $return_history[1][$count_for_first_confiramtion]['status_msg']= $this->statusmap($s_id);
                                if(!empty($reattempt_second_sprint_task_history->getSprintConfirmationDetail)){
                                 $return_history[1][$count_for_first_confiramtion]['attachment']= $reattempt_second_sprint_task_history->getSprintConfirmationDetail->attachment_path??'';
                                 $response['reattempt_second_attachment']= $reattempt_sprint_task_history->getSprintConfirmationDetail->attachment_path??'';
                                }
                            }
                            $count_for_first_confiramtion++;




                        }



                    }
                }
                if(isset($return_history)){
                    if(!empty($return_history)){
                        if(count($return_history)>1){
                            $return_history=array_reverse($return_history);
                        }
                    }
                }

                $response['return_history']=$return_history;

            }


            if(isset($merchantid->sprintConfirmationDetail->joeyInfo)){
                $response['joey_name']=$merchantid->sprintConfirmationDetail->joeyInfo->first_name.' '.$merchantid->sprintConfirmationDetail->joeyInfo->last_name;
                $response['joey_image']=$merchantid->sprintConfirmationDetail->joeyInfo->image;
                if(isset($merchantid->sprintConfirmationDetail->joeyInfo->joeyLocationDetail)){
                $response['joey_lat']=$merchantid->sprintConfirmationDetail->joeyInfo->joeyLocationDetail->latitude;
                $response['joey_long']=$merchantid->sprintConfirmationDetail->joeyInfo->joeyLocationDetail->longitude;

                }
                else{
                    $response['joey_lat']=0;
                    $response['joey_long']=0;
                }
                $response['joey_lat'] =(float)substr_replace($response['joey_lat'], '.', 2, 0);



                if(isset($response['joey_long'])){ if (strlen($response['joey_long']) >= 9){

                    $response['joey_long'] = (float)substr_replace($response['joey_long'], '.', 4, 0);

                }
                else {
                    $response['joey_long'] =(float)substr_replace($response['joey_long'], '.', 3, 0);

                }
                }

                $response['joey_phone']=$merchantid->sprintConfirmationDetail->joeyInfo->phone;
               // $response['assigned_to_joey_date']=0;
               // $response['assigned_to_joey_time']=0;
               //print_r($merchantid->joeyRouteLocationDetail);
               //print_r($merchantid->joeyRouteLocationDetail->joeyRouteDetail);
               //die();
                // if ($merchantid->joeyRouteLocationDetail->joeyRouteDetail->date!=null) {
                //     // $response['assigned_to_joey_date']=$this->ConvertTimeZone( $merchantid->joeyRouteLocationDetail->joeyRouteDetail->date,"UTC",'America/Toronto','Y-m-d');
                //     // $response['assigned_to_joey_time']=$this->ConvertTimeZone( $merchantid->joeyRouteLocationDetail->joeyRouteDetail->date,"UTC",'America/Toronto','H:i:s');

                //     $response['assigned_to_joey_date']= $this->ConvertTimeZone($merchantid->joeyRouteLocationDetail->routeHistory[0]->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                //     $response['assigned_to_joey_time']= $this->ConvertTimeZone($merchantid->joeyRouteLocationDetail->routeHistory[0]->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');

                // }
                // if(!empty($merchantid->joeyRouteLocationDetail->routeHistory)){
                //     $joeyDateTime=[];
                //     if(isset($merchantid->joeyRouteLocationDetail->routeHistory[0]->joey_id)){
                //         $joeyDateTime=RouteHistory::where('joey_id',$merchantid->joeyRouteLocationDetail->routeHistory[0]->joey_id)->where('route_id',$merchantid->joeyRouteLocationDetail->routeHistory[0]->route_id)->whereIn("status",[0,1])->orderBy('id',"DESC")->first();
                //     }
                //     if(!empty($joeyDateTime)){
                //         $response['assigned_to_joey_date']= $this->ConvertTimeZone($joeyDateTime->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                //         $response['assigned_to_joey_time']= $this->ConvertTimeZone($joeyDateTime->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                //     }
                // }

            }
            if(!empty($merchantid->joeyRouteLocationDetail->joeyRouteDetail)){
                if ($merchantid->joeyRouteLocationDetail->joeyRouteDetail->date!=null) {
                    // $response['assigned_to_joey_date']=$this->ConvertTimeZone( $merchantid->joeyRouteLocationDetail->joeyRouteDetail->date,"UTC",'America/Toronto','Y-m-d');
                    // $response['assigned_to_joey_time']=$this->ConvertTimeZone( $merchantid->joeyRouteLocationDetail->joeyRouteDetail->date,"UTC",'America/Toronto','H:i:s');
                    if (isset($merchantid->joeyRouteLocationDetail->routeHistory[0])) {

                        $response['assigned_to_joey_date']= $this->ConvertTimeZone($merchantid->joeyRouteLocationDetail->routeHistory[0]->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                        $response['assigned_to_joey_time']= $this->ConvertTimeZone($merchantid->joeyRouteLocationDetail->routeHistory[0]->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');

                    }
                }
            }
            if(!empty($merchantid->joeyRouteLocationDetail->routeHistory)){
                $joeyDateTime=[];
                if(isset($merchantid->joeyRouteLocationDetail->routeHistory[0]->joey_id)){

                    $joey_fname=$merchantid->joeyRouteLocationDetail->routeHistory[0]->getJoey->first_name??'';
                    $joey_lname=$merchantid->joeyRouteLocationDetail->routeHistory[0]->getJoey->last_name??'';
                    $response['joey_name']=$joey_fname.' '.$joey_lname;
                    $response['joey_image']=$merchantid->joeyRouteLocationDetail->routeHistory[0]->getJoey->image??'';

                    $joeyDateTime=RouteHistory::where('joey_id',$merchantid->joeyRouteLocationDetail->routeHistory[0]->joey_id)->where('route_id',$merchantid->joeyRouteLocationDetail->routeHistory[0]->route_id)->whereIn("status",[0,1])->orderBy('id',"DESC")->first();
                }
                if(!empty($joeyDateTime)){
                    $response['assigned_to_joey_date']= $this->ConvertTimeZone($joeyDateTime->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                    $response['assigned_to_joey_time']= $this->ConvertTimeZone($joeyDateTime->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                }
            }

            if(isset($merchantid->sprintTaskDetail->locationDetail)){
                $response['cityname']=$merchantid->sprintTaskDetail->locationDetail->cityDetail->name??'';
                $response['delivery_address']=$merchantid->sprintTaskDetail->locationDetail->address??'';
            }


           // print_r($response);die();

            $laststatus=$merchantid->sprintTaskDetail->sprintTaskHistoryDetailData;
            $laststatus_key=$merchantid->sprintTaskDetail->sprintTaskHistoryDetailData[count($laststatus)-1]->status_id;
         //    print_r($merchantid->sprintTaskDetail->sprintTaskHistoryDetailData);die;
            // $laststatus_key=17;
            $vendor_check=$merchantid->sprintTaskDetail->sprintDetail->creator_id;
            foreach ($merchantid->sprintTaskDetail->sprintTaskHistoryDetailData as $sprintTaskHistoryDetailvalue) {

                if($vendor_check==477260 || $vendor_check==477282 || $vendor_check==476592){

                    if($sprintTaskHistoryDetailvalue['status_id']==133 || $sprintTaskHistoryDetailvalue['status_id']==13){ // processing
                        $response['processing_date']=$this->ConvertTimeZone( $sprintTaskHistoryDetailvalue->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                        $response['processing_time']=$this->ConvertTimeZone( $sprintTaskHistoryDetailvalue->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                    }

                }
                else{
                    if($sprintTaskHistoryDetailvalue['status_id']==124 ||$sprintTaskHistoryDetailvalue['status_id']==13){ // processing
                        $response['processing_date']=$this->ConvertTimeZone( $sprintTaskHistoryDetailvalue->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                        $response['processing_time']=$this->ConvertTimeZone( $sprintTaskHistoryDetailvalue->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                    }
                }

                 if($sprintTaskHistoryDetailvalue['status_id']==121){ //out for delivery //101 previous
                     $response['out_for_delivery_date']=$this->ConvertTimeZone( $sprintTaskHistoryDetailvalue->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                     $response['out_for_delivery_time']=$this->ConvertTimeZone( $sprintTaskHistoryDetailvalue->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                 }
                 if($sprintTaskHistoryDetailvalue['status_id']==17 || $sprintTaskHistoryDetailvalue['status_id']==113 ||$sprintTaskHistoryDetailvalue['status_id']==114 ||$sprintTaskHistoryDetailvalue['status_id']==116 ||$sprintTaskHistoryDetailvalue['status_id']==117 ||$sprintTaskHistoryDetailvalue['status_id']==118 ||$sprintTaskHistoryDetailvalue['status_id']==132 ||$sprintTaskHistoryDetailvalue['status_id']==138 ||$sprintTaskHistoryDetailvalue['status_id']==139||$sprintTaskHistoryDetailvalue['status_id']==144){ //completed
                     $response['delivered_success_message']= $this->statusmap($laststatus_key);
                 }

            }

            $count=0;

            if($laststatus_key==61 || $laststatus_key==125){ // order approved
                $count=20;
            }
            if($laststatus_key==133 ||$laststatus_key==124 ||$laststatus_key==13){ // processing
                $count=40;
            }
         //    if($laststatus_key==121){ //assigned to joey
            //  if(isset($merchantid->joeyRouteLocationDetail->joeyRouteDetail->created_at)){
            if(isset($response['assigned_to_joey_date'])){
                $count=60;
            }
            if($laststatus_key==121){ //out for delivery //101 previous
                $count=80;
            }
            if($laststatus_key==113 ||$laststatus_key==114 ||$laststatus_key==116 ||$laststatus_key==117 ||$laststatus_key==118 ||$laststatus_key==132 ||$laststatus_key==138 ||$laststatus_key==139||$laststatus_key==144){ //completed
                $response['completed_date']=$this->ConvertTimeZone( $merchantid->sprintTaskDetail->sprintTaskHistoryDetailData[count($laststatus)-1]->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                $response['completed_time']=$this->ConvertTimeZone( $merchantid->sprintTaskDetail->sprintTaskHistoryDetailData[count($laststatus)-1]->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                $count=100;

                $response['joey_lat'] =(float)substr_replace($merchantid->sprintTaskDetail->locationDetail->latitude, '.', 2, 0);

               if(isset($response['joey_long'])){
                   if (strlen($response['joey_long']) >= 9){

                    $response['joey_long'] = (float)substr_replace($merchantid->sprintTaskDetail->locationDetail->longitude, '.', 4, 0);

                    }
                    else {
                        $response['joey_long'] =(float)substr_replace($merchantid->sprintTaskDetail->locationDetail->longitude, '.', 3, 0);

                    }
                }

            }

            if(in_array($laststatus_key,[101,102,103,104,105,106,107,108,109,110,111,112,155,131,135,136,140,145])){ //returned
                $response['completed_date']=$this->ConvertTimeZone( $merchantid->sprintTaskDetail->sprintTaskHistoryDetailData[count($laststatus)-1]->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                $response['completed_time']=$this->ConvertTimeZone( $merchantid->sprintTaskDetail->sprintTaskHistoryDetailData[count($laststatus)-1]->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                $count=101;
                $response['delivered_success_message']= $this->statusmap($laststatus_key);

            }
         //    echo $merchantid->sprintTaskDetail->sprintTaskHistoryDetailData[count($laststatus)-1]->id;die;
            $response['latest_status_count']=$count;

            // $response['customer_lat']=$merchantid->sprintTaskDetail->locationDetail->latitude;
            // $response['customer_long']=$merchantid->sprintTaskDetail->locationDetail->longitude;





            $response['instructions']='No Instructions found';
            if(!empty($merchantid->sprintTaskDetail->description)){
             $response['instructions']=$merchantid->sprintTaskDetail->description;
            }

            if(!isset($response['order_confirmed_date'])){
                $response['order_confirmed_date']=$this->ConvertTimeZone($merchantid->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                $response['order_confirmed_time']=$this->ConvertTimeZone($merchantid->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
            }

            // merchant se task id lkr task se sprint id lkr sprint reattempt me check kro


            // echo $merchantid->sprintTaskDetail->id;die;
            $expected_date='';
            $response['is_amazon']=0;
            // echo $merchantid->sprintTaskDetail->id;die;
            $vendor_check=$merchantid->sprintTaskDetail->sprintDetail->creator_id;
            $response['vendor_id'] = $vendor_check;
            if($vendor_check==477260 || $vendor_check==477282 || $vendor_check==476592){

                // echo 1;die;
                $response['is_amazon']=1;
                // $expected_date=date('Y-m-d H:i:s', strtotime($this->ConvertTimeZone($merchantid->created_at->toDateTimeString(),"UTC",'America/Toronto'). ' +1 day'));
                $amazon_sprint_task_histories=$merchantid->sprintTaskDetail->sprintTaskHistoryDetailData;
                if(!empty($amazon_sprint_task_histories)){
                    foreach ($amazon_sprint_task_histories as $amazon_sprint_task_history) {
                        if($amazon_sprint_task_history->status_id==13){
                            $expected_date=date('Y-m-d H:i:s', strtotime($this->ConvertTimeZone($amazon_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto'). ' +1 day'));
                        }
                    }
                    if($expected_date==''){
                        foreach ($amazon_sprint_task_histories as $amazon_sprint_task_history) {
                            if($amazon_sprint_task_history->status_id==61){
                                $expected_date=date('Y-m-d H:i:s', strtotime($this->ConvertTimeZone($amazon_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto'). ' +1 day'));

                            }
                        }
                    }
                }


            }else{
                // echo 2;die;

                // $expected_date=date('Y-m-d H:i:s', strtotime($this->ConvertTimeZone($merchantid->created_at->toDateTimeString(),"UTC",'America/Toronto'). ' +1 day'));
                $other_sprint_task_histories=$merchantid->sprintTaskDetail->sprintTaskHistoryDetailData;
                if(!empty($other_sprint_task_histories)){
                    foreach ($other_sprint_task_histories as $other_sprint_task_history) {
                        if($other_sprint_task_history->status_id==125){
                            $expected_date=date('Y-m-d H:i:s', strtotime($this->ConvertTimeZone($other_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto'). ' +1 day'));
                        }
                    }
                    if($expected_date==''){
                        foreach ($other_sprint_task_histories as $other_sprint_task_history) {
                            if($other_sprint_task_history->status_id==133){
                                $expected_date=date('Y-m-d H:i:s', strtotime($this->ConvertTimeZone($other_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto'). ' +1 day'));

                            }
                        }
                    }

                }


            }

            if($expected_date!='' || $expected_date!=null){
                $response['expected_date'] = date("Y-m-d",strtotime($expected_date));
                $response['expected_time'] ="21:00:00";
            }

            if(!empty($merchantid->sprintConfirmationDetail)){
                $response['current_attachment']=$merchantid->sprintConfirmationDetail->attachment_path;
            }
             if($request->input('ajax')!=null){

                $ajax_response['partial_view']= view('partialviews.trackorder')->with('data',$response)->render();
                $ajax_response['joey_lat']=(isset($response['joey_lat']))?(float)$response['joey_lat'] :0 ;
                $ajax_response['joey_long']=(isset($response['joey_long']))?(float)$response['joey_long'] :0 ;
                $ajax_response['count']=$count."%";

                echo json_encode($ajax_response);
             }

        }

    }


}


    //Tracking Packages According To Order id
    public function new_track_order($orderId)
    {

        date_default_timezone_set('America/Toronto');


        if ($orderId != null) {

            $merchantid = SprintTask::where('sprint_id', $orderId)->where('type','dropoff')->first();

            //   $merchantind = MerchantId::where('tracking_id', $orderId)->first();


            if (!empty($merchantid)) { //if tracking id found
                $response['sprint_id'] = $orderId;

                if (!empty($merchantid)) {

                    $reattempt_sprint_task_histories = $merchantid->sprintTaskHistoryDetails;

                    $return_history = [];

                    if (count($reattempt_sprint_task_histories) > 0) {


                        $count_for_first_confiramtion = 0;
                        foreach ($reattempt_sprint_task_histories as $reattempt_sprint_task_history) {
                            $s_id = $reattempt_sprint_task_history->status_id;

                            if ($s_id == 13) {//at hub processing
                                $return_history[0][$count_for_first_confiramtion]['attempt'] = 1;
                                $return_history[0][$count_for_first_confiramtion]['status_id'] = $s_id;
                                $return_history[0][$count_for_first_confiramtion]['status_msg'] = "At Hub Processing - Reattempt";
                                $return_history[0][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                $return_history[0][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                            } elseif ($s_id == 61) {//order at store

                                $response['order_confirmed_date'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                                $response['order_confirmed_time'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');

                                // $return_history[0][$count_for_first_confiramtion]['count']=0;
                                $return_history[0][$count_for_first_confiramtion]['attempt'] = 1;
                                $return_history[0][$count_for_first_confiramtion]['status_id'] = $s_id;
                                $return_history[0][$count_for_first_confiramtion]['status_msg'] = "Order At Store";
                                $return_history[0][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                $return_history[0][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                            } elseif ($s_id == 121 || $s_id == 15 || $s_id == 28) {//out for delivery

                                $return_history[0][$count_for_first_confiramtion]['attempt'] = 1;
                                $return_history[0][$count_for_first_confiramtion]['status_id'] = $s_id;
                                $return_history[0][$count_for_first_confiramtion]['status_msg'] = "Out For Delivery";
                                $return_history[0][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                $return_history[0][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                            } elseif ($s_id == 124) {//at hub processing

                                $return_history[0][$count_for_first_confiramtion]['attempt'] = 1;
                                $return_history[0][$count_for_first_confiramtion]['status_id'] = $s_id;
                                $return_history[0][$count_for_first_confiramtion]['status_msg'] = "At Hub Processing";
                                $return_history[0][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                $return_history[0][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');

                            } elseif ($s_id == 125) {//pickup at store
                                // if($return_history[0]['count']<50){$return_history[0]['count']=50;}
                                $return_history[0][$count_for_first_confiramtion]['status_msg'] = "Pickup At Store";
                                // $return_history[0][$count_for_first_confiramtion]['count']=0;
                                $return_history[0][$count_for_first_confiramtion]['attempt'] = 1;
                                $return_history[0][$count_for_first_confiramtion]['status_id'] = $s_id;
                                $return_history[0][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                $return_history[0][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');

                            } elseif ($s_id == 133) {//packages sorted
                                // if($return_history[0]['count']<50){$return_history[0]['count']=50;}
                                // $return_history[0][$count_for_first_confiramtion]['count']=0;
                                $return_history[0][$count_for_first_confiramtion]['attempt'] = 1;
                                $return_history[0][$count_for_first_confiramtion]['status_id'] = $s_id;
                                $return_history[0][$count_for_first_confiramtion]['status_msg'] = "Packages Sorted";
                                $return_history[0][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                $return_history[0][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');

                            }

                            // if($s_id==114 ||$s_id==113 || $s_id==116 || $s_id==17){//successfully delivered at door,successfully hand delivered,successfully delivered to neighbour,successfully delivered
                            //     //    if($return_history[0]['count']<100){$return_history[0]['count']=100;}
                            //     $return_history[0][17]['time']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                            //    $return_history[0][17]['date']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                            //     $return_history[0]['success_message']= $this->statusmap($s_id);
                            //     if(!empty($reattempt_sprint_task_history->getSprintConfirmationDetail)){
                            //      $return_history[0]['attachment']= $reattempt_sprint_task_history->getSprintConfirmationDetail->attachment_path;
                            //     }
                            // }
                            else {
                                //  $return_history[0][$count_for_first_confiramtion]['count']=0;
                                $return_history[0][$count_for_first_confiramtion]['attempt'] = 1;
                                $return_history[0][$count_for_first_confiramtion]['status_id'] = $s_id;
                                $return_history[0][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                $return_history[0][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                                $return_history[0][$count_for_first_confiramtion]['status_msg'] = $this->statusmap($s_id);
                                if (!empty($reattempt_sprint_task_history->getSprintConfirmationDetail)) {
                                    $return_history[0][$count_for_first_confiramtion]['attachment'] = $reattempt_sprint_task_history->getSprintConfirmationDetail->attachment_path ?? '';
                                    $response['reattempt_first_attachment'] = $reattempt_sprint_task_history->getSprintConfirmationDetail->attachment_path ?? '';
                                }
                            }
                            $count_for_first_confiramtion++;
                        }
                    }

                    if (!empty($merchantid->sprintReattemptDetail->getReattempt->sprint_id)) {


                        // $reattempt_second_task_history=DB::table('sprint__tasks_history')->where('sprint_id',$merchantid->sprintTaskDetail->sprintReattemptDetail->getReattempt->reattempt_of)->get();
                        $reattempt_second_task_history = $merchantid->sprintReattemptDetail->getReattempt->sprintTaskHistoryDetails;
                        // print_r($merchantid->sprintTaskDetail->sprintReattemptDetail->getReattempt);die;
                        if (count($reattempt_second_task_history) > 0) {
                            $response['order_confirmed_date'] = $this->ConvertTimeZone($merchantid->sprintReattemptDetail->getReattempt->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                            $response['order_confirmed_time'] = $this->ConvertTimeZone($merchantid->sprintReattemptDetail->getReattempt->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                            // echo 1;die;
                            // $return_history[1]['count']=0;
                            // $return_history[1]['attempt']=2;
                            $count_for_first_confiramtion = 0;
                            foreach ($reattempt_second_task_history as $reattempt_second_sprint_task_history) {

                                $s_id = $reattempt_second_sprint_task_history->status_id;

                                // if($s_id==125){//order at store
                                //     if($return_history[1]['count']<25){$return_history[1]['count']=25;}
                                //     $return_history[1][$s_id]['time']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','H:i:s');
                                //     $return_history[1][$s_id]['date']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','Y-m-d');
                                // }
                                // if($s_id==133){//packages sorted
                                //     if($return_history[1]['count']<50){$return_history[1]['count']=50;}
                                //     $return_history[1][$s_id]['time']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','H:i:s');
                                //     $return_history[1][$s_id]['date']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','Y-m-d');

                                // }
                                // if($s_id==121){//out for delivery
                                //   if($return_history[1]['count']<75){$return_history[1]['count']=75;}
                                //   $return_history[1][$s_id]['time']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','H:i:s');
                                //   $return_history[1][$s_id]['date']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','Y-m-d');
                                // }
                                // if($s_id==114 ||$s_id==113 || $s_id==116 || $s_id==17){//successfully delivered at door,successfully hand delivered,successfully delivered to neighbour,successfully delivered
                                //    if($return_history[1]['count']<100){$return_history[1]['count']=100;}
                                //     $return_history[1][17]['time']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','H:i:s');
                                //    $return_history[1][17]['date']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','Y-m-d');
                                //     $return_history[1]['success_message']= $this->statusmap($s_id);
                                //     if(!empty($reattempt_second_sprint_task_history->getSprintConfirmationDetail)){
                                //     $return_history[1]['attachment']= $reattempt_second_sprint_task_history->getSprintConfirmationDetail->attachment_path;
                                //     }
                                // }


                                if ($s_id == 13) {//at hub processing
                                    // if($return_history[0]['count']<25){$return_history[0]['count']=25;}
                                    // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                    $return_history[1][$count_for_first_confiramtion]['attempt'] = 2;
                                    $return_history[1][$count_for_first_confiramtion]['status_id'] = $s_id;
                                    $return_history[1][$count_for_first_confiramtion]['status_msg'] = "At Hub Processing - Reattempt";
                                    $return_history[1][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                    $return_history[1][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                                }
                                if ($s_id == 61) {//order at store
                                    // if($return_history[1]['count']<25){$return_history[1]['count']=25;}
                                    // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                    $response['order_confirmed_date'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                                    $response['order_confirmed_time'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');

                                    $return_history[1][$count_for_first_confiramtion]['attempt'] = 2;
                                    $return_history[1][$count_for_first_confiramtion]['status_id'] = $s_id;
                                    $return_history[1][$count_for_first_confiramtion]['status_msg'] = "Order At Store";
                                    $return_history[1][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                    $return_history[1][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                                }
                                if ($s_id == 121) {//out for delivery
                                    //   if($return_history[1]['count']<75){$return_history[1]['count']=75;}
                                    // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                    $return_history[1][$count_for_first_confiramtion]['attempt'] = 2;
                                    $return_history[1][$count_for_first_confiramtion]['status_id'] = $s_id;
                                    $return_history[1][$count_for_first_confiramtion]['status_msg'] = "Out For Delivery";
                                    $return_history[1][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                    $return_history[1][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                                }
                                if ($s_id == 124) {//at hub processing
                                    // if($return_history[1]['count']<50){$return_history[1]['count']=50;}
                                    // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                    $return_history[1][$count_for_first_confiramtion]['attempt'] = 2;
                                    $return_history[1][$count_for_first_confiramtion]['status_id'] = $s_id;
                                    $return_history[1][$count_for_first_confiramtion]['status_msg'] = "At Hub Processing";
                                    $return_history[1][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                    $return_history[1][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');

                                }
                                if ($s_id == 125) {//pickup at store
                                    // if($return_history[1]['count']<50){$return_history[1]['count']=50;}
                                    // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                    $return_history[1][$count_for_first_confiramtion]['attempt'] = 2;
                                    $return_history[1][$count_for_first_confiramtion]['status_id'] = $s_id;
                                    $return_history[1][$count_for_first_confiramtion]['status_msg'] = "Pickup At Store";
                                    $return_history[1][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                    $return_history[1][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');

                                }
                                if ($s_id == 133) {//packages sorted
                                    // if($return_history[1]['count']<50){$return_history[1]['count']=50;}
                                    // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                    $return_history[1][$count_for_first_confiramtion]['attempt'] = 2;
                                    $return_history[1][$count_for_first_confiramtion]['status_id'] = $s_id;
                                    $return_history[1][$count_for_first_confiramtion]['status_msg'] = "Packages Sorted";
                                    $return_history[1][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                    $return_history[1][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');

                                }

                                // if($s_id==114 ||$s_id==113 || $s_id==116 || $s_id==17){//successfully delivered at door,successfully hand delivered,successfully delivered to neighbour,successfully delivered
                                //     //    if($return_history[1]['count']<100){$return_history[1]['count']=100;}
                                //     $return_history[1][17]['time']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                                //    $return_history[1][17]['date']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                                //     $return_history[1]['success_message']= $this->statusmap($s_id);
                                //     if(!empty($reattempt_second_sprint_task_history->getSprintConfirmationDetail)){
                                //      $return_history[1]['attachment']= $reattempt_second_sprint_task_history->getSprintConfirmationDetail->attachment_path;
                                //     }
                                // }
                                else {
                                    // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                    $return_history[1][$count_for_first_confiramtion]['attempt'] = 2;
                                    $return_history[1][$count_for_first_confiramtion]['status_id'] = $s_id;
                                    $return_history[1][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                    $return_history[1][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                                    $return_history[1][$count_for_first_confiramtion]['status_msg'] = $this->statusmap($s_id);
                                    if (!empty($reattempt_second_sprint_task_history->getSprintConfirmationDetail)) {
                                        $return_history[1][$count_for_first_confiramtion]['attachment'] = $reattempt_second_sprint_task_history->getSprintConfirmationDetail->attachment_path ?? '';
                                        $response['reattempt_second_attachment'] = $reattempt_sprint_task_history->getSprintConfirmationDetail->attachment_path ?? '';
                                    }
                                }
                                $count_for_first_confiramtion++;


                            }


                        }
                    }
                    if (isset($return_history)) {
                        if (!empty($return_history)) {
                            if (count($return_history) > 1) {
                                $return_history = array_reverse($return_history);
                            }
                        }
                    }

                    $response['return_history'] = $return_history;

                }

                //Done
                if (isset($merchantid->sprintDetail->joeyInfo)) {
                    $response['joey_name'] = $merchantid->sprintDetail->joeyInfo->first_name . ' ' . $merchantid->sprintDetail->joeyInfo->last_name;
                    $response['joey_image'] = $merchantid->sprintDetail->joeyInfo->image;
                    if (isset($merchantid->sprintDetail->joeyInfo->joeyLocationDetail)) {
                        $response['joey_lat'] = $merchantid->sprintDetail->joeyInfo->joeyLocationDetail->latitude;
                        $response['joey_long'] = $merchantid->sprintDetail->joeyInfo->joeyLocationDetail->longitude;

                    } else {
                        $response['joey_lat'] = 0;
                        $response['joey_long'] = 0;
                    }
                    $response['joey_lat'] = (float)substr_replace($response['joey_lat'], '.', 2, 0);


                    if (isset($response['joey_long'])) {
                        if (strlen($response['joey_long']) >= 9) {

                            $response['joey_long'] = (float)substr_replace($response['joey_long'], '.', 4, 0);

                        } else {
                            $response['joey_long'] = (float)substr_replace($response['joey_long'], '.', 3, 0);

                        }
                    }

                    $response['joey_phone'] = $merchantid->sprintDetail->joeyInfo->phone;
                    // $response['assigned_to_joey_date']=0;
                    // $response['assigned_to_joey_time']=0;
                    //print_r($merchantid->joeyRouteLocationDetail);
                    //print_r($merchantid->joeyRouteLocationDetail->joeyRouteDetail);
                    //die();
                }

//                if (!empty($merchantid->joeyRouteLocationDetail->joeyRouteDetail)) {
//                    if ($merchantid->joeyRouteLocationDetail->joeyRouteDetail->date != null) {
//                        // $response['assigned_to_joey_date']=$this->ConvertTimeZone( $merchantid->joeyRouteLocationDetail->joeyRouteDetail->date,"UTC",'America/Toronto','Y-m-d');
//                        // $response['assigned_to_joey_time']=$this->ConvertTimeZone( $merchantid->joeyRouteLocationDetail->joeyRouteDetail->date,"UTC",'America/Toronto','H:i:s');
//                        if (isset($merchantid->joeyRouteLocationDetail->routeHistory[0])) {
//                            $response['assigned_to_joey_date'] = $this->ConvertTimeZone($merchantid->joeyRouteLocationDetail->routeHistory[0]->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
//                            $response['assigned_to_joey_time'] = $this->ConvertTimeZone($merchantid->joeyRouteLocationDetail->routeHistory[0]->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
//                        }
//                    }
//                }
//                dd($merchantid->RouteLocationDetail->routeHistory);
//                if (!empty($merchantid->joeyRouteLocationDetail->routeHistory)) {
//
//
//                    $joeyDateTime = [];
//                    if (isset($merchantid->joeyRouteLocationDetail->routeHistory[0]->joey_id)) {
//
//                        $joey_fname = $merchantid->joeyRouteLocationDetail->routeHistory[0]->getJoey->first_name ?? '';
//                        $joey_lname = $merchantid->joeyRouteLocationDetail->routeHistory[0]->getJoey->last_name ?? '';
//                        $response['joey_name'] = $joey_fname . ' ' . $joey_lname;
//                        $response['joey_image'] = $merchantid->joeyRouteLocationDetail->routeHistory[0]->getJoey->image ?? '';
//
//                        $joeyDateTime = RouteHistory::where('joey_id', $merchantid->joeyRouteLocationDetail->routeHistory[0]->joey_id)->where('route_id', $merchantid->joeyRouteLocationDetail->routeHistory[0]->route_id)->whereIn("status", [0, 1])->orderBy('id', "DESC")->first();
//                    }
//                    if (!empty($joeyDateTime)) {
//                        $response['assigned_to_joey_date'] = $this->ConvertTimeZone($joeyDateTime->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
//                        $response['assigned_to_joey_time'] = $this->ConvertTimeZone($joeyDateTime->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
//                    }
//                }

                if (isset($merchantid->locationDetail))
                {
                    $response['cityname'] = $merchantid->locationDetail->cityDetail->name ?? '';
                    $response['delivery_address'] = $merchantid->locationDetail->address ?? '';
                }
                elseif (isset($merchantid->locationDetail))
                {
                    $response['cityname'] = $merchantid->locationDetail->cityDetail->name ?? '';
                    $response['delivery_address'] = $merchantid->locationDetail->address  ?? '';
                }

                // print_r($response);die();

                $laststatus = $merchantid->sprintTaskHistoryDetail;
                $laststatus_key = $merchantid->sprintTaskHistoryDetail[count($laststatus) - 1]->status_id;
                //    print_r($merchantid->sprintTaskDetail->sprintTaskHistoryDetail);die;
                // $laststatus_key=17;
                $vendor_check = $merchantid->sprintDetail->creator_id;

                foreach ($merchantid->sprintTaskHistoryDetail as $sprintTaskHistoryDetailvalue) {

                    if ($vendor_check == 477260 || $vendor_check == 477282 || $vendor_check == 476592) {

                        if ($sprintTaskHistoryDetailvalue['status_id'] == 133 || $sprintTaskHistoryDetailvalue['status_id'] == 13 || $sprintTaskHistoryDetailvalue['status_id'] == 24 || $sprintTaskHistoryDetailvalue['status_id'] == 32 || $sprintTaskHistoryDetailvalue['status_id'] == 67) { // processing
                            $response['processing_date'] = $this->ConvertTimeZone($sprintTaskHistoryDetailvalue->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                            $response['processing_time'] = $this->ConvertTimeZone($sprintTaskHistoryDetailvalue->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                        }

                    }
                    else {
                        if ($sprintTaskHistoryDetailvalue['status_id'] == 124 || $sprintTaskHistoryDetailvalue['status_id'] == 13 || $sprintTaskHistoryDetailvalue['status_id'] == 24 || $sprintTaskHistoryDetailvalue['status_id'] == 32 || $sprintTaskHistoryDetailvalue['status_id'] == 67) { // processing
                            $response['processing_date'] = $this->ConvertTimeZone($sprintTaskHistoryDetailvalue->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                            $response['processing_time'] = $this->ConvertTimeZone($sprintTaskHistoryDetailvalue->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                        }
                    }

                    if ($sprintTaskHistoryDetailvalue['status_id'] == 121 || $sprintTaskHistoryDetailvalue['status_id'] == 15 || $sprintTaskHistoryDetailvalue['status_id'] == 28) { //out for delivery //101 previous
                        $response['out_for_delivery_date'] = $this->ConvertTimeZone($sprintTaskHistoryDetailvalue->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                        $response['out_for_delivery_time'] = $this->ConvertTimeZone($sprintTaskHistoryDetailvalue->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                    }
                    if ($sprintTaskHistoryDetailvalue['status_id'] == 17 || $sprintTaskHistoryDetailvalue['status_id'] == 113 || $sprintTaskHistoryDetailvalue['status_id'] == 114 || $sprintTaskHistoryDetailvalue['status_id'] == 116 || $sprintTaskHistoryDetailvalue['status_id'] == 117 || $sprintTaskHistoryDetailvalue['status_id'] == 118 || $sprintTaskHistoryDetailvalue['status_id'] == 132 || $sprintTaskHistoryDetailvalue['status_id'] == 138 || $sprintTaskHistoryDetailvalue['status_id'] == 139 || $sprintTaskHistoryDetailvalue['status_id'] == 144) { //completed
                        $response['delivered_success_message'] = $this->statusmap($laststatus_key);
                    }

                }

                $count = 0;

                if ($laststatus_key == 61 || $laststatus_key == 125) { // order approved
                    $count = 20;
                }
                if ($laststatus_key == 133 || $laststatus_key == 124 || $laststatus_key == 13 || $laststatus_key == 24 || $laststatus_key == 32 || $laststatus_key == 67) { // processing
                    $count = 40;
                }
                //    if($laststatus_key==121){ //assigned to joey
                //  if(isset($merchantid->joeyRouteLocationDetail->joeyRouteDetail->created_at)){
                if (isset($response['assigned_to_joey_date'])) {
                    $count = 60;
                }
                if ($laststatus_key == 121 || $laststatus_key == 15 || $laststatus_key == 28 || $laststatus_key == 68) { //out for delivery //101 previous
                    $count = 80;
                }
                if ($laststatus_key == 113 || $laststatus_key == 17 || $laststatus_key == 114 || $laststatus_key == 116 || $laststatus_key == 117 || $laststatus_key == 118 || $laststatus_key == 132 || $laststatus_key == 138 || $laststatus_key == 139 || $laststatus_key == 144) { //completed
                    $response['completed_date'] = $this->ConvertTimeZone($merchantid->sprintTaskHistoryDetail[count($laststatus) - 1]->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                    $response['completed_time'] = $this->ConvertTimeZone($merchantid->sprintTaskHistoryDetail[count($laststatus) - 1]->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                    $count = 100;

                    $response['joey_lat'] = (float)substr_replace($merchantid->locationDetail->latitude, '.', 2, 0);
                    if (isset($response['joey_long'])) {
                        if (strlen($response['joey_long']) >= 9) {

                            $response['joey_long'] = (float)substr_replace($merchantid->locationDetail->longitude, '.', 4, 0);

                        } else {
                            $response['joey_long'] = (float)substr_replace($merchantid->locationDetail->longitude, '.', 3, 0);

                        }
                    }

                }

                if (in_array($laststatus_key, [18, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 131, 135, 136, 140, 145])) { //returned
                    $response['completed_date'] = $this->ConvertTimeZone($merchantid->sprintTaskHistoryDetail[count($laststatus) - 1]->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                    $response['completed_time'] = $this->ConvertTimeZone($merchantid->sprintTaskHistoryDetail[count($laststatus) - 1]->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                    $count = 101;
                    $response['delivered_success_message'] = $this->statusmap($laststatus_key);

                }

                //    echo $merchantid->sprintTaskDetail->sprintTaskHistoryDetail[count($laststatus)-1]->id;die;
                $response['latest_status_count'] = $count;

                // $response['customer_lat']=$merchantid->sprintTaskDetail->locationDetail->latitude;
                // $response['customer_long']=$merchantid->sprintTaskDetail->locationDetail->longitude;


               /* $response['instructions'] = 'No Instructions found';

                if (!empty($merchantid->description)) {
                    $response['instructions'] = $merchantid->sprintTaskDetail->description;
                }*/

                if (!isset($response['order_confirmed_date'])) {
                    $response['order_confirmed_date'] = $this->ConvertTimeZone($merchantid->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                    $response['order_confirmed_time'] = $this->ConvertTimeZone($merchantid->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                }

                // merchant se task id lkr task se sprint id lkr sprint reattempt me check kro


                // echo $merchantid->sprintTaskDetail->id;die;
                $expected_date = '';
                $response['is_amazon'] = 0;
                // echo $merchantid->sprintTaskDetail->id;die;
                $vendor_check = $merchantid->sprintDetail->creator_id;
                if ($vendor_check == 477260 || $vendor_check == 477282 || $vendor_check == 476592) {

                    // echo 1;die;
                    $response['is_amazon'] = 1;
                    // $expected_date=date('Y-m-d H:i:s', strtotime($this->ConvertTimeZone($merchantid->created_at->toDateTimeString(),"UTC",'America/Toronto'). ' +1 day'));
                    $amazon_sprint_task_histories = $merchantid->sprintTaskHistoryDetail;
                    if (!empty($amazon_sprint_task_histories)) {
                        foreach ($amazon_sprint_task_histories as $amazon_sprint_task_history) {
                            if ($amazon_sprint_task_history->status_id == 13) {
                                $expected_date = date('Y-m-d H:i:s', strtotime($this->ConvertTimeZone($amazon_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto') . ' +1 day'));
                            }
                        }
                        if ($expected_date == '') {
                            foreach ($amazon_sprint_task_histories as $amazon_sprint_task_history) {
                                if ($amazon_sprint_task_history->status_id == 61) {
                                    $expected_date = date('Y-m-d H:i:s', strtotime($this->ConvertTimeZone($amazon_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto') . ' +1 day'));

                                }
                            }
                        }
                    }


                } else {
                    // echo 2;die;

                    // $expected_date=date('Y-m-d H:i:s', strtotime($this->ConvertTimeZone($merchantid->created_at->toDateTimeString(),"UTC",'America/Toronto'). ' +1 day'));
                    $other_sprint_task_histories = $merchantid->sprintTaskHistoryDetail;
                    if (!empty($other_sprint_task_histories)) {
                        foreach ($other_sprint_task_histories as $other_sprint_task_history) {
                            if ($other_sprint_task_history->status_id == 125) {
                                $expected_date = date('Y-m-d H:i:s', strtotime($this->ConvertTimeZone($other_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto') . ' +1 day'));
                            }
                        }
                        if ($expected_date == '') {
                            foreach ($other_sprint_task_histories as $other_sprint_task_history) {
                                if ($other_sprint_task_history->status_id == 133) {
                                    $expected_date = date('Y-m-d H:i:s', strtotime($this->ConvertTimeZone($other_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto') . ' +1 day'));

                                }
                            }
                        }

                    }
                }

                if ($expected_date != '' || $expected_date != null) {
                    $response['expected_date'] = date("Y-m-d", strtotime($expected_date));
                    $response['expected_time'] = "21:00:00";
                }
                if (!empty($merchantid->sprintConfirmationDetail)) {
                    $response['current_attachment'] = $merchantid->sprintConfirmationDetail->attachment_path;
                }
                $response['vendor_name'] = $merchantid->sprintDetail->vendorInfo->name;
                return view('website.new-track-order')->with('data', $response);


            }
            else { //if tracking id not found
                return view('website.no-orders-found')->with('track_id', $orderId);
            }

        }
    }

    //Tracking Packages According To Order id Ajax Call
    public function new_track_order_ajax(Request $request)
    {

        date_default_timezone_set('America/Toronto');

        $orderId = $request->input('trackingId');

        if ($orderId != null) {

            $merchantid = SprintTask::where('sprint_id', $orderId)->where('type','dropoff')->first();

            if (!empty($merchantid)) { //if tracking id found
                $response['sprint_id'] = $orderId;

                if (!empty($merchantid)) {

                    $reattempt_sprint_task_histories = $merchantid->sprintTaskHistoryDetails;

                    $return_history = [];

                    if (count($reattempt_sprint_task_histories) > 0) {


                        $count_for_first_confiramtion = 0;
                        foreach ($reattempt_sprint_task_histories as $reattempt_sprint_task_history) {
                            $s_id = $reattempt_sprint_task_history->status_id;

                            if ($s_id == 13) {//at hub processing
                                $return_history[0][$count_for_first_confiramtion]['attempt'] = 1;
                                $return_history[0][$count_for_first_confiramtion]['status_id'] = $s_id;
                                $return_history[0][$count_for_first_confiramtion]['status_msg'] = "At Hub Processing - Reattempt";
                                $return_history[0][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                $return_history[0][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                            } elseif ($s_id == 61) {//order at store

                                $response['order_confirmed_date'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                                $response['order_confirmed_time'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');

                                // $return_history[0][$count_for_first_confiramtion]['count']=0;
                                $return_history[0][$count_for_first_confiramtion]['attempt'] = 1;
                                $return_history[0][$count_for_first_confiramtion]['status_id'] = $s_id;
                                $return_history[0][$count_for_first_confiramtion]['status_msg'] = "Order At Store";
                                $return_history[0][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                $return_history[0][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                            } elseif ($s_id == 121 || $s_id == 15 || $s_id == 28) {//out for delivery

                                $return_history[0][$count_for_first_confiramtion]['attempt'] = 1;
                                $return_history[0][$count_for_first_confiramtion]['status_id'] = $s_id;
                                $return_history[0][$count_for_first_confiramtion]['status_msg'] = "Out For Delivery";
                                $return_history[0][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                $return_history[0][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                            } elseif ($s_id == 124) {//at hub processing

                                $return_history[0][$count_for_first_confiramtion]['attempt'] = 1;
                                $return_history[0][$count_for_first_confiramtion]['status_id'] = $s_id;
                                $return_history[0][$count_for_first_confiramtion]['status_msg'] = "At Hub Processing";
                                $return_history[0][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                $return_history[0][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');

                            } elseif ($s_id == 125) {//pickup at store
                                // if($return_history[0]['count']<50){$return_history[0]['count']=50;}
                                $return_history[0][$count_for_first_confiramtion]['status_msg'] = "Pickup At Store";
                                // $return_history[0][$count_for_first_confiramtion]['count']=0;
                                $return_history[0][$count_for_first_confiramtion]['attempt'] = 1;
                                $return_history[0][$count_for_first_confiramtion]['status_id'] = $s_id;
                                $return_history[0][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                $return_history[0][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');

                            } elseif ($s_id == 133) {//packages sorted
                                // if($return_history[0]['count']<50){$return_history[0]['count']=50;}
                                // $return_history[0][$count_for_first_confiramtion]['count']=0;
                                $return_history[0][$count_for_first_confiramtion]['attempt'] = 1;
                                $return_history[0][$count_for_first_confiramtion]['status_id'] = $s_id;
                                $return_history[0][$count_for_first_confiramtion]['status_msg'] = "Packages Sorted";
                                $return_history[0][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                $return_history[0][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');

                            }

                            // if($s_id==114 ||$s_id==113 || $s_id==116 || $s_id==17){//successfully delivered at door,successfully hand delivered,successfully delivered to neighbour,successfully delivered
                            //     //    if($return_history[0]['count']<100){$return_history[0]['count']=100;}
                            //     $return_history[0][17]['time']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                            //    $return_history[0][17]['date']=$this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                            //     $return_history[0]['success_message']= $this->statusmap($s_id);
                            //     if(!empty($reattempt_sprint_task_history->getSprintConfirmationDetail)){
                            //      $return_history[0]['attachment']= $reattempt_sprint_task_history->getSprintConfirmationDetail->attachment_path;
                            //     }
                            // }
                            else {
                                //  $return_history[0][$count_for_first_confiramtion]['count']=0;
                                $return_history[0][$count_for_first_confiramtion]['attempt'] = 1;
                                $return_history[0][$count_for_first_confiramtion]['status_id'] = $s_id;
                                $return_history[0][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                $return_history[0][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                                $return_history[0][$count_for_first_confiramtion]['status_msg'] = $this->statusmap($s_id);
                                if (!empty($reattempt_sprint_task_history->getSprintConfirmationDetail)) {
                                    $return_history[0][$count_for_first_confiramtion]['attachment'] = $reattempt_sprint_task_history->getSprintConfirmationDetail->attachment_path ?? '';
                                    $response['reattempt_first_attachment'] = $reattempt_sprint_task_history->getSprintConfirmationDetail->attachment_path ?? '';
                                }
                            }
                            $count_for_first_confiramtion++;
                        }
                    }

                    if (!empty($merchantid->sprintReattemptDetail->getReattempt->sprint_id)) {


                        // $reattempt_second_task_history=DB::table('sprint__tasks_history')->where('sprint_id',$merchantid->sprintTaskDetail->sprintReattemptDetail->getReattempt->reattempt_of)->get();
                        $reattempt_second_task_history = $merchantid->sprintReattemptDetail->getReattempt->sprintTaskHistoryDetails;
                        // print_r($merchantid->sprintTaskDetail->sprintReattemptDetail->getReattempt);die;
                        if (count($reattempt_second_task_history) > 0) {
                            $response['order_confirmed_date'] = $this->ConvertTimeZone($merchantid->sprintReattemptDetail->getReattempt->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                            $response['order_confirmed_time'] = $this->ConvertTimeZone($merchantid->sprintReattemptDetail->getReattempt->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                            // echo 1;die;
                            // $return_history[1]['count']=0;
                            // $return_history[1]['attempt']=2;
                            $count_for_first_confiramtion = 0;
                            foreach ($reattempt_second_task_history as $reattempt_second_sprint_task_history) {

                                $s_id = $reattempt_second_sprint_task_history->status_id;

                                // if($s_id==125){//order at store
                                //     if($return_history[1]['count']<25){$return_history[1]['count']=25;}
                                //     $return_history[1][$s_id]['time']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','H:i:s');
                                //     $return_history[1][$s_id]['date']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','Y-m-d');
                                // }
                                // if($s_id==133){//packages sorted
                                //     if($return_history[1]['count']<50){$return_history[1]['count']=50;}
                                //     $return_history[1][$s_id]['time']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','H:i:s');
                                //     $return_history[1][$s_id]['date']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','Y-m-d');

                                // }
                                // if($s_id==121){//out for delivery
                                //   if($return_history[1]['count']<75){$return_history[1]['count']=75;}
                                //   $return_history[1][$s_id]['time']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','H:i:s');
                                //   $return_history[1][$s_id]['date']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','Y-m-d');
                                // }
                                // if($s_id==114 ||$s_id==113 || $s_id==116 || $s_id==17){//successfully delivered at door,successfully hand delivered,successfully delivered to neighbour,successfully delivered
                                //    if($return_history[1]['count']<100){$return_history[1]['count']=100;}
                                //     $return_history[1][17]['time']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','H:i:s');
                                //    $return_history[1][17]['date']=$this->ConvertTimeZone((!is_string($reattempt_second_sprint_task_history->created_at)?$reattempt_second_sprint_task_history->created_at->toDateTimeString() :$reattempt_second_sprint_task_history->created_at),"UTC",'America/Toronto','Y-m-d');
                                //     $return_history[1]['success_message']= $this->statusmap($s_id);
                                //     if(!empty($reattempt_second_sprint_task_history->getSprintConfirmationDetail)){
                                //     $return_history[1]['attachment']= $reattempt_second_sprint_task_history->getSprintConfirmationDetail->attachment_path;
                                //     }
                                // }


                                if ($s_id == 13) {//at hub processing
                                    // if($return_history[0]['count']<25){$return_history[0]['count']=25;}
                                    // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                    $return_history[1][$count_for_first_confiramtion]['attempt'] = 2;
                                    $return_history[1][$count_for_first_confiramtion]['status_id'] = $s_id;
                                    $return_history[1][$count_for_first_confiramtion]['status_msg'] = "At Hub Processing - Reattempt";
                                    $return_history[1][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                    $return_history[1][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                                }
                                if ($s_id == 61) {//order at store
                                    // if($return_history[1]['count']<25){$return_history[1]['count']=25;}
                                    // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                    $response['order_confirmed_date'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                                    $response['order_confirmed_time'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');

                                    $return_history[1][$count_for_first_confiramtion]['attempt'] = 2;
                                    $return_history[1][$count_for_first_confiramtion]['status_id'] = $s_id;
                                    $return_history[1][$count_for_first_confiramtion]['status_msg'] = "Order At Store";
                                    $return_history[1][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                    $return_history[1][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                                }
                                if ($s_id == 121) {//out for delivery
                                    //   if($return_history[1]['count']<75){$return_history[1]['count']=75;}
                                    // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                    $return_history[1][$count_for_first_confiramtion]['attempt'] = 2;
                                    $return_history[1][$count_for_first_confiramtion]['status_id'] = $s_id;
                                    $return_history[1][$count_for_first_confiramtion]['status_msg'] = "Out For Delivery";
                                    $return_history[1][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                    $return_history[1][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                                }
                                if ($s_id == 124) {//at hub processing
                                    // if($return_history[1]['count']<50){$return_history[1]['count']=50;}
                                    // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                    $return_history[1][$count_for_first_confiramtion]['attempt'] = 2;
                                    $return_history[1][$count_for_first_confiramtion]['status_id'] = $s_id;
                                    $return_history[1][$count_for_first_confiramtion]['status_msg'] = "At Hub Processing";
                                    $return_history[1][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                    $return_history[1][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');

                                }
                                if ($s_id == 125) {//pickup at store
                                    // if($return_history[1]['count']<50){$return_history[1]['count']=50;}
                                    // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                    $return_history[1][$count_for_first_confiramtion]['attempt'] = 2;
                                    $return_history[1][$count_for_first_confiramtion]['status_id'] = $s_id;
                                    $return_history[1][$count_for_first_confiramtion]['status_msg'] = "Pickup At Store";
                                    $return_history[1][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                    $return_history[1][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');

                                }
                                if ($s_id == 133) {//packages sorted
                                    // if($return_history[1]['count']<50){$return_history[1]['count']=50;}
                                    // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                    $return_history[1][$count_for_first_confiramtion]['attempt'] = 2;
                                    $return_history[1][$count_for_first_confiramtion]['status_id'] = $s_id;
                                    $return_history[1][$count_for_first_confiramtion]['status_msg'] = "Packages Sorted";
                                    $return_history[1][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                    $return_history[1][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');

                                }

                                // if($s_id==114 ||$s_id==113 || $s_id==116 || $s_id==17){//successfully delivered at door,successfully hand delivered,successfully delivered to neighbour,successfully delivered
                                //     //    if($return_history[1]['count']<100){$return_history[1]['count']=100;}
                                //     $return_history[1][17]['time']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','H:i:s');
                                //    $return_history[1][17]['date']=$this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(),"UTC",'America/Toronto','Y-m-d');
                                //     $return_history[1]['success_message']= $this->statusmap($s_id);
                                //     if(!empty($reattempt_second_sprint_task_history->getSprintConfirmationDetail)){
                                //      $return_history[1]['attachment']= $reattempt_second_sprint_task_history->getSprintConfirmationDetail->attachment_path;
                                //     }
                                // }
                                else {
                                    // $return_history[1][$count_for_first_confiramtion]['count']=0;
                                    $return_history[1][$count_for_first_confiramtion]['attempt'] = 2;
                                    $return_history[1][$count_for_first_confiramtion]['status_id'] = $s_id;
                                    $return_history[1][$count_for_first_confiramtion]['time'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                                    $return_history[1][$count_for_first_confiramtion]['date'] = $this->ConvertTimeZone($reattempt_second_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                                    $return_history[1][$count_for_first_confiramtion]['status_msg'] = $this->statusmap($s_id);
                                    if (!empty($reattempt_second_sprint_task_history->getSprintConfirmationDetail)) {
                                        $return_history[1][$count_for_first_confiramtion]['attachment'] = $reattempt_second_sprint_task_history->getSprintConfirmationDetail->attachment_path ?? '';
                                        $response['reattempt_second_attachment'] = $reattempt_sprint_task_history->getSprintConfirmationDetail->attachment_path ?? '';
                                    }
                                }
                                $count_for_first_confiramtion++;


                            }


                        }
                    }
                    if (isset($return_history)) {
                        if (!empty($return_history)) {
                            if (count($return_history) > 1) {
                                $return_history = array_reverse($return_history);
                            }
                        }
                    }

                    $response['return_history'] = $return_history;

                }

                //Done
                if (isset($merchantid->sprintDetail->joeyInfo)) {
                    $response['joey_name'] = $merchantid->sprintDetail->joeyInfo->first_name . ' ' . $merchantid->sprintDetail->joeyInfo->last_name;
                    $response['joey_image'] = $merchantid->sprintDetail->joeyInfo->image;
                    if (isset($merchantid->sprintDetail->joeyInfo->joeyLocationDetail)) {
                        $response['joey_lat'] = $merchantid->sprintDetail->joeyInfo->joeyLocationDetail->latitude;
                        $response['joey_long'] = $merchantid->sprintDetail->joeyInfo->joeyLocationDetail->longitude;

                    } else {
                        $response['joey_lat'] = 0;
                        $response['joey_long'] = 0;
                    }
                    $response['joey_lat'] = (float)substr_replace($response['joey_lat'], '.', 2, 0);


                    if (isset($response['joey_long'])) {
                        if (strlen($response['joey_long']) >= 9) {

                            $response['joey_long'] = (float)substr_replace($response['joey_long'], '.', 4, 0);

                        } else {
                            $response['joey_long'] = (float)substr_replace($response['joey_long'], '.', 3, 0);

                        }
                    }

                    $response['joey_phone'] = $merchantid->sprintDetail->joeyInfo->phone;
                }

                if (isset($merchantid->locationDetail))
                {
                    $response['cityname'] = $merchantid->locationDetail->cityDetail->name ?? '';
                    $response['delivery_address'] = $merchantid->locationDetail->address ?? '';
                }
                elseif (isset($merchantid->locationDetail))
                {
                    $response['cityname'] = $merchantid->locationDetail->cityDetail->name ?? '';
                    $response['delivery_address'] = $merchantid->locationDetail->address  ?? '';
                }

                // print_r($response);die();

                $laststatus = $merchantid->sprintTaskHistoryDetail;
                $laststatus_key = $merchantid->sprintTaskHistoryDetail[count($laststatus) - 1]->status_id;

                $vendor_check = $merchantid->sprintDetail->creator_id;

                foreach ($merchantid->sprintTaskHistoryDetail as $sprintTaskHistoryDetailvalue) {

                    if ($vendor_check == 477260 || $vendor_check == 477282 || $vendor_check == 476592) {

                        if ($sprintTaskHistoryDetailvalue['status_id'] == 133 || $sprintTaskHistoryDetailvalue['status_id'] == 13 || $sprintTaskHistoryDetailvalue['status_id'] == 24 || $sprintTaskHistoryDetailvalue['status_id'] == 32 || $sprintTaskHistoryDetailvalue['status_id'] == 67) { // processing
                            $response['processing_date'] = $this->ConvertTimeZone($sprintTaskHistoryDetailvalue->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                            $response['processing_time'] = $this->ConvertTimeZone($sprintTaskHistoryDetailvalue->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                        }

                    }
                    else {
                        if ($sprintTaskHistoryDetailvalue['status_id'] == 124 || $sprintTaskHistoryDetailvalue['status_id'] == 13 || $sprintTaskHistoryDetailvalue['status_id'] == 24 || $sprintTaskHistoryDetailvalue['status_id'] == 32 || $sprintTaskHistoryDetailvalue['status_id'] == 67) { // processing
                            $response['processing_date'] = $this->ConvertTimeZone($sprintTaskHistoryDetailvalue->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                            $response['processing_time'] = $this->ConvertTimeZone($sprintTaskHistoryDetailvalue->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                        }
                    }

                    if ($sprintTaskHistoryDetailvalue['status_id'] == 121 || $sprintTaskHistoryDetailvalue['status_id'] == 15 || $sprintTaskHistoryDetailvalue['status_id'] == 28) { //out for delivery //101 previous
                        $response['out_for_delivery_date'] = $this->ConvertTimeZone($sprintTaskHistoryDetailvalue->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                        $response['out_for_delivery_time'] = $this->ConvertTimeZone($sprintTaskHistoryDetailvalue->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                    }
                    if ($sprintTaskHistoryDetailvalue['status_id'] == 17 || $sprintTaskHistoryDetailvalue['status_id'] == 113 || $sprintTaskHistoryDetailvalue['status_id'] == 114 || $sprintTaskHistoryDetailvalue['status_id'] == 116 || $sprintTaskHistoryDetailvalue['status_id'] == 117 || $sprintTaskHistoryDetailvalue['status_id'] == 118 || $sprintTaskHistoryDetailvalue['status_id'] == 132 || $sprintTaskHistoryDetailvalue['status_id'] == 138 || $sprintTaskHistoryDetailvalue['status_id'] == 139 || $sprintTaskHistoryDetailvalue['status_id'] == 144) { //completed
                        $response['delivered_success_message'] = $this->statusmap($laststatus_key);
                    }

                }

                $count = 0;

                if ($laststatus_key == 61 || $laststatus_key == 125) { // order approved
                    $count = 20;
                }
                if ($laststatus_key == 133 || $laststatus_key == 124 || $laststatus_key == 13 || $laststatus_key == 24 || $laststatus_key == 32 || $laststatus_key == 67) { // processing
                    $count = 40;
                }
                if (isset($response['assigned_to_joey_date'])) {
                    $count = 60;
                }
                if ($laststatus_key == 121 || $laststatus_key == 15 || $laststatus_key == 28 || $laststatus_key == 68) { //out for delivery //101 previous
                    $count = 80;
                }
                if ($laststatus_key == 113 || $laststatus_key == 114 || $laststatus_key == 116 || $laststatus_key == 117 || $laststatus_key == 118 || $laststatus_key == 132 || $laststatus_key == 138 || $laststatus_key == 139 || $laststatus_key == 144) { //completed
                    $response['completed_date'] = $this->ConvertTimeZone($merchantid->sprintTaskHistoryDetail[count($laststatus) - 1]->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                    $response['completed_time'] = $this->ConvertTimeZone($merchantid->sprintTaskHistoryDetail[count($laststatus) - 1]->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                    $count = 100;

                    $response['joey_lat'] = (float)substr_replace($merchantid->locationDetail->latitude, '.', 2, 0);
                    if (isset($response['joey_long'])) {
                        if (strlen($response['joey_long']) >= 9) {

                            $response['joey_long'] = (float)substr_replace($merchantid->locationDetail->longitude, '.', 4, 0);

                        } else {
                            $response['joey_long'] = (float)substr_replace($merchantid->locationDetail->longitude, '.', 3, 0);

                        }
                    }

                }

                if (in_array($laststatus_key, [101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 131, 135, 136, 140, 145,17])) { //returned
                    $response['completed_date'] = $this->ConvertTimeZone($merchantid->sprintTaskHistoryDetail[count($laststatus) - 1]->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                    $response['completed_time'] = $this->ConvertTimeZone($merchantid->sprintTaskHistoryDetail[count($laststatus) - 1]->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                    $count = 101;
                    $response['delivered_success_message'] = $this->statusmap($laststatus_key);

                }

                $response['latest_status_count'] = $count;

                $response['instructions'] = 'No Instructions found';
                if (!empty($merchantid->description)) {
                    $response['instructions'] = $merchantid->sprintTaskDetail->description;
                }

                if (!isset($response['order_confirmed_date'])) {
                    $response['order_confirmed_date'] = $this->ConvertTimeZone($merchantid->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'Y-m-d');
                    $response['order_confirmed_time'] = $this->ConvertTimeZone($merchantid->created_at->toDateTimeString(), "UTC", 'America/Toronto', 'H:i:s');
                }

                $expected_date = '';
                $response['is_amazon'] = 0;

                $vendor_check = $merchantid->sprintDetail->creator_id;
                if ($vendor_check == 477260 || $vendor_check == 477282 || $vendor_check == 476592) {

                    $response['is_amazon'] = 1;
                    $amazon_sprint_task_histories = $merchantid->sprintTaskHistoryDetail;
                    if (!empty($amazon_sprint_task_histories)) {
                        foreach ($amazon_sprint_task_histories as $amazon_sprint_task_history) {
                            if ($amazon_sprint_task_history->status_id == 13) {
                                $expected_date = date('Y-m-d H:i:s', strtotime($this->ConvertTimeZone($amazon_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto') . ' +1 day'));
                            }
                        }
                        if ($expected_date == '') {
                            foreach ($amazon_sprint_task_histories as $amazon_sprint_task_history) {
                                if ($amazon_sprint_task_history->status_id == 61) {
                                    $expected_date = date('Y-m-d H:i:s', strtotime($this->ConvertTimeZone($amazon_sprint_task_history->created_at->toDateTimeString(), "UTC", 'America/Toronto') . ' +1 day'));

                                }
                            }
                        }
                    }


                }
                else {
                    $sprintEta = date('Y-m-d h:i:s', strtotime($merchantid->eta_time));

                    $expected_date = date('Y-m-d H:i:s', strtotime($this->ConvertTimeZone($sprintEta, "UTC", 'America/Toronto') . ' +1 day'));
                }

                if ($expected_date != '' || $expected_date != null) {
                    $response['expected_date'] = date("Y-m-d", strtotime($expected_date));
                    $response['expected_time'] = "21:00:00";
                }
                if (!empty($merchantid->sprintConfirmationDetail)) {
                    $response['current_attachment'] = $merchantid->sprintConfirmationDetail->attachment_path;
                }

                if ($request->input('ajax') != null) {

                    $ajax_response['partial_view'] = view('partialviews.trackpackageorder')->with('data', $response)->render();
                    $ajax_response['joey_lat'] = (isset($response['joey_lat'])) ? (float)$response['joey_lat'] : 0;
                    $ajax_response['joey_long'] = (isset($response['joey_long'])) ? (float)$response['joey_long'] : 0;
                    $ajax_response['count'] = $count . "%";

                    echo json_encode($ajax_response);
                }


            }


        }


    }

   // convert time zone
   function ConvertTimeZone($dataTimeString,$CurrentTimeZone = 'UTC' ,$ConvertTimeZone = 'UTC',$format = 'Y-m-d H:i:s')
   {
       return Carbon::parse($dataTimeString, $CurrentTimeZone)->setTimezone($ConvertTimeZone)->format($format);
   }
   public function statusmap($id)
   {
       $statusid = array(
           "136" => "Client requested to cancel the order",
           "137" => "Delay in delivery due to weather or natural disaster",
           "118" => "left at back door",
           "117" => "left with concierge",
           "135" => "Customer refused delivery",
           "108" => "Customer unavailable-Incorrect address",
           "106" => "Customer unavailable - delivery returned",
           "107" => "Customer unavailable - Left voice mail - order returned",
           "109" => "Customer unavailable - Incorrect phone number",
           "142" => "Damaged at hub (before going OFD)",
           "143" => "Damaged on road - undeliverable",
           "144" => "Delivery to mailroom",
           "103" => "Delay at pickup",
           "139" => "Delivery left on front porch",
           "138" => "Delivery left in the garage",
           "114" => "Successful delivery at door",
           "113" => "Successfully hand delivered",
           "120" => "Delivery at Hub",
           "110" => "Delivery to hub for re-delivery",
           "111" => "Delivery to hub for return to merchant",
           "121" => "Out for delivery",
           "102" => "Joey Incident",
           "104" => "Damaged on road - delivery will be attempted",
           "105" => "Item damaged - returned to merchant",
           "129" => "Joey at hub",
           "128" => "Package on the way to hub",
           "140" => "Delivery missorted, may cause delay",
           "116" => "Successful delivery to neighbour",
           "132" => "Office closed - safe dropped",
           "101" => "Joey on the way to pickup",
           "32" => "Order accepted by Joey",
           "14" => "Merchant accepted",
           "36" => "Cancelled by JoeyCo",
           "124" => "At hub - processing",
           "38" => "Draft",
           "18" => "Delivery failed",
           "56" => "Partially delivered",
           "17" => "Delivery success",
           "68" => "Joey is at dropoff location",
           "67" => "Joey is at pickup location",
        //    "13" => "Waiting for merchant to accept",
        "13" => "At Hub Processing - Reattempt",
           "16" => "Joey failed to pickup order",
           "57" => "Not all orders were picked up",
           "15" => "Order is with Joey",
           "112" => "To be re-attempted",
           "131" => "Office closed - returned to hub",
           "125" => "Pickup at store - confirmed",
           "61" => "Scheduled order",
           "37" => "Customer cancelled the order",
           "34" => "Customer is editting the order",
           "35" => "Merchant cancelled the order",
           "42" => "Merchant completed the order",
           "54" => "Merchant declined the order",
           "33" => "Merchant is editting the order",
           "29" => "Merchant is unavailable",
           "24" => "Looking for a Joey",
           "23" => "Waiting for merchant(s) to accept",
           "28" => "Order is with Joey",
           "133" => "Packages sorted",
           "55" => "ONLINE PAYMENT EXPIRED",
           "12" => "ONLINE PAYMENT FAILED",
           "53" => "Waiting for customer to pay",
           "141" => "Lost package",
           "60" => "Task failure",
           "145" => 'Returned To Merchant',
           "146" => "Delivery Missorted, Incorrect Address",
           '147' => 'Scanned at Hub',
           '148' => 'Scanned at Hub and labelled',
           '149' => 'pick from hub',
           '150' => 'drop to other hub',
           '153' => 'Miss sorted to be reattempt',
           '154' => 'Joey unable to complete the route',
           '155' => 'To be re-attempted');
       return $statusid[$id];
   }

   public function contact()
   {
       return view('website.contact');
   }

   public function faqs()
   {
       return view('website.faqs');
   }
   public function jobs_apply(Request $request)
    {
      $data= $request->all();
        //   print_r($data);die;
     $document = $request->file('resume');
      $first_name=$data['first_name']??'';
      $last_name=$data['last_name']??'';
      $maildata['name']= $first_name.' '. $last_name;
      $maildata['email']=$data['email']??'';
      $maildata['phone']=$data['phone']??'';
      $maildata['city']=$data['city']??'';
      $maildata['job_title']=$data['job_title']??'';
      $maildata['msg']='Application for job.';
      $bg_img = 'background-image:url(' . url("/images/icon/joeyco_icon.png") . ');';
      $bg_img = trim($bg_img);
      $style = "font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';color: black !important;";
      $style1 = "font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';";
      $body = '<div class="row" style=" width: 32%;margin: 0 AUTO;">
              <div style="text-align: center;
      background-color: lightgrey;"><img src="' . url('/') . '/images/icon/logo.png" alt="Web Builder" class="img-responsive" style="margin:0 auto; width:150px;" /></div>
                  <div style="' . $bg_img . '
      background-size: contain;
      background-repeat: no-repeat;
      background-position: center;">
                <h1 style="'.$style.'">Dear Human Resource !</h1>
              <p style="'.$style.'">'.$maildata['msg'].'</p>
              <p style="margin: 0px;">Regards</p>
              <p style="margin: 0px;">Job title: ' . $maildata["job_title"].'</p>
              <p style="margin: 0px;">Name: '.$maildata['name'].' </p><p style="margin: 0px;">Email: '.$maildata['email'].' </p><p style="margin: 0px;">Phone: '.$maildata['phone'].' </p>
              <p style="margin: 0px;">City: '.$maildata['city'].' </p>
              <br/>
              </div>
               <div style="background-color: lightgrey;padding: 5px;">
      <p style="padding-bottom: -1px;margin: 0px;margin-left: 20px;'.$style.'">JoeyCo Inc.</p>
      <p style="margin-top: 0x;margin: 0px;margin-left: 20px;'.$style.'">16 Four Seasons Pl., Etobicoke, ON M9B 6E5</p>
      <p style="margin: 0px;margin-left: 20px;'.$style.'">+1 (855) 556-3926 · support@joeyco.com </p>
      </div>
              </div>
              ';
        Mail::send([], [], function ($message) use($document,$body){
          $message->to('hr@joeyco.com')
            ->subject('Job Application')
            ->setBody($body, 'text/html')
            ->attach(
                \Swift_Attachment::fromPath($document)
                    ->setFilename(
                        $document->getClientOriginalName()
                    )
                    ->setContentType(
                        $document->getClientMimeType()
                    )
            );
        });
        return redirect('/jobs-apply/success');


    }
    public function jobs_apply_success()
    {
        return view('website.job-apply-success');
    }

    public function add_info(Request $request,MerchantId $id)
    {
        $data_info = $request->all();

        $add_info= $data_info['add_info'];
        $phone_ids = $data_info['phone'];
        $phone_match_data = '+1'.$phone_ids;
        $tracking_id = $request->input('tracking_id');

        if(isset($tracking_id))
        {
            $merchant_query =  MerchantId::where('tracking_id',$tracking_id)->first(['additional_info','tracking_id','task_id','id']);
            $add_info_exist = $merchant_query->additional_info;

            $match_data = MerchantId::with('sprintTaskDetail','sprintTaskDetail.contact_details')
                ->whereHas('sprintTaskDetail',function ($query) use ($merchant_query){
                    $query->where('id',$merchant_query->task_id);
                    $query->whereNull('deleted_at');
                })
                ->where('tracking_id',$merchant_query->tracking_id)->where('task_id',$merchant_query->task_id)
                ->whereNotNull('tracking_id')
                ->first();

            $phone_data = $match_data->sprintTaskDetail->contact_details->phone;

            if(isset($merchant_query))
            {
                if($merchant_query->additional_info == null && $phone_data == $phone_match_data)
                {


                    $add_info_post = MerchantId::find($merchant_query->id)
                        ->where('tracking_id',$merchant_query->tracking_id)
                        ->update(['additional_info' => $add_info]);

                }
                else
                {
                    if($phone_data == $phone_match_data)
                    {

                        $full_info = $add_info_exist.' '.$add_info;
                        $add_info_post = MerchantId::find($merchant_query->id)
                            ->where('tracking_id',$merchant_query->tracking_id)
                            ->update(['additional_info' =>  $full_info]);
                    }
                    else{

                        return back()->with('error','Invalid Phone Number!');
                    }
                }
            }

            return redirect()->back()->with('success',' Successfully Submit');

        }

    }
}

