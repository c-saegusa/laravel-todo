@extends('layouts.app')
@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col col-md-4">
                    <nav class="panel panel-default">
                        <div class="panel-heading">フォルダ</div>
                        <div class="panel-body">
                            <a href="{{ route('folders.create') }}" class="btn btn-default btn-block">
                                フォルダを追加する
                            </a>
                        </div>
                        <div class="list-group">
                            @foreach ($folders as $f)
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('folders.show', $f->id) }}" class="list-group-item w-100 @if( $f->id === $folder->id )active @endif">
                                        {{ $f->title }}
                                    </a>
                                    <a class="list-group-item w-100 rounded-0 @if( $f->id === $folder->id )bg-success @endif" href="{{ route('folders.edit', $f->id) }}">編集</a>
                                </div>
                            @endforeach
                        </div>
                    </nav>
                </div>
                <div class="column col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">メモ</div>
                        <div class="panel-body">
                            <div class="text-right">
                                <a href="{{ route('memos.create', $folder->id) }}"
                                    class="btn btn-default btn-block">
                                    メモを追加する
                                </a>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>メモ</th>
                                    <th>状態</th>
                                    <th>期限</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($folder->memos as $memo)
                                <tr>
                                    <td class="w-50"><a href="{{ route('memos.edit', $memo->id) }}">{{ $memo->content }}</a></td>
                                    <td class="w-20">
                                    @if($memo->status === 1)
                                    未着手
                                    @elseif($memo->status === 2)
                                    着手中
                                    @elseif($memo->status === 3)
                                    完了
                                    @endif
                                    </td>
                                    <td class="w-30">{{ $memo->due_date }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
