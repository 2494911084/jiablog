<?php

namespace App\Admin\Actions;

use App\Admin\Forms\BlogSetting as BlogSettingForm;
use Dcat\Admin\Actions\Action;
use Dcat\Admin\Admin;

class BlogSetting extends Action
{
    /**
     * @return string
     */
	protected $title = 'Blog设置';

    public function render()
    {
        $id = 'Blog-setting-Gonggao';

        // 模态窗
        $this->modal($id);

        return <<<HTML
<ul class="nav navbar-nav">
    <li>
    <span class="grid-expand" data-toggle="modal" data-target="#{$id}" style="cursor: pointer;">
    Blog设置
    </span>&nbsp;
    </li>
</ul>
HTML;
    }

    protected function modal($id)
    {
        // 工具表单
        $form = new BlogSettingForm();

        // 通过 Admin::html 方法设置模态窗HTML
        Admin::html(
            <<<HTML
<div class="modal fade" id="{$id}">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">{$this->title()}</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        {$form->render()}
      </div>
    </div>
  </div>
</div>
HTML
        );
    }
}
