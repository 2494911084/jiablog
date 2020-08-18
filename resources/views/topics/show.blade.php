@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="card shadow p-3 mb-5 bg-white rounded">
            <div class="card-body">
                <h1 class="mb-4">{{ $topic->title }}</h1>
                <div class="text-secondary">
                    是否转载：{{ $topic->isReprint?'是':'否' }}
                </div>
                <div class="text-secondary mt-2">
                    发布于 {{ $topic->created_at->diffForHumans() }} | 最后更新 {{ $topic->updated_at->diffForHumans() }}
                </div>
                <hr>
                <div>
                    {!!  $topic->content !!}
                </div>
            </div>
        </div>
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
