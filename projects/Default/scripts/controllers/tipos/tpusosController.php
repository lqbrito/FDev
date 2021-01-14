<?php

namespace App\Http\Controllers\tipos;

use App\Http\Controllers\globalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tpusos;
use Redirect;
use Session;
use Exception;

class tpusosController extends globalController
{
    public function pesquisar(Request $request)
    {
        parent::pesquisar($request);
        return Redirect::to("/tpusos");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();
		try
		{	
			$tpusos = tpusos::findorfail($request->id);
			$nome = $tpusos->descricao;

			DB::beginTransaction();
			$tpusos->delete();
	        DB::commit();

	        \Session::Flash('Status', "Exclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/tpusos");
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
			$tpusos = tpusos::findorfail($request->id);
			return view('tipos.tpusos.excluir', ['tpusos' => $tpusos]);
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
			$tpusos = tpusos::findorfail($request->id);
			
			$tpusos->id_cli = $request->id_cli;
			$tpusos->id_ = $request->id_;
			$tpusos->descricao = $request->descricao;

			DB::beginTransaction();
			$tpusos->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Alteração de '$nome' realizada com sucesso");
	        return Redirect::to("/tpusos");
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
			$tpusos = tpusos::findorfail($request->id);
			return view('tipos.tpusos.alterar', ['tpusos' => $tpusos]);
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
			$tpusos = tpusos::findorfail($request->id);
			return view('tipos.tpusos.consultar', ['tpusos' => $tpusos]);
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
			$tpusos = new tpusos();
			
			$tpusos->id_cli = $request->id_cli;
			$tpusos->id_ = $request->id_;
			$tpusos->descricao = $request->descricao;

			DB::beginTransaction();
			$tpusos->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Inclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/tpusos");
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
		return view('tipos.tpusos.incluir');
	}

	public function index()
	{
		$this->validausuario();
		
		$textobusca = $this->buscarpesquisa();
		$listaTudo = strlen($textobusca) >= $this->tamanhoStringBusca;
		if ($listaTudo)
			$tpusos = tpusos::where('', '=', "")->where('', 'like', '%' . "$textobusca" . '%')->orderBy('', 'asc')->limit($this->limiteRegistros)->get();
		else
			$tpusos = tpusos::where('', '=', "")->orderBy('', 'asc')->paginate(10);
		
		return view('tipos.tpusos.listagem', ['tpusos' => $tpusos, 'listaTudo' => $listaTudo, 'tamanhoStringBusca' => $this->tamanhoStringBusca, 'textobusca' => $textobusca]);
	}
}
