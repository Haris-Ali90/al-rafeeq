<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Interfaces\UserInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class JCUser extends Authenticatable implements UserInterface
{
    use HasFactory,Notifiable;
    public $table = 'jc_users';
    protected $guarded = [];


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'full_name', 'email_address','phone_no','city','state','street','address','type','password','user_phone','user_city','user_state','user_street','user_address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
     protected $metaTable = 'user_meta';

    /**
     * Meta data model relating to this model.
     *
     * @var string
     */
    protected $metaModel = UserMeta::class;


    public function metas()
    {
        return $this->hasMany(UserMeta::class, 'user_id');
    }


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotAdmin($query)
    {
        $admin_role_id =  config('app.super_admin_role_id');
        return $query->where('role_id', '!=',$admin_role_id);
    }

    public function isAdmin() {
        return (bool) (intval($this->attributes['role_id']) === self::ROLE_ADMIN);
    }

    public function IsUserActive()
    {
        return  ($this->status == self::ACTIVE) ? true : false ;
    }

    /**
     * User Related Method
     */
    public function validateUserActiveCriteria() : bool
    {
        if((int)$this->attributes['is_active'] === 0){

            if((int)$this->attributes['is_unblock'] === 0){
                //throw new \Mockery\Exception('Your account has been blocked by the admin, please contact '. constants('global.site.name').' admin');
                throw new \App\Exceptions\UserNotAllowedToLogin('Your account has been blocked by the admin, please contact ', 'account_block');
            }
            if((int)$this->attributes['is_verified'] === 0){
                //throw new \Mockery\Exception('Your account has not been verify by the admin, please contact '. constants('global.site.name').' admin');
                throw new \App\Exceptions\UserNotAllowedToLogin('Your account has not been verify by the admin, please contact ', 'account_verify');
            }

            if((int)$this->attributes['email_verified'] !== 1){
                //throw new \Mockery\Exception('Your email is not verified please verify your email first.');
                throw new \App\Exceptions\UserNotAllowedToLogin('Your email is not verified please verify your email first.', 'account_email_verify');
            }

            if((int)$this->attributes['sms_verified'] !== 1){
                //throw new \Mockery\Exception('Please verify your mobile number first, it\'s not verified.');
                throw new \App\Exceptions\UserNotAllowedToLogin('Please verify your mobile number first, it\'s not verified.', 'account_sms_verify');
            }

            //throw new \Mockery\Exception('Your account is inactive, please contact '. constants('global.site.name').' admin');
            throw new \App\Exceptions\UserNotAllowedToLogin('Your account is inactive, please contact '. constants('global.site.name').' admin', 'account_active');
        }

        return true;

    }

    /**
     * Customer Deactivate
     */
    public function deactivate() : void
    {
        $this->is_active  = 0;
        $this->save();
    }

    /**
     * Customer Activate
     */
    public function activate() : void
    {
        $this->is_active  = 1;
        $this->save();
    }

    /**
     * Set Status text Format
     */
    public function getStatusTextFormattedAttribute() : string
    {
        return (int)$this->attributes['status'] === 1 ?
            '<a href="'. route('sub-admin.inactive', $this->attributes['id']) .'"><span class="label label-success">Active</span></a>' :
            '<a href="'. route('sub-admin.active', $this->attributes['id']) .'"><span class="label label-warning">Inactive</span></a>';
    }

    /**
     * Send Reset Password Email
     */
    public function sendPasswordResetEmail($email,$token,$role_id)
    {
        $this->notify(new AdminResetPasswordNotification($email,$token,$role_id));
    }

    /**
     * Get Phone format
     */
    public function getPhoneFormattedAttribute()
    {

        return $this->attributes['phone'] ? phone($this->attributes['phone'])->formatNational() : '';// $this->attributes['phone'] : '';
    }

/*    public function getProfilePictureAttribute() {
        $file = $this->attributes['profile_picture'];
        return is_file(backendUserFile().$file) ? backendUserUrl($file) : backendUserUrl(constants('front.default.admin'));
    }*/

 /*   public function getProfilePictureAutoAttribute() : string
    {
        $file = $this->attributes['profile_picture'];
        return is_file(backendUserFile().$file) ? $file : constants('front.default.admin');
    }*/


    /**
     * Get current permissions user.
     *
     * @return array
     */
    public function getPermissions()
    {
        return $this->Permissions->pluck('route_name')->toArray();
    }


    /**
     * Get dashboard cards rights user.
     *
     * @return array
     */
    public function getDashboardCardsPermissionsArray()
    {
        $data = $this->Role->pluck('dashbaord_cards_rights');

    }



    /**
     * Get the role of user.
     *
     * @return array
     */

    public function Role()
    {

        return $this->belongsTo(Roles::class, 'role_type','id');
    }
    public function microHubRequest()
    {

        return $this->hasOne(MicroHubRequest::class, 'jc_user_id','id');
    }
    // public function getOwnJoey()
    // {

    //     return $this->hasOne(MicroHubRequest::class, 'jc_user_id','id');
    // }



    /**
     * Get the role of user.
     *
     * @return array
     */

    public function DashboardCardRightsArray()
    {
        $rights = false;
        $data = $this->Role()->pluck('dashbaord_cards_rights')->first();

        if($this->role_type == Permissions::GetSuperAdminRole())
        {
            return true;
        }

        if($data != null && $data != '')
        {
            $rights = explode(',',$data);

        }

        return $rights;

    }

    /**
     * Get the role permissions .
     *
     * @return array
     */

    public function Permissions()
    {
        return $this->hasMany(Permissions::class, 'role_id','role_type');
    }

    // public function getFullname()
    // {

    //     return $this->first_name . ' ' . $this->last_name;
    // }


    /**
     * Get permissions data extracted .
     *
     * @return array
     */

    public function PermissionsExtract()
    {
        return $this->hasMany(Permissions::class, 'role_id','role_type')->pluck('route_name')->toArray();
    }

 public  function sendWelcomeEmail()
 {
     $email = $this->attributes['email'];
     $name = $this->attributes['full_name'];
     $token = uniqid(Str::random(64),true);

 /*    DB::table(config('auth.passwords.users.table'))->insert([
         'email' => $email,
         'token' => $token,
         'created_at' => Carbon::now()
     ]);*/
     DB::table('password_resets')->insert([
         'email' => $email,
         'token' => $token,
         'created_at' => Carbon::now()
     ]);

     $resetUrl = url('/reset-password?email='.$email.'&token='.$token.'');

     return  $this->notify(new \App\Notifications\Backend\ResetPasswordEmailSend($resetUrl,$name));

 }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    // public function getFullNameAttribute()
    // {
    //     return "{$this->first_name} {$this->last_name}";
    // }

    public function createNotification($text, array $notification_data = [])
    {
        $notification = (new Notification)->createNotification([
            'notification' => $text,
            'notification_type' => array_key_exists('type', $notification_data) ? $notification_data['type'] : '',
            'notification_data' => array_diff_key($notification_data, ['type' => '']), // InApp payload
            'is_read' => 1,
        ])->setOwner($this);

        return $notification;
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function addDevice($deviceToken, $deviceType, $authToken)
    {
        UserDevice::whereDeviceToken($deviceToken)->delete();

        return $this->devices()->create([
            'device_token' => $deviceToken,
            'device_type'  => $deviceType,
            'auth_token'   => $authToken,
        ]);
    }

    public function updateDevice($authToken, $deviceToken, $deviceType)
    {
        $record = $this->devices()->whereAuthToken($authToken)->limit(1)->first();

        if ($record) {
            $record->device_token = $deviceToken;
            $record->device_type  = $deviceType;
            $record->save();
        }
    }

    public function removeDevice($authToken)
    {
        $record = $this->devices()->whereAuthToken($authToken)->limit(1)->first();

        if ($record) {
            $record->delete();
        }
    }

    public function devices()
    {
        return $this->hasMany(UserDevice::class);
    }

    public function contactus()
    {
        return $this->hasMany(ContactUs::class);
    }

    public function joeyDeposit()
    {
        return $this->belongsTo(JoeyDeposit::class,'id','joey_id')->where('deleted_at',null);
    }

    public function joeyVehicle()
    {
        return $this->belongsTo(JoeyVehicle::class,'id','joey_id')->where('deleted_at',null);
    }

    public function joeyLocation()
    {
        return $this->belongsTo(Location::class,'location_id','id');
    }

    public function checkProfile()
    {
        $signupProcess= [
            'document'=>0,
            'quiz'=>0,
            'joey'=>0
        ];
        $documentTypes = DocumentType::whereNull('deleted_at')->where('is_optional',0)->pluck('id')->toArray();
        $documents = JCDocument::where('jc_users_id', '=', $this->id)->whereIn('document_type_id',$documentTypes)->pluck('document_type_id')->toArray();
        if (count($documents) >= count($documentTypes))
        {
            $signupProcess['document'] = 1;
        }
        $category = OrderCategory::where('type','basic')->pluck('id')->toArray();
        $quizCheck = JCAttemptedQuiz::where('joey_id', '=', $this->id)->whereIn('category_id',$category)->where('is_passed',1)->pluck('id')->toArray();
        if (count($quizCheck) >= count($category))
        {
            $signupProcess['quiz'] = 1;
        }
        $joey_agreement = JoeyAgreement::where('user_id',$this->id)->where('user_type','joeys')->orderBy('id','desc')->first();
        if (!empty($joey_agreement)){
            $signupProcess['joey'] = 1;
        }
        return $signupProcess;
    }


    public function sendNewJoeyRegistrationEmail($randomid)
    {
        $style = "font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';color: black !important;";
        $bg_img = 'background-image:url(' . url(asset('assets/admin/joeyco_icon.png')) . ');';
        $bg_img = trim($bg_img);
        $body = '<div class="row" style=" width: 32%;margin: 0 AUTO;">
                <div style="text-align: center;
    background-color: lightgrey;"><img src="' . asset('assets/admin/logo.png').'" alt="Web Builder" class="img-responsive" style="margin:0 auto; width:150px;" /></div>
                <div style="' . $bg_img . '
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;">
                  <h1 style="'.$style.'">Hi, JoeyCo!</h1>

                 <p style="'.$style.'">New Joey has been register on your Joey portal, Please check joey detail below.</p>
                  <br/>

               <div class="row">
    <div class="col-md-4">
        Joey ID: <span>' .$this->attributes['id']. '</span>
    </div>
     <div class="col-md-4">
        Joey Name: <span>' .$this->attributes['first_name'].' '.$this->attributes['first_name']. '</span>
    </div>
     <div class="col-md-4">
        Email Address: <span>' .$this->attributes['email']. ' </span>
    </div>
    <div class="col-md-4">
        Phone Number: <span>' .$this->attributes['phone']. '</span>
    </div>
</div>

                </div>

                </div>
                ';
        $subject = "New Joey Registration";
        Mail::send(array(), array(), function ($m) use ($subject, $body) {
            $m->to('joey@joeyco.com')
                ->subject($subject)
                ->from(env('MAIL_USERNAME'))
                ->setBody($body, 'text/html');
        });
    }

}
