<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    use HasFactory;

    protected $fillable = [
        'folder_id',
        'content',
        'status',
        'due_date'
    ];

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }
}
