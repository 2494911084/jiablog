<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Label;
use App\Models\Category;
use App\Handlers\RememberCache;

class LabelsController extends Controller
{
    public function show(Label $label)
    {
        // 分类
        $categories = Category::all();

        // 文章
        $topics = $label->load(['topics'])->topics;

        // 标签
        $labels = $this->getLabels();

        // 友链
        $links = app(RememberCache::class)->BlogLinksCache();

        // 公告
        $gonggao = app(RememberCache::class)->adminSettingCache('gonggao');

        return view('topics.index', compact('topics', 'labels', 'links', 'gonggao', 'categories'));
    }

    // 获取标签
    public function getLabels()
    {
        return Label::with('topics')->get();
    }
}
