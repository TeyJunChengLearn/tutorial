<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accountcategories extends Model
{
    use HasFactory;
    protected $table = 'accountcategories';
    protected $fillable = [
        'name',
        'user_id'

    ];
    public function accounts()
    {
        return $this->hasMany(Account::class, 'accountcategory_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
