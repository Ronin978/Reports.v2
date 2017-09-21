<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report5 extends Model
{
    protected $table="reports";
	protected $fillable=['pidtype', 'date', 'timer', 'title', 'adress', 'pib', 'no_card', 'brig', 'other', 'updated_at'];
}
