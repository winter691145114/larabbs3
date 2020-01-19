<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Traits\ActiveUserHelper;
use App\Models\Traits\LastActivedHelper;

use Auth;

class User extends Authenticatable implements MustVerifyEmailContract
{
    use MustVerifyEmailTrait,HasRoles,ActiveUserHelper,LastActivedHelper;
    use Notifiable{
        notify as protected laravelNotify;
    }

    public  function notify($instance)
    {
        if(Auth::id() == $this->id)
        {
            return;
        }
        if(method_exists($instance, 'toDatabase'))
        {
            $this->increment('notification_count');
        }
        $this->laravelNotify($instance);
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','introduction','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function Replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function markAsRead()
    {
        $this->notification_count = 0;
        $this->save();
        $this->unReadNotifications->markAsRead();
    }

    public function setPasswordAttribute($value)
    {
        if(strlen($value) != 60)
        {
            $value  = bcrypt($value);
        }
        $this->attributes['password'] = $value;
    }

    public function setAvatarAttribute($path)
    {
        if(! starts_with($path,'http'))
        {
            $path = config('app.url')."/uploads/Images/avatars/$path";
        }
        $this->attributes['avatar'] = $path;
    }

}
