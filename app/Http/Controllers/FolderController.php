<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FolderRequest;
use App\Models\User;
use App\Models\Folder;

class FolderController extends Controller
{
    public function top()
    {
        return view('folders.top');
    }

    public function create()
    {
        return view('folders.create');
    }

    public function store(FolderRequest $request)
    {
        $user = auth()->user();
        $folder = Folder::create([
            'user_id' => $user->id,
            'title' => $request->title
        ]);
        return redirect()->route('folders.show',$folder->id);
    }

    public function show(Folder $folder)
    {
        $user = auth()->user();
        $folders = $user->folders;
        return view('folders.show')->with(['folder' => $folder, 'folders' => $folders]);
    }

    public function edit(Folder $folder)
    {
        return view('folders.edit')->with(['folder' => $folder]);
    }

    public function update(FolderRequest $request, Folder $folder)
    {
        $folder->update([
            'title' => $request->title
        ]);
        return redirect()->route('folders.show', $folder);
    }

    public function destory(Folder $folder)
    {
        $folder->delete();
        return redirect()->route('folders.top');
    }
}
