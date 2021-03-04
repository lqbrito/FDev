<?php

namespace App\Http\Controllers\[namespace];

use App\Http\Controllers\globalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\[nome_model];
use Redirect;
use Session;
use Exception;

class [nome_controller]Controller extends globalController
{
    public function pesquisar(Request $request)
    {
        parent::pesquisar($request);
        return Redirect::to("/[nome_controller]");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();
		try
		{	
			$[nome_model] = [nome_model]::findorfail($request->id);
			$nome = $[nome_model]->descricao;

			DB::beginTransaction();
			$[nome_model]->delete();
	        DB::commit();

	        \Session::Flash('Status', "Exclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/[nome_controller]");
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
			$[nome_model] = [nome_model]::findorfail($request->id);
			return view('[namespace].[nome_model].excluir', ['[nome_model]' => $[nome_model]]);
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
			$[nome_model] = [nome_model]::findorfail($request->id);
			
			[nome_campo]

			DB::beginTransaction();
			$[nome_model]->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Alteração de '$nome' realizada com sucesso");
	        return Redirect::to("/[nome_controller]");
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
			$[nome_model] = [nome_model]::findorfail($request->id);
			return view('[namespace].[nome_model].alterar', ['[nome_model]' => $[nome_model]]);
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
			$[nome_model] = [nome_model]::findorfail($request->id);
			return view('[namespace].[nome_model].consultar', ['[nome_model]' => $[nome_model]]);
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
			$[nome_model] = new [nome_model]();
			
			[nome_campo]

			DB::beginTransaction();
			$[nome_model]->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Inclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/[nome_controller]");
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
		return view('[namespace].[nome_model].incluir');
	}

	public function index()
	{
		$this->validausuario();
		
		$idempresa = Session::get('idempresa');
		$textobusca = $this->buscarpesquisa();
		$listaTudo = strlen($textobusca) >= $this->tamanhoStringBusca;
		if ($listaTudo)
			$[nome_model] = [nome_model]::where('', '=', "")->where('', 'like', '%' . "$textobusca" . '%')->orderBy('', 'asc')->limit($this->limiteRegistros)->get();
		else
			$[nome_model] = [nome_model]::where('', '=', "")->orderBy('', 'asc')->paginate(10);
		
		return view('[namespace].[nome_model].listagem', ['[nome_model]' => $[nome_model], 'listaTudo' => $listaTudo, 'tamanhoStringBusca' => $this->tamanhoStringBusca, 'textobusca' => $textobusca]);
	}
}
