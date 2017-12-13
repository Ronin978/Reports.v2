<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report5 extends Model
{
    protected $table="reports";
	protected $fillable=['pidtype', 'date', 'timer', 'title', 'adress', 'viddil', 'pib', 'no_card', 'brig', 'other', 'created_at', 'updated_at', 'users'];
}
