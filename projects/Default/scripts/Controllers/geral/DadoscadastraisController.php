<?php

namespace App\Http\Controllers\geral;

use App\Http\Controllers\GlobalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dadoscadastrais;
use App\Services\DadoscadastraisService;
use Redirect;
use Session;
use Exception;

class DadoscadastraisController extends GlobalController
{
	private $dadoscadastraisService;

	function __construct() 
	{
    	$this->dadoscadastraisService = new DadoscadastraisService();    
    }


    public function pesquisar(Request $request)
    {
        $this->dadoscadastraisService->pesquisar($request);

        return Redirect::to("/dadoscadastrais");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();

		if ($this->dadoscadastraisService->excluindo($request))
			return Redirect::to("/dadoscadastrais");
		else
			return back()->withInput();
	}

	public function excluir(Request $request)
	{
		$this->validausuario();

		$dadoscadastrais = $this->dadoscadastraisService->excluir($request);

		if (isset($dadoscadastrais))
			return view('geral.dadoscadastrais.excluir', ['dadoscadastrais' => $dadoscadastrais]);
		else
			return back()->withInput();
	}

	public function alterando(Request $request)
	{
		$this->validausuario();

		if ($this->dadoscadastraisService->alterando($request))
			return Redirect::to("/dadoscadastrais");
		else
			return back()->withInput();
	}

	public function alterar(Request $request)
	{
		$this->validausuario();

		$dadoscadastrais = $this->dadoscadastraisService->alterar($request);

		if (isset($dadoscadastrais))
			return view('geral.dadoscadastrais.alterar', ['dadoscadastrais' => $dadoscadastrais]);
		else
			return back()->withInput();
	}

	public function consultar(Request $request)
	{
		$this->validausuario();

		$dadoscadastrais = $this->dadoscadastraisService->consultar($request);

		if (isset($dadoscadastrais))
			return view('geral.dadoscadastrais.consultar', ['dadoscadastrais' => $dadoscadastrais]);
		else
			return back()->withInput();
	}

	public function incluindo(Request $request)
	{
		$this->validausuario();

		if ($this->dadoscadastraisService->incluindo($request))
			return Redirect::to("/dadoscadastrais");
		else
			return back()->withInput();
	}

	public function incluir()
	{
		$this->validausuario();

		$dadoscadastrais = $this->dadoscadastraisService->incluir();

		if (isset($dadoscadastrais))
			return view('geral.dadoscadastrais.incluir', ['dadoscadastrais' => $dadoscadastrais]);
		else
			return back()->withInput();
	}

	public function index()
	{
		$this->validausuario();

		$parametros = $this->dadoscadastraisService->index();

		return view('geral.dadoscadastrais.index', $parametros);
	}
}
