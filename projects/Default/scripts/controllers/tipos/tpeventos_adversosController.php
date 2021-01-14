<?php

namespace App\Http\Controllers\tipos;

use App\Http\Controllers\globalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tpeventos_adversos;
use Redirect;
use Session;
use Exception;

class tpeventos_adversosController extends globalController
{
    public function pesquisar(Request $request)
    {
        parent::pesquisar($request);
        return Redirect::to("/tpeventos_adversos");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();
		try
		{	
			$tpeventos_adversos = tpeventos_adversos::findorfail($request->id);
			$nome = $tpeventos_adversos->descricao;

			DB::beginTransaction();
			$tpeventos_adversos->delete();
	        DB::commit();

	        \Session::Flash('Status', "Exclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/tpeventos_adversos");
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
			$tpeventos_adversos = tpeventos_adversos::findorfail($request->id);
			return view('tipos.tpeventos_adversos.excluir', ['tpeventos_adversos' => $tpeventos_adversos]);
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
			$tpeventos_adversos = tpeventos_adversos::findorfail($request->id);
			
			$tpeventos_adversos->id_cli = $request->id_cli;
			$tpeventos_adversos->id_ = $request->id_;
			$tpeventos_adversos->descricao = $request->descricao;

			DB::beginTransaction();
			$tpeventos_adversos->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Alteração de '$nome' realizada com sucesso");
	        return Redirect::to("/tpeventos_adversos");
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
			$tpeventos_adversos = tpeventos_adversos::findorfail($request->id);
			return view('tipos.tpeventos_adversos.alterar', ['tpeventos_adversos' => $tpeventos_adversos]);
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
			$tpeventos_adversos = tpeventos_adversos::findorfail($request->id);
			return view('tipos.tpeventos_adversos.consultar', ['tpeventos_adversos' => $tpeventos_adversos]);
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
			$tpeventos_adversos = new tpeventos_adversos();
			
			$tpeventos_adversos->id_cli = $request->id_cli;
			$tpeventos_adversos->id_ = $request->id_;
			$tpeventos_adversos->descricao = $request->descricao;

			DB::beginTransaction();
			$tpeventos_adversos->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Inclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/tpeventos_adversos");
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
		return view('tipos.tpeventos_adversos.incluir');
	}

	public function index()
	{
		$this->validausuario();
		
		$textobusca = $this->buscarpesquisa();
		$listaTudo = strlen($textobusca) >= $this->tamanhoStringBusca;
		if ($listaTudo)
			$tpeventos_adversos = tpeventos_adversos::where('', '=', "")->where('', 'like', '%' . "$textobusca" . '%')->orderBy('', 'asc')->limit($this->limiteRegistros)->get();
		else
			$tpeventos_adversos = tpeventos_adversos::where('', '=', "")->orderBy('', 'asc')->paginate(10);
		
		return view('tipos.tpeventos_adversos.listagem', ['tpeventos_adversos' => $tpeventos_adversos, 'listaTudo' => $listaTudo, 'tamanhoStringBusca' => $this->tamanhoStringBusca, 'textobusca' => $textobusca]);
	}
}
