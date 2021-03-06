<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3>Your Answer</h3>
                </div>
                <hr>
                <form action="{{ route('answers.store') }}" method="post">
                    @csrf
                    <input type="hidden" id="questionId" name="question_id" value="{{$target->id}}" >
                    <input type="hidden" id="slug" name="slug" value="{{$target->slug}}" >
                    <div class="form-group">
                        <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="7" name="body"></textarea>
                        @if ($errors->has('body'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('body') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-outline-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
