<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Pagamento extends Model
{
    protected $fillable =['id','categoria_id','data','descricao','valor'];
    Use SoftDeletes;
    
    public function categoria(){
        
        return $this->belongsTo('App\Categoria','categoria_id');
    }
 
    
}
