<?php

namespace App;

use Awobaz\Compoships\Compoships;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Rinvex\Subscriptions\Traits\HasSubscriptions;

class User extends Authenticatable
{
    use HasSubscriptions;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'type', 'mobile','pic','situation','description','resume','about','instagram','height','weight','lang','job','doctor','address','diagnose','slp','history','doc_dig', 'drugs','information','sex','age','file_slp','flie_clinic',
        'note', 'change', 'supervisor', 'moreinfo','balini','darmangar',];


    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at', 'email', 'email_verified_at'
    ];

    protected $appends = [
        'name'
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();
        static::created(function(User $model) {
            if (in_array($model->type, ['customer', 'owner']))
                $model->newDefaultSubscription(app('rinvex.subscriptions.plan')->where('slug', "{$model->type}-default")->first());
        });
    }

    public function getNameAttribute() {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function company() {
        return $this->hasOne('App\Company', 'creator_id');
    }

    public function conversations() {
        return $this->belongsToMany('App\Conversation')
            ->orderBy('created_at', 'desc');
    }

    public function messages() {
        return $this->hasMany('App\Message', 'from_id');
    }

    public function enquiries() {
        return $this->hasMany('App\Enquiry', 'creator_id');
    }

    public function defaultSubscription() {
        return $this->subscription("{$this->type}-{$this->id}");
    }

    public function newDefaultSubscription($plan) {
        return $this->newSubscription("{$this->type}-{$this->id}", $plan);
    }

    public function routeNotificationForSms() {
        return $this->mobile;
    }

    public function comment() {
        return $this->hasMany('App\comment', 'user_id');
    }

    public function time() {
        return $this->hasMany('App\time', 'user_id');
    }

    public function visit() {
        return $this->hasMany('App\visits', 'user_id');
    }

    public function user_sch() {
        return $this->hasMany('App\schedule', 'user_id');
    }

    public function response() {
        return $this->hasMany('App\response', 'user_id');
    }

    public function doctor() {
        return $this->hasMany('App\schedule', 'doctor_id');
    }
}

