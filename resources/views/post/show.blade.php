@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title mb-4 font-weight-bold">{{ $post->title }}</h3>
                        <p class="card-text">{!! nl2br($post->body) !!}</p>
                    </div>
                    <div class="card-footer clearfix">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">@lang('Back')</a>
                        <div class="float-right">
                            @includeWhen($post->isOwnUser(auth()->user()), 'post._action', compact('post'))
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
