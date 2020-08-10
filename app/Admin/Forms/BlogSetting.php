<?php

namespace App\Admin\Forms;

use Dcat\Admin\Widgets\Form;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Response;

class BlogSetting extends Form
{
    /**
     * 处理表单请求.
     *
     * @param array $input
     *
     * @return Response
     */
    public function handle(array $input)
    {
        foreach (Arr::dot($input) as $k => $v) {
            $this->update($k, $v);
        }

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
        return blog_config();
    }

    /**
     * 更新配置.
     *
     * @param string $key
     * @param string $value
     */
    protected function update($key, $value)
    {
        blog_config([$key => $value]);
    }
}
