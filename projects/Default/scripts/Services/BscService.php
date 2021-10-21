<?php

namespace App\Services;

use App\Services\GlobalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Domains\BscDomain;
use Redirect;
use Session;
use Exception;

class BscService extends GlobalService
{
    public function pesquisar(Request $request)
    {
        parent::pesquisar($request);
    }
    
    public function excluindo(Request $request)
	{
		try
		{	
			$bsc = BscDomain::findorfail($request->id);

			$nome = $bsc->descricao;

			DB::beginTransaction();
			$bsc->delete();
	        DB::commit();

	        Session::Flash('Status', "Exclusão de '$nome' realizada com sucesso");

	        return true;
		} 
		catch (\Exception $e) 
		{
			report($e);
			DB::rollBack();

			Session::Flash('Erro', $e->getMessage());

			return false;
		}
	}

	public function excluir(Request $request)
	{
		try
		{	
			$bsc = BscDomain::findorfail($request->id);

			return $bsc;
		} 
		catch (\Exception $e) 
		{
			report($e);

			Session::Flash('Erro', $e->getMessage());

			return null;
		}
	}

	public function alterando(Request $request)
	{
		try
		{	
			$bsc = BscDomain::findorfail($request->id);
			
			$bsc->descricao = $request->descricao;
			$bsc->idempresa = $request->idempresa;
			$bsc->idgrupo = $request->idgrupo;
			$bsc->idsubgrupo = $request->idsubgrupo;
			$bsc->observacoes = $request->observacoes;

			DB::beginTransaction();
			$bsc->save();
	        DB::commit();

	        $nome = $request->descricao;

	        Session::Flash('Status', "Alteração de '$nome' realizada com sucesso");

	        return true;
		} 
		catch (\Exception $e) 
		{
			report($e);
			DB::rollBack();

			Session::Flash('Erro', $e->getMessage());

			return false;
		}
	}

	public function alterar(Request $request)
	{
		try
		{	
			$bsc = BscDomain::findorfail($request->id);

			return $bsc;
		} 
		catch (\Exception $e) 
		{
			report($e);

			Session::Flash('Erro', $e->getMessage());

			return null;
		}
	}

	public function consultar(Request $request)
	{
		try
		{	
			$bsc = BscDomain::findorfail($request->id);

			return $bsc;
		} 
		catch (\Exception $e) 
		{
			report($e);

			Session::Flash('Erro', $e->getMessage());

			return null;
		}
	}

	public function incluindo(Request $request)
	{
		try
		{	
			$bsc = new BscDomain();
			
			$bsc->descricao = $request->descricao;
			$bsc->idempresa = $request->idempresa;
			$bsc->idgrupo = $request->idgrupo;
			$bsc->idsubgrupo = $request->idsubgrupo;
			$bsc->observacoes = $request->observacoes;

			DB::beginTransaction();
			$bsc->save();
	        DB::commit();

	        $nome = $request->descricao;

	        Session::Flash('Status', "Inclusão de '$nome' realizada com sucesso");

	        return true;
		} 
		catch (\Exception $e) 
		{
			report($e);
			DB::rollBack();

			Session::Flash('Erro', $e->getMessage());

			return false;
		}
	}

	public function incluir()
	{
		try
		{
			$bsc = new BscDomain();

			// Insira aqui os valores para atributos que possuem valor padrão

			return $bsc;
		} 
		catch (\Exception $e) 
		{
			report($e);
			DB::rollBack();

			Session::Flash('Erro', $e->getMessage());
			
			return null;
		}
	}

	public function index()
	{
		$idempresa = Session::get('idempresa');
		$textobusca = $this->buscarpesquisa();
		$listaTudo = strlen($textobusca) >= $this->tamanhoStringBusca;
		if ($listaTudo)
			$bsc = BscDomain::where('', '=', "")->where('', 'like', '%' . "$textobusca" . '%')->orderBy('', 'asc')->limit($this->limiteRegistros)->get();
		else
			$bsc = BscDomain::where('', '=', "")->orderBy('', 'asc')->paginate(10);
		
		return ['bsc' => $bsc, 'listaTudo' => $listaTudo, 'tamanhoStringBusca' => $this->tamanhoStringBusca, 'textobusca' => $textobusca];
	}
}
