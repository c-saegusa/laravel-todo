<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MemoRequest;
use App\Models\Folder;
use App\Models\Memo;

class MemoController extends Controller
{
    public function create(Folder $folder)
    {
        return view('memos.create')->with(['folder' => $folder]);
    }

    public function store(MemoRequest $request, Folder $folder)
    {
        $user = auth()->user();
        $memo = Memo::create([
            'folder_id' => $folder->id,
            'content' => $request->content,
            'due_date' => $request->due_date
        ]);
        return redirect()->route('folders.show',$folder->id);
    }

    public function edit(Memo $memo)
    {
        return view('memos.edit')->with(['memo' => $memo]);
    }

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

    public function destory(Memo $memo)
    {
        $memo->delete();
        $folder = $memo->folder;
        return redirect()->route('folders.show', $folder->id);
    }

}
