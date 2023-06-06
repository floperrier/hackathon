<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageRank extends Model
{
    use HasFactory;

    protected $table = 'languages_ranks';

    protected $fillable = [
        'language_name',
        'user_id',
        'rank_name',
        'rank',
        'years_of_experience',
        'score',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
