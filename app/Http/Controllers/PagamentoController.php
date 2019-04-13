<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pagamento;
use App\Categoria;
use Session;
use Redirect;

class PagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagamento = new Pagamento();
        $pagamentos = Pagamento::with('categoria')->get();
    
        $categorias = Categoria::all();
        
        return view('pagamento.index',compact('pagamento','pagamentos','categorias'));
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
        $pagamento = new Pagamento();
        
        $pagamento->fill($request->all());
        $pagamento->save();
        
        Session::flash('message','Cadstrado com sucesso');
        return Redirect::to('pagamento');
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
        $pagamento = Pagamento::with('categoria')->where('id',$id)->first();
        
        $pagamentos = Pagamento::with('categoria')->get();
    
        $categorias = Categoria::where('id','<>',$pagamento->categoria_id)->get();
        
        return view('pagamento.index',compact('pagamento','pagamentos','categorias'));
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
        $pagamento = Pagamento::find($id);
        
        $pagamento->fill($request->all());
        $pagamento->save();
        
        $pagamento = new Pagamento();
        Session::flash('message','Atualizado com sucesso');
        return Redirect::to('pagamento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Pagamento::find($id)->delete();
        Session::flash('message','Excluído com sucesso');
        return Redirect::to('pagamento');
    }
}
