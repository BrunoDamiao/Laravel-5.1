<?php

namespace CodeProject\Entities;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
    	'name',
    	'owner_id',
    	'client_id',
    	'description',
    	'progress',
    	'status',
    	'due_date'
    ];

    ## Post criando relação com a tabela client ##
    public function Client()
    {
    	## belongsTo: indica que o Project pertence a um Client ##
        return $this->belongsTo('CodeProject\Entities\Client');
    }
}
