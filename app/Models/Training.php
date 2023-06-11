<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'duration',
        'profit_carbon_score',
    ];

    /**
     * Get the users for the training.
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('is_completed', 'is_validated');
    }
}
