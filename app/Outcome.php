<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'outcome';

    protected $fillable = array('type', 'month', 'amount', 'note', 'document');
}
