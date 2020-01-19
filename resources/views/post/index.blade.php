@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex mb-3">
        <div class="mr-auto">
            <h4 class="pt-2">Posts</h4>
        </div>
        @auth
            <div class="mr-2">
                <a href="{{ route('post.create') }}" class="btn btn-primary">@lang('Add Post')</a>
            </div>
        @endauth
        <form action="{{ route('post.index') }}" method="get" accept-charset="UTF-8">
            <div class="input-group">
                <input name="keyword" value="{{ $params['keyword'] ?? null }}" type="text" class="form-control"
                    id="input-keyword" placeholder="@lang('Search Post...')">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary">@lang('Search')</button>
                </div>
            </div>
        </form>
    </div>
    @forelse ($posts as $post)
        @if ($loop->first || $loop->iteration % 2 == 1)
            <div class="row mb-4">
        @endif
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('post.show', $post) }}">{{ $post->title }}</a> <span class="text-muted"> by {{ $post->user->name }}</span>
                    </div>
                    <div class="card-body">
                        {{ $post->intro }}
                    </div>
                    <div class="card-footer">
                        @includeWhen($post->isOwnUser(auth()->user()), 'post._action', compact('post'))
                        <a href="{{ route('post.show', $post) }}" class="btn btn-primary float-right">@lang('Detail')</a>
                    </div>
                </div>
            </div>
        @if ($loop->last || $loop->iteration % 2 == 0)
            </div>
        @endif
    @empty
        <div class="mt-4 d-flex justify-content-center">
            <h4>@lang('No posts found.')</h4>
        </div>    
    @endforelse
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection
