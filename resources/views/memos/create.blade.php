@extends('layouts.app')
@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col col-md-offset-3 col-md-6">
                    <nav class="panel panel-default">
                        <div class="panel-heading">メモを追加する</div>
                        <div class="panel-body">
                            @if ($errors->has('content'))
                                <div class="alert alert-danger">{{ $errors->first('content') }}</div>
                            @endif
                            @if ($errors->has('due_date'))
                                <div class="alert alert-danger">{{ $errors->first('due_date') }}</div>
                            @endif
                            <form action="{{ route('memos.store', $folder) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="content">メモ</label>
                                    <input type="text" class="form-control" name="content" id="content"
                                        value="{{ old('content') }}">
                                </div>
                                <div class="form-group">
                                    <label for="due_date">期限</label>
                                    <input type="date" class="form-control flatpickr-input" name="due_date"
                                        id="due_date" value="{{ old('due_date') }}">
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">送信</button>
                                </div>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </main>
@endsection
