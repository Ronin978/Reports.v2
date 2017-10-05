<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report4 extends Model
{
    protected $table="report_gks";
	protected $fillable=['date', 'timer', 'no_card', 'adress', 'pib', 'age', 'diagnoz', 'brig', 'tromb', 'stent', 'gospital', 'support', 'created_at', 'updated_at'];
}
