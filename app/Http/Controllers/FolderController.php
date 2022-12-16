<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FolderRequest;
use App\Models\User;
use App\Models\Folder;

class FolderController extends Controller
{
    /**
     * フォルダー作成ページへの導線ページを表示
     *
     * @return void
     */
    public function top()
    {
        return view('folders.top');
    }

    /**
     * フォルダーの作成画面を表示
     *
     * @return void
     */
    public function create()
    {
        return view('folders.create');
    }

    /**
     * フォルダーの保存処理
     *
     * @param FolderRequest $request
     * @return void
     */
    public function store(FolderRequest $request)
    {
        $user = auth()->user();
        $folder = Folder::create([
            'user_id' => $user->id,
            'title' => $request->title
        ]);
        return redirect()->route('folders.show', $folder->id);
    }

    /**
     * フォルダーの中身のメモを表示
     *
     * @param Folder $folder
     * @return void
     */
    public function show(Folder $folder)
    {
        $user = auth()->user();
        $folders = $user->folders;
        return view('folders.show')->with(['folder' => $folder, 'folders' => $folders]);
    }

    /**
     * 
     *
     * @param Folder $folder
     * @return void
     */
    public function edit(Folder $folder)
    {
        return view('folders.edit')->with(['folder' => $folder]);
    }

    /**
     * フォルダーの編集画面を表示
     *
     * @param FolderRequest $request
     * @param Folder $folder
     * @return void
     */
    public function update(FolderRequest $request, Folder $folder)
    {
        $folder->update([
            'title' => $request->title
        ]);
        return redirect()->route('folders.show', $folder);
    }

    /**
     * フォルダーの削除処理
     *
     * @param Folder $folder
     * @return void
     */
    public function destory(Folder $folder)
    {
        $folder->delete();
        return redirect()->route('folders.top');
    }
}
