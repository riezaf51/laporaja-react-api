<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontakPenting extends Model
{
    use HasFactory;

    protected $table = 'kontakpenting';
    protected $fillable = [
        'admin_id',
        'namainstansi',
        'nomortelepon',
        'alamat',
        'jenisinstansi'
    ];

    protected $hidden = [];

    public function admin()
    {
        return $this->belongsTo(User::class);
    }
}
