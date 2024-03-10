<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    const CACHE_RECORD_KEY = 'people_total_count';

    protected $fillable = [
        'email_addess',
        'name',
        'birthday',
        'phone',
        'ip',
        'country',
    ];

    public function scopeFilterByBirthYear($query, $request)
    {
        if ($request->filled('birth_year')) {
            $query->whereYear('birthday', $request->birth_year);
        }

        return $query;
    }

    public function scopeFilterByBirthMonth($query, $request)
    {
        if ($request->filled('birth_month')) {
            $query->whereMonth('birthday', $request->birth_month);
        }

        return $query;
    }

    public function scopeTotalRecordCount($query)
    {
        return $query->count();
    }
}
