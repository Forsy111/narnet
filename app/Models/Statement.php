<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Statement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'gos_num',
        'desc',
        'status',
        'status_name',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
