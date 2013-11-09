<?php
class OrdiniController extends AppController {
	
	public function index(){
		$autorizzazioni = array('admin');
		if (in_array($this->Auth->user('role'),$autorizzazioni) === false){
			die("Non sei autorizzato a creare un ordine");
		}
	}
	
	public function nuovoOrdine(){
		$autorizzazioni = array('admin');
		if (in_array($this->Auth->user('role'),$autorizzazioni) === false){
			die("Non sei autorizzato a creare un ordine");
		}
		if (isset($_POST["tavolo"]) === true){
			$data = DateTime::createFromFormat("Y-m-d", date("Y-m-d"));
			$ordine = array(
				"id" => "",
				"data" => $data->format("Y-m-d"),
				"label" => $_POST["tavolo"],
				"stato" => "aperto"
			);
			$this->Ordine->save($ordine);
		}
	}
	
	public function cancella($id = NULL){
		$this->autoRender = false;
		if ($this->Auth->user('role') !== 'admin'){
			die("Non sei Autorizzato a cancellare");
		}
		$this->Ordine->query("DELETE FROM ordine WHERE id = $id");
		$this->set('messaggio', 'ordine eliminato');
		$this->redirect($this->Auth->user('role'));
	}
}