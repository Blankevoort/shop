<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
    ];

    public function isPurchased()
    {
        return PurchasedBook::where('user_id', Auth::id())
            ->where('book_id', $this->id)
            ->exists();
    }
}
