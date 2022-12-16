<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MemoRequest;
use App\Models\Folder;
use App\Models\Memo;

class MemoController extends Controller
{
    /**
     * メモの作成画面を表示
     *
     * @param Folder $folder
     * @return void
     */
    public function create(Folder $folder)
    {
        return view('memos.create')->with(['folder' => $folder]);
    }

    /**
     * メモの保存処理
     *
     * @param MemoRequest $request
     * @param Folder $folder
     * @return void
     */
    public function store(MemoRequest $request, Folder $folder)
    {
        $user = auth()->user();
        $memo = Memo::create([
            'folder_id' => $folder->id,
            'content' => $request->content,
            'due_date' => $request->due_date
        ]);
        return redirect()->route('folders.show', $folder->id);
    }

    /**
     * メモの編集画面を表示
     *
     * @param Memo $memo
     * @return void
     */
    public function edit(Memo $memo)
    {
        return view('memos.edit')->with(['memo' => $memo]);
    }

    /**
     * メモの更新処理
     *
     * @param MemoRequest $request
     * @param Memo $memo
     * @return void
     */
    public function update(MemoRequest $request, Memo $memo)
    {
        $memo->update([
            'content' => $request->content,
            'status' => $request->status,
            'due_date' => $request->due_date
        ]);
        $folder = $memo->folder;
        return redirect()->route('folders.show', $folder->id);
    }

    /**
     * メモの削除処理
     *
     * @param Memo $memo
     * @return void
     */
    public function destory(Memo $memo)
    {
        $memo->delete();
        $folder = $memo->folder;
        return redirect()->route('folders.show', $folder->id);
    }
}
