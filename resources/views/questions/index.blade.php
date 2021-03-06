@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>All Questions</h2>
                        <div class="ml-auto">
                            <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">Ask Question</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('layouts.messages')
                    @if(!$questions->isEmpty())
                        @foreach ($questions as $question)
                                <div class="media">
                                    <div class="d-flex flex-column counters">
                                        <div class="vote">
                                            <strong>{{ $question->votes }}</strong> {{ \Illuminate\Support\Str::plural('vote', $question->votes) }}
                                        </div>
                                        <div class="status {{ $question->status }}">
                                            <strong>{{ $question->answer_count }}</strong> {{ \Illuminate\Support\Str::plural('answer', $question->answer_count) }}
                                        </div>
                                        <div class="view">
                                            {{ $question->views . " " . \Illuminate\Support\Str::plural('view', $question->views) }}
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h3 class="mt-0"><a href="{!! route('questions.show',$question->slug) !!}">{{ $question->title }}</a></h3>
                                        <p class="lead">
                                            Asked by
                                            <a href="">{{ $question->user->name }}</a>
                                            <small class="text-muted">{{ $question->created_at->diffForHumans() }}</small>
                                        </p>
                                        {{ \Illuminate\Support\Str::limit($question->body, 250) }}
                                    </div>
                                </div>
                                <hr>
                        @endforeach
                    @else
                    <div class="media">
                        <div class="media-body">
                            <h3 class="mt-0">No Questions Found</h3>

                        </div>
                    </div>
                    @endif


                    <div class="mx-auto">
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
