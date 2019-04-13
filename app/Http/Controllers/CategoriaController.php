<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Session;
use Redirect;
use App\Pagamento;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $categoria = new Categoria();
        $categorias = Categoria::all();
        return view('categoria.index',compact('categoria','categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $categoria = new Categoria();
        
        $categoria->fill($request->all());
        $categoria->save();
        
        Session::flash('message','Cadstrado com sucesso');
        return Redirect::to('categoria');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $categoria = Categoria::find($id);
          $categorias = Categoria::all();
          
          return view('categoria.index',compact('categoria','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        
        $categoria->fill($request->all());
        $categoria->save();
        
        Session::flash('message','Atualizado com sucesso');
        return Redirect::to('categoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pagamento = Pagamento::where('categoria_id',$id)->get();
        $existePagamento = count($pagamento);
        
        if( $existePagamento <= 0){
            
            $categoria = Categoria::find($id)->delete();
            Session::flash('message','Excluído com sucesso');
            return Redirect::to('categoria');
        
        }else{
            
            Session::flash('error','Primeiro exclua os pagamentos ligados a essa categoria!');
            return Redirect::to('categoria');
            
        }
        
    }
}
