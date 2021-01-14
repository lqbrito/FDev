<?php

namespace App\Http\Controllers\cadastros;

use App\Http\Controllers\globalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\cidades;
use Redirect;
use Session;
use Exception;

class cidadesController extends globalController
{
    public function pesquisar(Request $request)
    {
        parent::pesquisar($request);
        return Redirect::to("/cidades");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();
		try
		{	
			$cidades = cidades::findorfail($request->id);
			$nome = $cidades->descricao;

			DB::beginTransaction();
			$cidades->delete();
	        DB::commit();

	        \Session::Flash('Status', "Exclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/cidades");
		} 
		catch (\Exception $e) 
		{
			report($e);
			DB::rollBack();			
			Session::Flash('Erro', $e->getMessage());
			return back()->withInput();
		}
	}

	public function excluir(Request $request)
	{
		$this->validausuario();
		try
		{	
			$cidades = cidades::findorfail($request->id);
			return view('cadastros.cidades.excluir', ['cidades' => $cidades]);
		} 
		catch (\Exception $e) 
		{
			report($e);
			Session::Flash('Erro', $e->getMessage());
			return back()->withInput();
		}
	}

	public function alterando(Request $request)
	{
		$this->validausuario();
		try
		{	
			$cidades = cidades::findorfail($request->id);
			
			$cidades->nome = $request->nome;
			$cidades->uf = $request->uf;
			$cidades->codigoibge = $request->codigoibge;
			$cidades->ddd = $request->ddd;

			DB::beginTransaction();
			$cidades->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Alteração de '$nome' realizada com sucesso");
	        return Redirect::to("/cidades");
		} 
		catch (\Exception $e) 
		{
			report($e);
			DB::rollBack();			
			Session::Flash('Erro', $e->getMessage());
			return back()->withInput();
		}
	}

	public function alterar(Request $request)
	{
		$this->validausuario();
		try
		{	
			$cidades = cidades::findorfail($request->id);
			return view('cadastros.cidades.alterar', ['cidades' => $cidades]);
		} 
		catch (\Exception $e) 
		{
			report($e);
			Session::Flash('Erro', $e->getMessage());
			return back()->withInput();
		}
	}

	public function consultar(Request $request)
	{
		$this->validausuario();
		try
		{	
			$cidades = cidades::findorfail($request->id);
			return view('cadastros.cidades.consultar', ['cidades' => $cidades]);
		} 
		catch (\Exception $e) 
		{
			report($e);
			Session::Flash('Erro', $e->getMessage());
			return back()->withInput();
		}
	}

	public function incluindo(Request $request)
	{
		$this->validausuario();
		try
		{	
			$cidades = new cidades();
			
			$cidades->nome = $request->nome;
			$cidades->uf = $request->uf;
			$cidades->codigoibge = $request->codigoibge;
			$cidades->ddd = $request->ddd;

			DB::beginTransaction();
			$cidades->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Inclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/cidades");
		} 
		catch (\Exception $e) 
		{
			report($e);
			DB::rollBack();			
			Session::Flash('Erro', $e->getMessage());
			return back()->withInput();
		}
	}

	public function incluir()
	{
		$this->validausuario();
		return view('cadastros.cidades.incluir');
	}

	public function index()
	{
		$this->validausuario();
		
		$textobusca = $this->buscarpesquisa();
		$listaTudo = strlen($textobusca) >= $this->tamanhoStringBusca;
		if ($listaTudo)
			$cidades = cidades::where('', '=', "")->where('', 'like', '%' . "$textobusca" . '%')->orderBy('', 'asc')->limit($this->limiteRegistros)->get();
		else
			$cidades = cidades::where('', '=', "")->orderBy('', 'asc')->paginate(10);
		
		return view('cadastros.cidades.listagem', ['cidades' => $cidades, 'listaTudo' => $listaTudo, 'tamanhoStringBusca' => $this->tamanhoStringBusca, 'textobusca' => $textobusca]);
	}
}
