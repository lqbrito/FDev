<?php

namespace App\Http\Controllers\tipos;

use App\Http\Controllers\globalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tpintervencoes;
use Redirect;
use Session;
use Exception;

class tpintervencoesController extends globalController
{
    public function pesquisar(Request $request)
    {
        parent::pesquisar($request);
        return Redirect::to("/tpintervencoes");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();
		try
		{	
			$tpintervencoes = tpintervencoes::findorfail($request->id);
			$nome = $tpintervencoes->descricao;

			DB::beginTransaction();
			$tpintervencoes->delete();
	        DB::commit();

	        \Session::Flash('Status', "Exclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/tpintervencoes");
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
			$tpintervencoes = tpintervencoes::findorfail($request->id);
			return view('tipos.tpintervencoes.excluir', ['tpintervencoes' => $tpintervencoes]);
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
			$tpintervencoes = tpintervencoes::findorfail($request->id);
			
			$tpintervencoes->id_cli = $request->id_cli;
			$tpintervencoes->id_ = $request->id_;
			$tpintervencoes->descricao = $request->descricao;
			$tpintervencoes->gera_os = $request->gera_os;

			DB::beginTransaction();
			$tpintervencoes->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Alteração de '$nome' realizada com sucesso");
	        return Redirect::to("/tpintervencoes");
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
			$tpintervencoes = tpintervencoes::findorfail($request->id);
			return view('tipos.tpintervencoes.alterar', ['tpintervencoes' => $tpintervencoes]);
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
			$tpintervencoes = tpintervencoes::findorfail($request->id);
			return view('tipos.tpintervencoes.consultar', ['tpintervencoes' => $tpintervencoes]);
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
			$tpintervencoes = new tpintervencoes();
			
			$tpintervencoes->id_cli = $request->id_cli;
			$tpintervencoes->id_ = $request->id_;
			$tpintervencoes->descricao = $request->descricao;
			$tpintervencoes->gera_os = $request->gera_os;

			DB::beginTransaction();
			$tpintervencoes->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Inclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/tpintervencoes");
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
		return view('tipos.tpintervencoes.incluir');
	}

	public function index()
	{
		$this->validausuario();
		
		$textobusca = $this->buscarpesquisa();
		$listaTudo = strlen($textobusca) >= $this->tamanhoStringBusca;
		if ($listaTudo)
			$tpintervencoes = tpintervencoes::where('', '=', "")->where('', 'like', '%' . "$textobusca" . '%')->orderBy('', 'asc')->limit($this->limiteRegistros)->get();
		else
			$tpintervencoes = tpintervencoes::where('', '=', "")->orderBy('', 'asc')->paginate(10);
		
		return view('tipos.tpintervencoes.listagem', ['tpintervencoes' => $tpintervencoes, 'listaTudo' => $listaTudo, 'tamanhoStringBusca' => $this->tamanhoStringBusca, 'textobusca' => $textobusca]);
	}
}
