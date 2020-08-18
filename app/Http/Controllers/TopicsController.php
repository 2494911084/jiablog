<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Label;
use App\Models\Category;
use App\Models\Link;
use App\Models\AdminSetting;
use App\Handlers\RememberCache;

class TopicsController extends Controller
{
    public function index(Request $request)
    {
        if ($search = $request->input('search')) {
            $query =Topic::where('title', 'like', '%'.$search.'%')->with('category');
        } else {
            $query = Topic::with('category');
        }
        $topics =  $query->get();

        // 标签
        $labels = $this->getLabels();

        // 友链
        $links = app(RememberCache::class)->BlogLinksCache();

        // 公告
        $gonggao = app(RememberCache::class)->adminSettingCache('gonggao');

        // 分类
        $categories = Category::orderBy('topic_count', 'desc')->orderBy('id')->limit(8)->get();

        return view('topics.index', compact('topics', 'labels', 'links', 'gonggao', 'categories'));
    }

    // 获取标签
    public function getLabels()
    {
        return Label::with('topics')->get();
    }

    public function show(Topic $topic)
    {

        // 标签
        $labels = $this->getLabels();

        // 友链
        $links = app(RememberCache::class)->BlogLinksCache();

        // 公告
        $gonggao = app(RememberCache::class)->adminSettingCache('gonggao');

        // 分类
        $categories = Category::orderBy('topic_count', 'desc')->orderBy('id')->limit(8)->get();

        return view('topics.show', compact('topic', 'labels', 'links', 'gonggao', 'categories'));
    }
}
