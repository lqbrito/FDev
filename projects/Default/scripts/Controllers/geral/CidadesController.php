<?php

namespace App\Http\Controllers\geral;

use App\Http\Controllers\GlobalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cidades;
use App\Services\CidadesService;
use Redirect;
use Session;
use Exception;

class CidadesController extends GlobalController
{
	private $cidadesService;

	function __construct() 
	{
    	$this->cidadesService = new CidadesService();    
    }


    public function pesquisar(Request $request)
    {
        $this->cidadesService->pesquisar($request);

        return Redirect::to("/cidades");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();

		if ($this->cidadesService->excluindo($request))
			return Redirect::to("/cidades");
		else
			return back()->withInput();
	}

	public function excluir(Request $request)
	{
		$this->validausuario();

		$cidades = $this->cidadesService->excluir($request);

		if (isset($cidades))
			return view('geral.cidades.excluir', ['cidades' => $cidades]);
		else
			return back()->withInput();
	}

	public function alterando(Request $request)
	{
		$this->validausuario();

		if ($this->cidadesService->alterando($request))
			return Redirect::to("/cidades");
		else
			return back()->withInput();
	}

	public function alterar(Request $request)
	{
		$this->validausuario();

		$cidades = $this->cidadesService->alterar($request);

		if (isset($cidades))
			return view('geral.cidades.alterar', ['cidades' => $cidades]);
		else
			return back()->withInput();
	}

	public function consultar(Request $request)
	{
		$this->validausuario();

		$cidades = $this->cidadesService->consultar($request);

		if (isset($cidades))
			return view('geral.cidades.consultar', ['cidades' => $cidades]);
		else
			return back()->withInput();
	}

	public function incluindo(Request $request)
	{
		$this->validausuario();

		if ($this->cidadesService->incluindo($request))
			return Redirect::to("/cidades");
		else
			return back()->withInput();
	}

	public function incluir()
	{
		$this->validausuario();

		$cidades = $this->cidadesService->incluir();

		if (isset($cidades))
			return view('geral.cidades.incluir', ['cidades' => $cidades]);
		else
			return back()->withInput();
	}

	public function index()
	{
		$this->validausuario();

		$parametros = $this->cidadesService->index();

		return view('geral.cidades.index', $parametros);
	}
}
