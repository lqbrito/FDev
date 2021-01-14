<?php

namespace App\Http\Controllers\tipos;

use App\Http\Controllers\globalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tpequipamentos;
use Redirect;
use Session;
use Exception;

class tpequipamentosController extends globalController
{
    public function pesquisar(Request $request)
    {
        parent::pesquisar($request);
        return Redirect::to("/tpequipamentos");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();
		try
		{	
			$tpequipamentos = tpequipamentos::findorfail($request->id);
			$nome = $tpequipamentos->descricao;

			DB::beginTransaction();
			$tpequipamentos->delete();
	        DB::commit();

	        \Session::Flash('Status', "Exclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/tpequipamentos");
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
			$tpequipamentos = tpequipamentos::findorfail($request->id);
			return view('tipos.tpequipamentos.excluir', ['tpequipamentos' => $tpequipamentos]);
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
			$tpequipamentos = tpequipamentos::findorfail($request->id);
			
			$tpequipamentos->id_cli = $request->id_cli;
			$tpequipamentos->id_ = $request->id_;
			$tpequipamentos->descricao = $request->descricao;

			DB::beginTransaction();
			$tpequipamentos->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Alteração de '$nome' realizada com sucesso");
	        return Redirect::to("/tpequipamentos");
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
			$tpequipamentos = tpequipamentos::findorfail($request->id);
			return view('tipos.tpequipamentos.alterar', ['tpequipamentos' => $tpequipamentos]);
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
			$tpequipamentos = tpequipamentos::findorfail($request->id);
			return view('tipos.tpequipamentos.consultar', ['tpequipamentos' => $tpequipamentos]);
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
			$tpequipamentos = new tpequipamentos();
			
			$tpequipamentos->id_cli = $request->id_cli;
			$tpequipamentos->id_ = $request->id_;
			$tpequipamentos->descricao = $request->descricao;

			DB::beginTransaction();
			$tpequipamentos->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Inclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/tpequipamentos");
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
		return view('tipos.tpequipamentos.incluir');
	}

	public function index()
	{
		$this->validausuario();
		
		$textobusca = $this->buscarpesquisa();
		$listaTudo = strlen($textobusca) >= $this->tamanhoStringBusca;
		if ($listaTudo)
			$tpequipamentos = tpequipamentos::where('', '=', "")->where('', 'like', '%' . "$textobusca" . '%')->orderBy('', 'asc')->limit($this->limiteRegistros)->get();
		else
			$tpequipamentos = tpequipamentos::where('', '=', "")->orderBy('', 'asc')->paginate(10);
		
		return view('tipos.tpequipamentos.listagem', ['tpequipamentos' => $tpequipamentos, 'listaTudo' => $listaTudo, 'tamanhoStringBusca' => $this->tamanhoStringBusca, 'textobusca' => $textobusca]);
	}
}
