@extends('layouts.app')
@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col col-md-offset-3 col-md-6">
                    <nav class="panel panel-default">
                        <div class="panel-heading d-flex justify-content-between">メモを編集する
                            <form action="{{ route('memos.destory', $memo->id) }}" method="POST">
                                @csrf
                                <button>削除</button>
                            </form>
                        </div>
                        <div class="panel-body">
                            @if ($errors->has('content'))
                                <div class="alert alert-danger">{{ $errors->first('content') }}</div>
                            @endif
                            @if ($errors->has('status'))
                                <div class="alert alert-danger">{{ $errors->first('status') }}</div>
                            @endif
                            @if ($errors->has('due_date'))
                                <div class="alert alert-danger">{{ $errors->first('due_date') }}</div>
                            @endif
                            <form action="{{ route('memos.update', $memo->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="content">メモ</label>
                                    <input type="text" class="form-control" name="content" id="content"
                                        value="{{ $memo->content }}">
                                </div>
                                <div class="form-group">
                                    <label for="status">状態</label>
                                    <select name="status" id="status" class="form-control" value="{{ $memo->status }}">
                                        <option value="1" @if ($memo->status === 1) selected="" @endif>
                                            未着手
                                        </option>
                                        <option value="2" @if ($memo->status === 2) selected="" @endif>
                                            着手中
                                        </option>
                                        <option value="3" @if ($memo->status === 3) selected="" @endif>
                                            完了
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="due_date">期限</label>
                                    <input type="date" class="form-control flatpickr-input" name="due_date"
                                        id="due_date" value="{{ $memo->due_date }}">
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
