<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report3 extends Model
{
    protected $table="report_transfer";
	protected $fillable=['date', 'timer', 'no_card', 'pib', 'at', 'from', 'direct', 'who_direct', 'diagnoz', 'brig', 'other', 'created_at', 'updated_at', 'users'];
}
