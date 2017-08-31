<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report5 extends Model
{
    protected $table="reports";
	protected $fillable=['pidtype', 'date', 'title', 'adress', 'pib', 'no_card', 'brig', 'other'];
}
