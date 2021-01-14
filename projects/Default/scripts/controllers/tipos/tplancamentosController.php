<?php

namespace App\Http\Controllers\tipos;

use App\Http\Controllers\globalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tplancamentos;
use Redirect;
use Session;
use Exception;

class tplancamentosController extends globalController
{
    public function pesquisar(Request $request)
    {
        parent::pesquisar($request);
        return Redirect::to("/tplancamentos");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();
		try
		{	
			$tplancamentos = tplancamentos::findorfail($request->id);
			$nome = $tplancamentos->descricao;

			DB::beginTransaction();
			$tplancamentos->delete();
	        DB::commit();

	        \Session::Flash('Status', "Exclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/tplancamentos");
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
			$tplancamentos = tplancamentos::findorfail($request->id);
			return view('tipos.tplancamentos.excluir', ['tplancamentos' => $tplancamentos]);
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
			$tplancamentos = tplancamentos::findorfail($request->id);
			
			$tplancamentos->id_cli = $request->id_cli;
			$tplancamentos->id_ = $request->id_;
			$tplancamentos->id_tpintervencao = $request->id_tpintervencao;
			$tplancamentos->descricao_lancamento = $request->descricao_lancamento;

			DB::beginTransaction();
			$tplancamentos->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Alteração de '$nome' realizada com sucesso");
	        return Redirect::to("/tplancamentos");
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
			$tplancamentos = tplancamentos::findorfail($request->id);
			return view('tipos.tplancamentos.alterar', ['tplancamentos' => $tplancamentos]);
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
			$tplancamentos = tplancamentos::findorfail($request->id);
			return view('tipos.tplancamentos.consultar', ['tplancamentos' => $tplancamentos]);
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
			$tplancamentos = new tplancamentos();
			
			$tplancamentos->id_cli = $request->id_cli;
			$tplancamentos->id_ = $request->id_;
			$tplancamentos->id_tpintervencao = $request->id_tpintervencao;
			$tplancamentos->descricao_lancamento = $request->descricao_lancamento;

			DB::beginTransaction();
			$tplancamentos->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Inclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/tplancamentos");
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
		return view('tipos.tplancamentos.incluir');
	}

	public function index()
	{
		$this->validausuario();
		
		$textobusca = $this->buscarpesquisa();
		$listaTudo = strlen($textobusca) >= $this->tamanhoStringBusca;
		if ($listaTudo)
			$tplancamentos = tplancamentos::where('', '=', "")->where('', 'like', '%' . "$textobusca" . '%')->orderBy('', 'asc')->limit($this->limiteRegistros)->get();
		else
			$tplancamentos = tplancamentos::where('', '=', "")->orderBy('', 'asc')->paginate(10);
		
		return view('tipos.tplancamentos.listagem', ['tplancamentos' => $tplancamentos, 'listaTudo' => $listaTudo, 'tamanhoStringBusca' => $this->tamanhoStringBusca, 'textobusca' => $textobusca]);
	}
}
