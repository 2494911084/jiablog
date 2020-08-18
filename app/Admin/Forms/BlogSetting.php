<?php

namespace App\Admin\Forms;

use Dcat\Admin\Widgets\Form;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Response;
use Cache;
use App\Models\AdminSetting;
use App\Handlers\RememberCache;


class BlogSetting extends Form
{

    protected $cache_expire_in_seconds = 60 * 60 * 24;

    /**
     * 处理表单请求.
     *
     * @param array $input
     *
     * @return Response
     */
    public function handle(array $input)
    {
        $gonggao = AdminSetting::where('key', 'gonggao')->first();

        if (!$gonggao) {
            AdminSetting::create(['name' => '公告', 'key' => 'gonggao', 'value' => $input['gonggao']]);
        } else {
            $gonggao->value = $input['gonggao'];

            $gonggao->save();
        }

        Cache::put('gonggao', $input['gonggao'], $this->cache_expire_in_seconds);

        return $this->ajaxResponse('设置成功');
    }

    /**
     * 构建表单.
     */
    public function form()
    {
        $this->textarea('gonggao', '公告')->required();
    }

    /**
     * 设置接口保存成功后的回调JS代码.
     *
     * 1.2秒后刷新整个页面.
     *
     * @return string|void
     */
    public function buildSuccessScript()
    {
        return <<<'JS'
    if (data.status) {
        setTimeout(function () {
          location.reload()
        }, 1200);
    }
JS;
    }

    /**
     * 返回表单数据.
     *
     * @return array
     */
    public function default()
    {
        $gonggao = app(RememberCache::class)->adminSettingCache('gonggao');

        return ['gonggao' => $gonggao];
    }
}
