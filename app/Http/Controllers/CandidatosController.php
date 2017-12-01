<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Candidatos;

class CandidatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidatos = Candidatos::all();
        return view('candidatos.index',['todoscandidatos' => $candidatos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidatos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'descricao' => 'required',
        ]);
        
        $candidatos = new Candidatos;
        $candidatos->nome = $request->nome;
        $candidatos->descricao = $request->descricao;
        $candidatos->save();
        return redirect('candidatos')->with('message', 'Produto atualizado com sucesso!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidatos = Candidatos::find($id);
        if(!$candidatos){
            abort(404);
        }
        return view('candidatos.details')->with('detailpage', $candidatos);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidatos = Candidatos::find($id);
        if(!$candidatos){
            abort(404);
        }
        return view('candidatos.edit')->with('detailpage', $candidatos);
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
        $this->validate($request, [
            'nome' => 'required',
            'descricao' => 'required',
        ]);
        
        $candidatos = Candidatos::find($id);
        $candidatos->nome = $request->nome;
        $candidatos->descricao = $request->descricao;
        $candidatos->save();
        return redirect('candidatos')->with('message', 'Produto editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidatos = Candidatos::find($id);
        $candidatos->delete();
        return redirect('candidatos')->with('message', 'Produto apagado com sucesso!');
    }
}