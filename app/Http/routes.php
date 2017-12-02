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

$app->get('editar/{id}', function ($id) {
    $candidate = Candidato::where('id', '=', $id)->first();
    
    if($candidate != null) {
        return view('editar', ['candidato' => $candidate]);
    } else {
        echo utf8_decode("Não existe canditado com este ID em nossa base de dados");
    }
});

$app->post('/save', function (Request $request) use ($app) {
    $candidate = Candidato::where('email', '=', $request->input('email'))->first();
    
    if($candidate != null) {
        return response()->json(array("msg" => "Este e-mail já consta em nossa base de dados!"));                
    } else {
        $newCandidate = new Candidato();
        $newCandidate->nome    = $request->input('nome');
        $newCandidate->email   = $request->input('email');
        $newCandidate->sexo    = $request->input('sexo');

        if($newCandidate->save()) {
            return response()->json($newCandidate);        
        } else {
            return response()->json(array("msg" => "Não foi possível cadastrar o candidato!"));        
        }    
    }
});

$app->post('/update', function (Request $request) use ($app) { 
    $candidate = Candidato::where('id', '=', $request->input('id'))->first();
    
    if($candidate != null) {
        $candidate->nome    = $request->input('nome');
        $candidate->email   = $request->input('email');
        $candidate->sexo    = $request->input('sexo');        
        
        if($candidate->save()) {
            return response()->json($candidate);        
        } else {
            return response()->json(array("msg" => "Não foi possível cadastrar o candidato!"));        
        }    
    } else {
        return response()->json(array("msg" => "Não foi possível cadastrar o candidato!"));
    }    
});

$app->post('/delete', function (Request $request) use ($app) {
    $candidate = Candidato::where('id', '=', $request->input('id'))->first();
    
    if($candidate != null) {
        $candidate->delete();
        
        return response()->json("sucess");  
    } else {
        return response()->json("error");
    }    
});

