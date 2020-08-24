<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Individual extends Model
{
    /**
     * Accessors to be appended to the model array
     * 
     * @return array
     */
    protected $appends = ['fullName'];

    /**
     * Get Individual sacco
     * 
     * @return \App\Sacco
     */
    public function sacco()
    {
        return $this->belongsTo(Sacco::class);
    }

    /**
     * Add FullName attribute
     * 
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
