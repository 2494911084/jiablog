<?php
namespace App\Handlers;
use Cache;

use App\Models\AdminSetting;

class RememberCache
{
    protected $cache_expire_in_seconds = 60 * 60 * 24;

    // 获取公告缓存，失败则查询数据库并存入缓存
    public function adminSettingCache($key = null)
    {

        return Cache::remember($key, $this->cache_expire_in_seconds, function() use ($key){

            if(!$gonggao = AdminSetting::where('key', $key)->pluck('value')->first()){
                $gonggao = null;
            }

            return $gonggao;
        });

    }
}
