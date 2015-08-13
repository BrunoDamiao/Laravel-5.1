<?php

namespace CodeProject\Entities;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
    	'name',
    	'responsible',
    	'email',
    	'phone',
    	'address',
    	'obs' 
    ];

    ## Client criando relação com a tabela Project ##
    public function Project()
    {
    	## Relação de um pra muitos; Post 1 <-> * Project ##
    	return $this->hasMany('CodeProject\Entities\Project');
    }
}