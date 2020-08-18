<?php
namespace App\Handlers;
use Cache;

use App\Models\AdminSetting;
use App\Models\Link;

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

    // 获取友链缓存，失败则查询数据库并存入缓存
    public function BlogLinksCache()
    {

        return Cache::remember('links', $this->cache_expire_in_seconds, function(){

            if(!$links = Link::all()){
                $links = null;
            }

            return $links;
        });

    }
}
