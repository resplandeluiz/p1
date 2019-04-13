<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Categoria extends Model
{ 
    protected $fillable = ['id','nome'];
    Use SoftDeletes;
    
    
    public function pagamento(){
        
       return  $this->hasOne('App\Pagamento');
    }
    
    
}
