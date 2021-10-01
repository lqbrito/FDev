<?php

namespace App\Services;

use App\Services\GlobalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Colaboradores;
use Redirect;
use Session;
use Exception;

class ColaboradoresService extends GlobalService
{
    public function pesquisar(Request $request)
    {
        parent::pesquisar($request);
    }
    
    public function excluindo(Request $request)
	{
		try
		{	
			$colaboradores = Colaboradores::findorfail($request->id);

			$nome = $colaboradores->descricao;

			DB::beginTransaction();
			$colaboradores->delete();
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
			$colaboradores = Colaboradores::findorfail($request->id);

			return $colaboradores;
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
			$colaboradores = Colaboradores::findorfail($request->id);
			
			$colaboradores->idusuario = $request->idusuario;
			$colaboradores->idestruturaempresarial = $request->idestruturaempresarial;
			$colaboradores->name = $request->name;
			$colaboradores->rg = $request->rg;
			$colaboradores->orgaoexpedidor = $request->orgaoexpedidor;
			$colaboradores->datanascimento = $request->datanascimento;
			$colaboradores->sexo = $request->sexo;
			$colaboradores->idcadastro = $request->idcadastro;
			$colaboradores->status = $request->status;
			$colaboradores->nivelvisao = $request->nivelvisao;
			$colaboradores->acoes = $request->acoes;

			DB::beginTransaction();
			$colaboradores->save();
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
			$colaboradores = Colaboradores::findorfail($request->id);

			return $colaboradores;
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
			$colaboradores = Colaboradores::findorfail($request->id);

			return $colaboradores;
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
			$colaboradores = new Colaboradores();
			
			$colaboradores->idusuario = $request->idusuario;
			$colaboradores->idestruturaempresarial = $request->idestruturaempresarial;
			$colaboradores->name = $request->name;
			$colaboradores->rg = $request->rg;
			$colaboradores->orgaoexpedidor = $request->orgaoexpedidor;
			$colaboradores->datanascimento = $request->datanascimento;
			$colaboradores->sexo = $request->sexo;
			$colaboradores->idcadastro = $request->idcadastro;
			$colaboradores->status = $request->status;
			$colaboradores->nivelvisao = $request->nivelvisao;
			$colaboradores->acoes = $request->acoes;

			DB::beginTransaction();
			$colaboradores->save();
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
			$colaboradores = new Colaboradores();

			// Insira aqui os valores para atributos que possuem valor padrão

			return $colaboradores;
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
			$colaboradores = Colaboradores::where('', '=', "")->where('', 'like', '%' . "$textobusca" . '%')->orderBy('', 'asc')->limit($this->limiteRegistros)->get();
		else
			$colaboradores = Colaboradores::where('', '=', "")->orderBy('', 'asc')->paginate(10);
		
		return ['colaboradores' => $colaboradores, 'listaTudo' => $listaTudo, 'tamanhoStringBusca' => $this->tamanhoStringBusca, 'textobusca' => $textobusca];
	}
}
