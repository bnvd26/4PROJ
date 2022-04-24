<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampusPromotion extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
}
