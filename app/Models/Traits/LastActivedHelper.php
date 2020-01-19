<?php

namespace App\Models\Traits;
use Redis;
use Carbon\Carbon;

trait LastActivedHelper {

    protected $hash_prefix = 'larabbs_actived_at';
    protected $field_prefix = 'user_';

    public function recordLastActivedAt()
    {
        $date_time = Carbon::now()->toDateString();
        $hash = $this->hash_prefix . $date_time;
        $field = $this->field_prefix . $this->id;
        $now = Carbon::now()->toDateTimeString();
        Redis::hSet($hash, $field, $now);
    }

    public function syncLastActivedAt()
    {
        $yesterday_time = Carbon::yesterday()->toDateString();
        $hash = $this->hash_prefix . $yesterday_time;
        $data = Redis::hGetAll($hash);
        foreach($data as $user_id => $actived_at)
        {
            $user_id = str_replace($this->field_prefix,'',$user_id);
            if($user=$this->find($user_id))
            {
                $user->last_actived_at = $actived_at;
                $user->save();
            }
        }
        Reids::del($hash);
    }

    public function getLastActivedAtAttribute($value)
    {
        $date_time = Carbon::now()->toDateString();
        $hash = $this->hash_prefix . $date_time;
        $field = $this->field_prefix . $this->id;
        $data = Redis::hGet($hash,$field) ?: $value;
        if($data)
        {
            return new Carbon($data);
        }else{
            return $this->created_at;
        }


    }
}
