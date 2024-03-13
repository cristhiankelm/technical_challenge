<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'date',
        'concept',
        'amount'
    ];
    
    public function getAmountFormattedAttribute()
    {
        $formattedAmount = number_format($this->amount, 0, ',', '.');
        
        return 'G$ ' . $formattedAmount;
    }
}
