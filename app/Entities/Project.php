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

    ## Project criando relação com a tabela Client ##
    public function Client()
    {
    	## belongsTo: indica que o Project pertence a um Client ##
        return $this->belongsTo('CodeProject\Entities\Client');
    }

    ## Project criando relação com a tabela User ##
    public function User()
    {
        ## belongsTo: indica que o Project pertence a um User ##
        return $this->belongsTo('CodeProject\Entities\User');
    }
}
