<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    const CACHE_RECORD_KEY = 'people_total_count';

    protected $fillable = [
        'email_address',
        'name',
        'birthday',
        'phone',
        'ip',
        'country',
    ];

    /**
     * Scope a query to filter people by birth year.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterByBirthYear($query, $request)
    {
        if ($request->filled('birth_year')) {
            $query->whereYear('birthday', $request->birth_year);
        }

        return $query;
    }

    /**
     * Scope a query to filter people by birth month.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterByBirthMonth($query, $request)
    {
        if ($request->filled('birth_month')) {
            $query->whereMonth('birthday', $request->birth_month);
        }

        return $query;
    }

    /**
     * Scope a query to get the total record count.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return int
     */
    public function scopeTotalRecordCount($query): int
    {
        return $query->count();
    }
}
