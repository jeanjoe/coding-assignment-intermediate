<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['individual', 'sacco'];

    /**
     * Get the individual who made the transaction
     * 
     * @return \App\Individual
     */
    public function individual()
    {
        return $this->belongsTo(Individual::class);
    }

    /**
     * Get Transaction individual attributes 
     * 
     * @return object
     */
    public function getIndividualAttribute()
    {
        return $this->individual()->first();
    }

    /**
     * Get Transaction Sacco for the Individual
     * 
     * @return object
     */
    public function getSaccoAttribute()
    {
        return $this->individual()->first()->sacco()->first();
    }

    /**
     * Format Amount column
     * 
     * @return string
     */
    public function getAmountAttribute($value)
    {
        return number_format($value) . " UGX";
    }
}
