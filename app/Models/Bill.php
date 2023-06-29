<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    /**
     * Get the customer that owns the Bill
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    /**
     * Get all of the bill_descriptions for the Bill
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bill_descriptions()
    {
        return $this->hasMany(BillDescription::class);
    }
}
