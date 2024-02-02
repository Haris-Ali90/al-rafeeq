<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\HubProcess;
use App\Models\City;
use App\Models\JCUser;
use App\Models\Hub;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MicroHubRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Testing\Fluent\Concerns\Has;

class MicrohubController extends Controller
{

    private $ownRiders ;
    private $fullName;
    private $email;
    private $phone;
    private $address;
    private $areaRadius;
    private $password;
    private $city;
    private $state;
    private $country;
    private $postal;

    public $my_array = [];


    public function index () {

        return view('website.microhub');
    }
    public function insert(Request $request)
    {


        $post=$request->all();
        $jcUserCheck=JCUser::where('email_address', $post['email_address'])->get();
//        dd($jcUserCheck, $post);
        $res='';
        if(count($jcUserCheck)>0){
            $res=409;
        }
        else{
            DB::beginTransaction();
            try {
                $this->password=$this->rand_string(10);

                $personal_address = $post['address22'];
                $personal_city = $post['city2'];
                $personal_state = $post['state2'];
                $personal_street = $post['street2'];

//                $city_data =  City::where('name',$post['city'])->get();
//                foreach ($city_data as $data){
//                    $city_id = $data->id;
//                    $country_id = $data->country_id;
//                    $state_id = $data->state_id;
//                }
//                $dataHub=[
//                    'title'=>      $post['full_name']??null,
//                    'address'=>     $post['address']??null,
//                    'hub_latitude'=>       $post['latitude']??0,
//                    'hub_longitude'=>       $post['longitude']??0,
//                    'city__id'=>       $city_id??0,
//                    'country__id'=>       $country_id??0,
//                    'state__id'=>      $state_id??0,
//                ];
//
//                Hub::create($dataHub);

                $lat = $post['latitude'];
                $lng = $post['longitude'];
                $postal = $post['postcode'];



                $dataJCUser=[
                    'full_name'=>       $post['full_name']??null,
                    'email_address'=>   $post['email_address']??null,
                    'phone_no'=>        $post['phone_no']??null,
                    'city'=>            $post['city']??null,
                    'state'=>           $post['state']??null,
                    'street'=>          $post['street']??null,
                    'address'=>         $post['address']??null,
                    'user_phone'=>      $post['phone_no2']??null,
                    'user_city'=>            $personal_city,
                    'user_state'=>           $personal_state,
                    'user_street'=>          $personal_street,
                    'user_address'=>         $personal_address,
                    'type'=>            1
                ];

                //Add above fields in the models
                $jcUser=JCUser::create($dataJCUser);
                $dataMicroHub=[
                    'jc_user_id'=>      $jcUser->id,
                    'area_radius'=>     $post['area_radius']??null,
                    'own_joeys'=>       $post['own_joeys']??0,
                ];
                MicroHubRequest::create($dataMicroHub);

                $this->ownRiders=($dataMicroHub['own_joeys']==1)?'Yes':"No";
                $this->fullName=$dataJCUser['full_name'];
                $this->email=$dataJCUser['email_address'];
                $this->phone=$dataJCUser['phone_no'];
                $this->address=$dataJCUser['address'];
                $this->areaRadius=$dataMicroHub['area_radius'];
                $this->city=$post['city'];
                $this->state=$post['state'];
                $this->country=$post['country'];
                $this->postal=$post['postcode'];


                array_push($this->my_array,($dataMicroHub['own_joeys']==1)?'Yes':"No",$dataJCUser,$dataMicroHub,$post);


                $token = openssl_random_pseudo_bytes(16);

                //Convert the binary data into hexadecimal representation.
                $token = bin2hex($token);


                $updating_token_to_user = DB::table('jc_users')->where('email_address', '=', $this->email)->update(['remember_token' => $token]);

                $to['email']=$this->email;
                $to['to']="Hello ".$this->fullName;
                $email = base64_encode($this->email);
                $content = "<p>Welcome to JoeyCo!</p><br>";
                $content.= "<p>To activate your account and verify your email address, please click the button below:</p><br>";

                //This need to be fixed...
                $content.= "<a href='https://www.joeyco.com/account/active/{{$email}}/{{$token}}/{$lat}/{$lng}/{$postal}'>Activate My Account</a><br>";
                //$content.= "<a href='http://localhost/joeyco.com/public/account/active/{{$email}}/{{$token}}/{$lat}/{$lng}'>Activate My Account</a><br>";


                $content.="<p>Thank you for using our application!</p><br>";
                $this->sendEmail('Successfully Registered - Micro Hub',$content,$to);



                //to team
                DB::commit();
                $res=200;
            }catch (\Exception $e) {
                DB::rollback();
                return $e->getMessage();
            }
        }
    }

