<?php

namespace App\Models;

use App\Models\Author;
use App\Models\Loan;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['publisher_id', 'author_id', 'title', 'description', 'cover_photo', 'price'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
}
