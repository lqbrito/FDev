<?php

namespace App\Http\Controllers\geral;

use App\Http\Controllers\GlobalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use App\Services\BscService;
use Redirect;
use Session;

class BscController extends GlobalController
{
	private $bscService;

	function __construct() 
	{
    	$this->bscService = new BscService();    
    }


    public function pesquisar(Request $request)
    {
        $this->bscService->pesquisar($request);

        return Redirect::to("/bsc");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();

		if ($this->bscService->excluindo($request))
			return Redirect::to("/bsc");
		else
			return back()->withInput();
	}

	public function excluir(Request $request)
	{
		$this->validausuario();

		$bsc = $this->bscService->excluir($request);

		if (isset($bsc))
			return view('geral.bsc.excluir', ['bsc' => $bsc]);
		else
			return back()->withInput();
	}

	public function alterando(Request $request)
	{
		$this->validausuario();

		if ($this->bscService->alterando($request))
			return Redirect::to("/bsc");
		else
			return back()->withInput();
	}

	public function alterar(Request $request)
	{
		$this->validausuario();

		$bsc = $this->bscService->alterar($request);

		if (isset($bsc))
			return view('geral.bsc.alterar', ['bsc' => $bsc]);
		else
			return back()->withInput();
	}

	public function consultar(Request $request)
	{
		$this->validausuario();

		$bsc = $this->bscService->consultar($request);

		if (isset($bsc))
			return view('geral.bsc.consultar', ['bsc' => $bsc]);
		else
			return back()->withInput();
	}

	public function incluindo(Request $request)
	{
		$this->validausuario();

		if ($this->bscService->incluindo($request))
			return Redirect::to("/bsc");
		else
			return back()->withInput();
	}

	public function incluir()
	{
		$this->validausuario();

		$bsc = $this->bscService->incluir();

		if (isset($bsc))
			return view('geral.bsc.incluir', ['bsc' => $bsc]);
		else
			return back()->withInput();
	}

	public function index()
	{
		$this->validausuario();

		$parametros = $this->bscService->index();

		return view('geral.bsc.index', $parametros);
	}
}