    /**
     * Account being active
     */
    public function accountActive($email,$token,$lat,$lng,$postal){


        $check_duplicate_record = User::where('email',base64_decode($email))->where('role_id',5)->first();


        if(empty($check_duplicate_record)){

            $email=base64_decode($email);
            $Parsed_data = '';
            $Parsed_hub_data = '';
            $Parsed_data = JCUser::where('email_address',$email)->first();

            $Parsed_hub_data = MicroHubRequest::where('jc_user_id',$Parsed_data->id)->first();

            //This need to be fixed...
            $table='<table class="table">
                        <tbody>
                        <tr>
                            <td style="border: 1px solid black;">Full Name</td>
                                <td style="border: 1px solid black;"> '.$Parsed_data->full_name.' </td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black;">Email</td>
                            <td style="border: 1px solid black;"> '.$Parsed_data->email_address.' </td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black;">Phone</td>
                            <td style="border: 1px solid black;"> '.$Parsed_data->phone_no.' </td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black;">Address</td>
                            <td style="border: 1px solid black;"> '.$Parsed_data->address.' </td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black;">Area Radius</td>
                            <td style="border: 1px solid black;"> '.$Parsed_hub_data->area_radius.' </td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black;">Own Riders (Joeys)</td>
                            <td style="border: 1px solid black;"> '.$Parsed_hub_data->own_joeys.' </td>
                        </tr>
                        </tbody>
                    </table>';



            $this->password=$this->rand_string(10);
            $new_password_variable = $this->password;
            $updating_user_password = DB::table('jc_users')->where('email_address', '=', $email)->update(['password' => $this->password]);


            //to user also send password
            $content='<p>You requested joeyco for utilizing your space.Here are the details.</p>';
            $content.=$table;
            $content.= "<a href='https://microhub.joeyco.com/login'>Micor Hub Portal Link</a><br>";
            $content.='<p>Here is your password <b>';
            $content.= $this->password;
            $content.='</b> .</p>';
            $content.='<table width="630px" border="0" style="border-top: solid 1px #ddd;" cellpadding="0" cellspacing="0"><tbody> <tr> <td style="padding: 0;"><h3 style="font-family: Helvetica,Arial,sans-serif;font-size: 20px;font-weight: bold;margin: 0;padding: 18px 0 10px 0;color: #e26d28;">Whats Next?</h3></td></tr><tr><td style="border-bottom: solid 1px #dddddd;padding: 10px 10px 12px;font-family: Helvetica,Arial,sans-serif;"><h3 style="margin: 0;padding: 0;">Plan our visit</h3><p>Visit is the required step for approval process, please cordinate with advisor.</p></td></tr><tr><td style="border-bottom: solid 1px #dddddd;padding: 10px 10px 12px;font-family: Helvetica,Arial,sans-serif;"><h3 style="margin: 0;padding: 0;">Documents Submission</h3><p>Submit your documents in order to get approval, It takes take usually 1 week.</p></td></tr><tr><td style="border-bottom: solid 1px #dddddd;padding: 10px 10px 12px;font-family: Helvetica,Arial,sans-serif;"><h3 style="margin: 0;padding: 0;">Get Approval</h3><p>One your documents have been verified, you will receive the confirmation email from JoeyCo.</p></td></tbody></table>';

            //This need to be fixed...
            $to['email']=$Parsed_data->email_address;
            $to['to']="Hi ". $Parsed_data->full_name;
            $this->sendEmail('Callback Request with Joeyco',$content,$to);
            //to user also send password
            //to team
            $content='<p>New user request for microhub services.Here are the details.</p>';
            $content.=$table;
            $to['email']='farzan.ahmed@joeyco.com';
            $to['to']="Hi Team";
            $this->sendEmail('New Microhub Request',$content,$to);


            $cityData =  City::where('name',$Parsed_data->city)->first();

            if(empty($cityData))
            {
                $stateData = DB::table('states')->where('name',$Parsed_data->state)->first();
                $cityDataCreate = City::create([
                    'country_id'=>      $stateData->country_id,
                    'state_id'=>     $stateData->id,
                    'name'=> $Parsed_data->city,
                    'timezone'=> 'America/Toronto',

                ]);
                $city_data = $cityDataCreate;

            }
            else
            {
                $city_data = $cityData;

            }

                $city_id = $city_data->id;
                $country_id = $city_data->country_id;
                $state_id = $city_data->state_id;



                $new_entry_in_hubs = Hub::create([
                    'title'=>      $Parsed_data->full_name,
                    'address'=>     $Parsed_data->address,
                    'postal__code'=> $postal,
                    'city__id'=>       $city_id,
                    'country__id'=>       $country_id,
                    'state__id'=>      $state_id,
                    'hub_latitude' =>       $lat,
                    'hub_longitude'=>       $lng,
                ]);

                $new_entry_in_dsahboard_users = User::create([
                    'role_id' => 5,
                    'full_name' => $Parsed_data->full_name,
                    'email' => $Parsed_data->email_address,
                    'phone' => $Parsed_data->phone_no,
                    'address' => $Parsed_data->address,
                    'userType' => 'admin',
                    'hub_id'=>$new_entry_in_hubs->id??0,
                    'password'=> Hash::make($new_password_variable),
                    'location_latitude' =>       $lat,
                    'location_longitude'=>       $lng,
                    'micro_sub_admin'=> 1
                ]);


            $updating_token_to_user = DB::table('jc_users')->where('email_address', '=', $email)->update(['remember_token' => null]);
            return redirect()->guest('account/active/success');

        }
        return redirect()
            ->route('microhub-manager.page')
            ->with('message-failed', 'Account already active');

    }

