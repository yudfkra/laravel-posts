@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@lang((isset($post) ? 'Edit ' : 'Add ') . 'Post')</div>

                    <form action="{{ isset($post) ? route('post.update', $post) : route('post.store') }}" method="post" autocomplete="off">
                        @csrf
                        @isset($post)
                            @method('PUT')
                        @endisset
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="input-title" class="col-md-2 col-form-label text-md-right">@lang('Title')</label>
                                <div class="col-md-8">
                                    <input id="input-title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $post->title ?? null) }}" placeholder="@lang('Title')">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input-body" class="col-md-2 col-form-label text-md-right">@lang('Body')</label>
                                <div class="col-md-8">
                                    <textarea id="input-body" class="form-control @error('body') is-invalid @enderror" name="body" placeholder="@lang('Body')" cols="30" rows="4">{{ old('body', $post->body ?? null) }}</textarea>
                                    @error('body')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">@lang('Back')</a>
                            <button class="btn btn-primary float-right">@lang('Save')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection