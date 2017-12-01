<?php
use App\Models\Candidato;
use Illuminate\Http\Request;

$app->get('/', function () use ($app) {
    $candidatos = Candidato::all();
    return view('home', ['candidatos' => $candidatos]);
});

$app->get('/cadastrar', function () use ($app) {
    return view('cadastrar');
});

$app->post('/save', function (Request $request) use ($app) {    
    $newCandidate = new Candidato();
    $newCandidate->nome    = $request->input('nome');
    $newCandidate->email   = $request->input('email');
    $newCandidate->sexo    = $request->input('sexo');
    
    if($newCandidate->save()) {
        return response()->json($newCandidate);        
    } else {
        return response()->json("error");        
    }
    
});

