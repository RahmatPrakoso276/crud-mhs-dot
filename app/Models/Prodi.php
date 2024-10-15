<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $fillable = ['nama']; // Kolom yang dapat diisi


    protected static function boot()
    {
        parent::boot();

        static::updated(function ($prodi) {
            Mahasiswa::where('prodi_id', $prodi->id)
                ->update(['prodi_id' => $prodi->id]);
        });
    }
    // Definisikan hubungan dengan Mahasiswa
    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'prodi_id');
    }
}
