@extends('layouts.app')

@section('title', if_route('categories.show')?'分类 | '.$category['name']:'首页')

@section('content')
<div class="row">
    <div class="col-md-9">
        <ul class="list-unstyled">
            @foreach ($topics as $topic)
          <li class="media">
            <div class="media-body">
              <h2 class="mt-0 mb-1"><a href="{{ route('topics.show', $topic->id) }}" style="color:#343a40;">{{ $topic->title }}</a></h2>
              <p class="text-secondary">
                <a href="{{ route('categories.show', $topic->category->id) }}"><span class="text-secondary">{{ $topic->category->name }}</span></a>
                                                                                  ·
                更新于:{{ $topic->updated_at->diffForHumans() }}
              </p>
            </div>
          </li>
          <hr>
          <br>
            @endforeach
        </ul>
    </div>

    <div class="col-md-3">
        @include('pages.gonggao')
        <br>
        @include('pages.label')
        <br>
        @include('pages.link')
    </div>
</div>
@stop