    /**
     * Account being active success
     */
    public function accountActiveSuccess(){

        return redirect()
            ->route('microhub-manager.page')
            ->with('message', 'Your account has been activated successfully, Please login your account');
        //return Redirect::to('microhub-manager')->with('message',  'Your account has been activated successfully, Please login your account');
    }

    public function sendEmail($sub,$content,$to=[])
    {
        // $depart=Departments::where('id',Auth::user()->department_id)->first();
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
                    <h3 style="'.$style.'">'.$to['to'].',</h3>
                '.$content.'
                <br/>
                </div>
                    <div style="background-color: lightgrey;padding: 5px;">
        <p style="padding-bottom: -1px;margin: 0px;margin-left: 20px;'.$style.'">JoeyCo Inc.</p>
        <p style="margin-top: 0x;margin: 0px;margin-left: 20px;'.$style.'">16 Four Seasons Pl., Etobicoke, ON M9B 6E5.</p>
        <p style="margin: 0px;margin-left: 20px;'.$style.'">+1 (855) 556-3926 · support@joeyco.com</p>
        </div>
                </div>
                ';
        $toEmail=$to['email'];
        // dd($to);
        Mail::send([], [], function ($message) use($body,$sub,$toEmail){
            $message->to($toEmail)
                ->subject($sub)
                ->setBody($body, 'text/html');
            //   ->setBody('<h1>Details</h1>', 'text/html') // for HTML rich messages
            //   ->setBody('<p>Name: '.$maildata['name'].' </p><p>Email: '.$maildata['email'].' </p><p>Phone: '.$maildata['phone'].' </p><p>Message: '.$maildata['msg'].' </p>', 'text/html');
        });
        // return redirect('/book-demo/success');
    }
    function rand_string( $length ) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,$length);
    }

    public function midmile_index () {
        return view('website.landing_page');
    }
}
