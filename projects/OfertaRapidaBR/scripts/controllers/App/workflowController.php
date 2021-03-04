<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\globalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\workflow;
use Redirect;
use Session;
use Exception;

class workflowController extends globalController
{
    public function pesquisar(Request $request)
    {
        parent::pesquisar($request);
        return Redirect::to("/workflow");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();
		try
		{	
			$workflow = workflow::findorfail($request->id);
			$nome = $workflow->descricao;

			DB::beginTransaction();
			$workflow->delete();
	        DB::commit();

	        \Session::Flash('Status', "Exclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/workflow");
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
			$workflow = workflow::findorfail($request->id);
			return view('App.workflow.excluir', ['workflow' => $workflow]);
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
			$workflow = workflow::findorfail($request->id);
			
			$workflow->descricao = $request->descricao;
			$workflow->observacoes = $request->observacoes;
			$workflow->idempresa = $request->idempresa;

			DB::beginTransaction();
			$workflow->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Alteração de '$nome' realizada com sucesso");
	        return Redirect::to("/workflow");
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
			$workflow = workflow::findorfail($request->id);
			return view('App.workflow.alterar', ['workflow' => $workflow]);
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
			$workflow = workflow::findorfail($request->id);
			return view('App.workflow.consultar', ['workflow' => $workflow]);
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
			$workflow = new workflow();
			
			$workflow->descricao = $request->descricao;
			$workflow->observacoes = $request->observacoes;
			$workflow->idempresa = $request->idempresa;

			DB::beginTransaction();
			$workflow->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Inclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/workflow");
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
		return view('App.workflow.incluir');
	}

	public function index()
	{
		$this->validausuario();
		
		$idempresa = Session::get('idempresa');
		$textobusca = $this->buscarpesquisa();
		$listaTudo = strlen($textobusca) >= $this->tamanhoStringBusca;
		if ($listaTudo)
			$workflow = workflow::where('', '=', "")->where('', 'like', '%' . "$textobusca" . '%')->orderBy('', 'asc')->limit($this->limiteRegistros)->get();
		else
			$workflow = workflow::where('', '=', "")->orderBy('', 'asc')->paginate(10);
		
		return view('App.workflow.listagem', ['workflow' => $workflow, 'listaTudo' => $listaTudo, 'tamanhoStringBusca' => $this->tamanhoStringBusca, 'textobusca' => $textobusca]);
	}
}
