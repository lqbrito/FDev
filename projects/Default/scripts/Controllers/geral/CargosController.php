<?php

namespace App\Http\Controllers\geral;

use App\Http\Controllers\GlobalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cargos;
use App\Services\CargosService;
use Redirect;
use Session;
use Exception;

class CargosController extends GlobalController
{
	private $cargosService;

	function __construct() 
	{
    	$this->cargosService = new CargosService();    
    }


    public function pesquisar(Request $request)
    {
        $this->cargosService->pesquisar($request);

        return Redirect::to("/cargos");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();

		if ($this->cargosService->excluindo($request))
			return Redirect::to("/cargos");
		else
			return back()->withInput();
	}

	public function excluir(Request $request)
	{
		$this->validausuario();

		$cargos = $this->cargosService->excluir($request);

		if (isset($cargos))
			return view('geral.cargos.excluir', ['cargos' => $cargos]);
		else
			return back()->withInput();
	}

	public function alterando(Request $request)
	{
		$this->validausuario();

		if ($this->cargosService->alterando($request))
			return Redirect::to("/cargos");
		else
			return back()->withInput();
	}

	public function alterar(Request $request)
	{
		$this->validausuario();

		$cargos = $this->cargosService->alterar($request);

		if (isset($cargos))
			return view('geral.cargos.alterar', ['cargos' => $cargos]);
		else
			return back()->withInput();
	}

	public function consultar(Request $request)
	{
		$this->validausuario();

		$cargos = $this->cargosService->consultar($request);

		if (isset($cargos))
			return view('geral.cargos.consultar', ['cargos' => $cargos]);
		else
			return back()->withInput();
	}

	public function incluindo(Request $request)
	{
		$this->validausuario();

		if ($this->cargosService->incluindo($request))
			return Redirect::to("/cargos");
		else
			return back()->withInput();
	}

	public function incluir()
	{
		$this->validausuario();

		$cargos = $this->cargosService->incluir();

		if (isset($cargos))
			return view('geral.cargos.incluir', ['cargos' => $cargos]);
		else
			return back()->withInput();
	}

	public function index()
	{
		$this->validausuario();

		$parametros = $this->cargosService->index();

		return view('geral.cargos.index', $parametros);
	}
}
