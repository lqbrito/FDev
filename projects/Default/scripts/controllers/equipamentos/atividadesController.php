<?php

namespace App\Http\Controllers\equipamentos;

use App\Http\Controllers\globalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\atividades;
use Redirect;
use Session;
use Exception;

class atividadesController extends globalController
{
    public function pesquisar(Request $request)
    {
        parent::pesquisar($request);
        return Redirect::to("/atividades");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();
		try
		{	
			$atividades = atividades::findorfail($request->id);
			$nome = $atividades->descricao;

			DB::beginTransaction();
			$atividades->delete();
	        DB::commit();

	        \Session::Flash('Status', "Exclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/atividades");
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
			$atividades = atividades::findorfail($request->id);
			return view('equipamentos.atividades.excluir', ['atividades' => $atividades]);
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
			$atividades = atividades::findorfail($request->id);
			
			$atividades->idusuariosolicitante = $request->idusuariosolicitante;
			$atividades->oque = $request->oque;
			$atividades->porque = $request->porque;
			$atividades->onde_grupo = $request->onde_grupo;
			$atividades->onde_subgrupo = $request->onde_subgrupo;
			$atividades->onde_outralocalizacao = $request->onde_outralocalizacao;
			$atividades->datainicio = $request->datainicio;
			$atividades->horainicio = $request->horainicio;
			$atividades->datafim = $request->datafim;
			$atividades->horafim = $request->horafim;
			$atividades->idgrupo = $request->idgrupo;
			$atividades->idsubgrupo = $request->idsubgrupo;
			$atividades->idusuario = $request->idusuario;
			$atividades->como = $request->como;
			$atividades->quanto = $request->quanto;
			$atividades->percentualconclusao = $request->percentualconclusao;
			$atividades->idempresa = $request->idempresa;
			$atividades->idfluxo = $request->idfluxo;
			$atividades->situacao = $request->situacao;
			$atividades->idusuarioquevalida = $request->idusuarioquevalida;
			$atividades->observacoesquemexecuta = $request->observacoesquemexecuta;
			$atividades->observacoesquemvalida = $request->observacoesquemvalida;

			DB::beginTransaction();
			$atividades->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Alteração de '$nome' realizada com sucesso");
	        return Redirect::to("/atividades");
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
			$atividades = atividades::findorfail($request->id);
			return view('equipamentos.atividades.alterar', ['atividades' => $atividades]);
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
			$atividades = atividades::findorfail($request->id);
			return view('equipamentos.atividades.consultar', ['atividades' => $atividades]);
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
			$atividades = new atividades();
			
			$atividades->idusuariosolicitante = $request->idusuariosolicitante;
			$atividades->oque = $request->oque;
			$atividades->porque = $request->porque;
			$atividades->onde_grupo = $request->onde_grupo;
			$atividades->onde_subgrupo = $request->onde_subgrupo;
			$atividades->onde_outralocalizacao = $request->onde_outralocalizacao;
			$atividades->datainicio = $request->datainicio;
			$atividades->horainicio = $request->horainicio;
			$atividades->datafim = $request->datafim;
			$atividades->horafim = $request->horafim;
			$atividades->idgrupo = $request->idgrupo;
			$atividades->idsubgrupo = $request->idsubgrupo;
			$atividades->idusuario = $request->idusuario;
			$atividades->como = $request->como;
			$atividades->quanto = $request->quanto;
			$atividades->percentualconclusao = $request->percentualconclusao;
			$atividades->idempresa = $request->idempresa;
			$atividades->idfluxo = $request->idfluxo;
			$atividades->situacao = $request->situacao;
			$atividades->idusuarioquevalida = $request->idusuarioquevalida;
			$atividades->observacoesquemexecuta = $request->observacoesquemexecuta;
			$atividades->observacoesquemvalida = $request->observacoesquemvalida;

			DB::beginTransaction();
			$atividades->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Inclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/atividades");
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
		return view('equipamentos.atividades.incluir');
	}

	public function index()
	{
		$this->validausuario();
		
		$textobusca = $this->buscarpesquisa();
		$listaTudo = strlen($textobusca) >= $this->tamanhoStringBusca;
		if ($listaTudo)
			$atividades = atividades::where('', '=', "")->where('', 'like', '%' . "$textobusca" . '%')->orderBy('', 'asc')->limit($this->limiteRegistros)->get();
		else
			$atividades = atividades::where('', '=', "")->orderBy('', 'asc')->paginate(10);
		
		return view('equipamentos.atividades.listagem', ['atividades' => $atividades, 'listaTudo' => $listaTudo, 'tamanhoStringBusca' => $this->tamanhoStringBusca, 'textobusca' => $textobusca]);
	}
}
