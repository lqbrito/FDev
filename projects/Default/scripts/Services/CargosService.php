<?php

namespace App\Services;

use App\Services\GlobalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cargos;
use Redirect;
use Session;
use Exception;

class CargosService extends GlobalService
{
    public function pesquisar(Request $request)
    {
        parent::pesquisar($request);
    }
    
    public function excluindo(Request $request)
	{
		try
		{	
			$cargos = Cargos::findorfail($request->id);

			$nome = $cargos->descricao;

			DB::beginTransaction();
			$cargos->delete();
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
			$cargos = Cargos::findorfail($request->id);

			return $cargos;
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
			$cargos = Cargos::findorfail($request->id);
			
			$cargos->descricao = $request->descricao;
			$cargos->idestruturaempresarial = $request->idestruturaempresarial;

			DB::beginTransaction();
			$cargos->save();
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
			$cargos = Cargos::findorfail($request->id);

			return $cargos;
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
			$cargos = Cargos::findorfail($request->id);

			return $cargos;
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
			$cargos = new Cargos();
			
			$cargos->descricao = $request->descricao;
			$cargos->idestruturaempresarial = $request->idestruturaempresarial;

			DB::beginTransaction();
			$cargos->save();
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
			$cargos = new Cargos();

			// Insira aqui os valores para atributos que possuem valor padrão

			return $cargos;
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
			$cargos = Cargos::where('', '=', "")->where('', 'like', '%' . "$textobusca" . '%')->orderBy('', 'asc')->limit($this->limiteRegistros)->get();
		else
			$cargos = Cargos::where('', '=', "")->orderBy('', 'asc')->paginate(10);
		
		return ['cargos' => $cargos, 'listaTudo' => $listaTudo, 'tamanhoStringBusca' => $this->tamanhoStringBusca, 'textobusca' => $textobusca];
	}
}
