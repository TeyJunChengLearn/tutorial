<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;
    protected $table = 'accounts';
    protected $fillable = [
        'description',
        'date',
        'accountcategory_id',
        'user_id',
        'debitsubtotal',
        'creditsubtotal',
    ];

    public function accountCategory()
    {
        return $this->belongsTo(Accountcategories::class, 'accountcategory_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
