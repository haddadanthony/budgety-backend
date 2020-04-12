<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    protected $fillable = ['title', 'amount', 'due_date', 'start_date', 'user_id', 'currency_id'];
}
