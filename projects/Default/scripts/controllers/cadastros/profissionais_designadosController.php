<?php

namespace App\Http\Controllers\cadastros;

use App\Http\Controllers\globalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\profissionais_designados;
use Redirect;
use Session;
use Exception;

class profissionais_designadosController extends globalController
{
    public function pesquisar(Request $request)
    {
        parent::pesquisar($request);
        return Redirect::to("/profissionais_designados");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();
		try
		{	
			$profissionais_designados = profissionais_designados::findorfail($request->id);
			$nome = $profissionais_designados->descricao;

			DB::beginTransaction();
			$profissionais_designados->delete();
	        DB::commit();

	        \Session::Flash('Status', "Exclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/profissionais_designados");
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
			$profissionais_designados = profissionais_designados::findorfail($request->id);
			return view('cadastros.profissionais_designados.excluir', ['profissionais_designados' => $profissionais_designados]);
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
			$profissionais_designados = profissionais_designados::findorfail($request->id);
			
			$profissionais_designados->id_cli = $request->id_cli;
			$profissionais_designados->id_departamento = $request->id_departamento;
			$profissionais_designados->id_ = $request->id_;
			$profissionais_designados->nome = $request->nome;
			$profissionais_designados->sexo = $request->sexo;
			$profissionais_designados->foto = $request->foto;
			$profissionais_designados->email = $request->email;
			$profissionais_designados->login = $request->login;
			$profissionais_designados->senha = $request->senha;
			$profissionais_designados->situacao = $request->situacao;

			DB::beginTransaction();
			$profissionais_designados->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Alteração de '$nome' realizada com sucesso");
	        return Redirect::to("/profissionais_designados");
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
			$profissionais_designados = profissionais_designados::findorfail($request->id);
			return view('cadastros.profissionais_designados.alterar', ['profissionais_designados' => $profissionais_designados]);
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
			$profissionais_designados = profissionais_designados::findorfail($request->id);
			return view('cadastros.profissionais_designados.consultar', ['profissionais_designados' => $profissionais_designados]);
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
			$profissionais_designados = new profissionais_designados();
			
			$profissionais_designados->id_cli = $request->id_cli;
			$profissionais_designados->id_departamento = $request->id_departamento;
			$profissionais_designados->id_ = $request->id_;
			$profissionais_designados->nome = $request->nome;
			$profissionais_designados->sexo = $request->sexo;
			$profissionais_designados->foto = $request->foto;
			$profissionais_designados->email = $request->email;
			$profissionais_designados->login = $request->login;
			$profissionais_designados->senha = $request->senha;
			$profissionais_designados->situacao = $request->situacao;

			DB::beginTransaction();
			$profissionais_designados->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Inclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/profissionais_designados");
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
		return view('cadastros.profissionais_designados.incluir');
	}

	public function index()
	{
		$this->validausuario();
		
		$textobusca = $this->buscarpesquisa();
		$listaTudo = strlen($textobusca) >= $this->tamanhoStringBusca;
		if ($listaTudo)
			$profissionais_designados = profissionais_designados::where('', '=', "")->where('', 'like', '%' . "$textobusca" . '%')->orderBy('', 'asc')->limit($this->limiteRegistros)->get();
		else
			$profissionais_designados = profissionais_designados::where('', '=', "")->orderBy('', 'asc')->paginate(10);
		
		return view('cadastros.profissionais_designados.listagem', ['profissionais_designados' => $profissionais_designados, 'listaTudo' => $listaTudo, 'tamanhoStringBusca' => $this->tamanhoStringBusca, 'textobusca' => $textobusca]);
	}
}
