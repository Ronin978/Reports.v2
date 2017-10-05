<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report2 extends Model
{
    protected $table="report_to_late";
	protected $fillable=['date', 'punkt', 'no_card', 'adress', 'brig', 'time', 'support', 'cause', 'call', 'created_at', 'updated_at'];
}
