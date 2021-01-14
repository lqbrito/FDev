<?php

namespace App\Http\Controllers\tipos;

use App\Http\Controllers\globalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tpaquisicoes;
use Redirect;
use Session;
use Exception;

class tpaquisicoesController extends globalController
{
    public function pesquisar(Request $request)
    {
        parent::pesquisar($request);
        return Redirect::to("/tpaquisicoes");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();
		try
		{	
			$tpaquisicoes = tpaquisicoes::findorfail($request->id);
			$nome = $tpaquisicoes->descricao;

			DB::beginTransaction();
			$tpaquisicoes->delete();
	        DB::commit();

	        \Session::Flash('Status', "Exclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/tpaquisicoes");
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
			$tpaquisicoes = tpaquisicoes::findorfail($request->id);
			return view('tipos.tpaquisicoes.excluir', ['tpaquisicoes' => $tpaquisicoes]);
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
			$tpaquisicoes = tpaquisicoes::findorfail($request->id);
			
			$tpaquisicoes->id_cli = $request->id_cli;
			$tpaquisicoes->id_ = $request->id_;
			$tpaquisicoes->descricao = $request->descricao;

			DB::beginTransaction();
			$tpaquisicoes->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Alteração de '$nome' realizada com sucesso");
	        return Redirect::to("/tpaquisicoes");
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
			$tpaquisicoes = tpaquisicoes::findorfail($request->id);
			return view('tipos.tpaquisicoes.alterar', ['tpaquisicoes' => $tpaquisicoes]);
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
			$tpaquisicoes = tpaquisicoes::findorfail($request->id);
			return view('tipos.tpaquisicoes.consultar', ['tpaquisicoes' => $tpaquisicoes]);
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
			$tpaquisicoes = new tpaquisicoes();
			
			$tpaquisicoes->id_cli = $request->id_cli;
			$tpaquisicoes->id_ = $request->id_;
			$tpaquisicoes->descricao = $request->descricao;

			DB::beginTransaction();
			$tpaquisicoes->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Inclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/tpaquisicoes");
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
		return view('tipos.tpaquisicoes.incluir');
	}

	public function index()
	{
		$this->validausuario();
		
		$textobusca = $this->buscarpesquisa();
		$listaTudo = strlen($textobusca) >= $this->tamanhoStringBusca;
		if ($listaTudo)
			$tpaquisicoes = tpaquisicoes::where('', '=', "")->where('', 'like', '%' . "$textobusca" . '%')->orderBy('', 'asc')->limit($this->limiteRegistros)->get();
		else
			$tpaquisicoes = tpaquisicoes::where('', '=', "")->orderBy('', 'asc')->paginate(10);
		
		return view('tipos.tpaquisicoes.listagem', ['tpaquisicoes' => $tpaquisicoes, 'listaTudo' => $listaTudo, 'tamanhoStringBusca' => $this->tamanhoStringBusca, 'textobusca' => $textobusca]);
	}
}
