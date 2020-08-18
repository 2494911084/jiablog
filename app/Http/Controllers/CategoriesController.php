<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Topic;
use App\Models\Label;
use App\Models\Link;
use App\Handlers\RememberCache;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        $categories = Category::orderBy('topic_count', 'desc')->orderBy('id')->limit(8)->get();

        $topics = Topic::where('category_id', $category->id)->get();

        // 标签
        $labels = $this->getLabels();

        // 友链
        $links = Link::all();

        // 公告
        $gonggao = app(RememberCache::class)->adminSettingCache('gonggao');

        return view('topics.index', compact('topics', 'labels', 'links', 'gonggao', 'categories', 'category'));
    }

    // 获取标签
    public function getLabels()
    {
        return Label::with('topics')->get();
    }
}
