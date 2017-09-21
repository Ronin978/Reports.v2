<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report1 extends Model
{
    protected $table="total_reports";
	protected $fillable=['date', 'type', 'day', 'night', 'chergovy', 'updated_at'];
}
