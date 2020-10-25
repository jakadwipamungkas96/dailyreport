<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Process extends Drn_Controller {

	
	function __construct()
	{
		parent::__construct();
	}

	
	public function index_get()
	{
		$arrayName = '[{"dates":"20 Oct 2020","wilayah1":"100000","wilayah2":"130000","wilayah3":"150000","wilayah4":"120000","wilayah5":"150000"},{"dates":"21 Oct 2020","wilayah1":"150000","wilayah2":"160000","wilayah3":"190000","wilayah4":"150000","wilayah5":"180000"},{"dates":"22 Oct 2020","wilayah1":"200000","wilayah2":"200000","wilayah3":"230000","wilayah4":"230000","wilayah5":"230000"},{"dates":"23 Oct 2020","wilayah1":"250000","wilayah2":"230000","wilayah3":"270000","wilayah4":"240000","wilayah5":"280000"},{"dates":"24 Oct 2020","wilayah1":"300000","wilayah2":"300000","wilayah3":"340000","wilayah4":"290000","wilayah5":"370000"},{"dates":"25 Oct 2020","wilayah1":"350000","wilayah2":"330000","wilayah3":"360000","wilayah4":"300000","wilayah5":"390000"},{"dates":"26 Oct 2020","wilayah1":"370000","wilayah2":"390000","wilayah3":"400000","wilayah4":"340000","wilayah5":"400000"}]';
		
		$data = [
			'data'=> json_decode($arrayName)
		];

		echo json_encode($data);

	}
}
