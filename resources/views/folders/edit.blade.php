@extends('layouts.app')
@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col col-md-offset-3 col-md-6">
                    <nav class="panel panel-default">
                        <div class="panel-heading d-flex justify-content-between">フォルダを編集する 
                                <form action="{{ route('folders.destory', $folder->id) }}" method="POST">
                                    @csrf
                                    <button>削除</button>
                                </form>
                        </div>
            
                        <div class="panel-body">
                            @if($errors->has('title'))<div class="alert alert-danger">{{ $errors->first('title') }}</div>@endif
                            <form action="{{ route('folders.update', $folder->id) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="title">フォルダ名</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ $folder->title }}">
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
