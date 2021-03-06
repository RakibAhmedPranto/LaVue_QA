@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h1>{{ $target->title }}</h1>
                            <div class="ml-auto">
                                <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to all Questions</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="media">
                        <div class="d-fex flex-column vote-controls">
                            <a title="This question is useful" class="vote-up">
                                <i class="fas fa-caret-up fa-3x"></i>
                            </a>
                            <span class="votes-count">1230</span>
                            <a title="This question is not useful" class="vote-down off">
                                <i class="fas fa-caret-down fa-3x"></i>
                            </a>
                            <a title="Click to mark as favorite question (Click again to undo)" class="favorite mt-2 favorited">
                                <i class="fas fa-star fa-2x"></i>
                                <span class="favorites-count">123</span>
                            </a>
                        </div>
                        <div class="media-body">
                            @parsedown($target->body,true)
                            <div class="float-right">
                                <span class="text-muted">Answered {{ $target->created_at }}</span>
                                <div class="media mt-2">
                                    {{-- <a href="{{ $target->user->url }}" class="pr-2">
                                        <img src="{{ $target->user->avatar }}">
                                    </a> --}}
                                    <div class="media-body mt-1">
                                        <a href="#">{{ $target->user->name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include ('answers.index', [
        'answers' => $target->answers,
        'answersCount' => $target->answers_count,
    ])


@include ('answers.create')
</div>
@endsection
