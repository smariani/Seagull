<?php
class ProdottiController extends AppController{
	
	public function index(){
		
	}
	
	public function admin(){
		//$this->layout = 'seagull';
		if ($this->Auth->user('role') === 'admin') {
			$res = $this->Prodotto->find('all');
			$this->set('prodotti', $res);
			$this->set('messaggio', 'Trovati '.count($res).' prodotti');
			$this->set('status', true);
		} else {
			$this->set('messaggio', 'Non sei autorizzato');
			$this->set('prodotti', array());
			$this->set('status', false);
		}
	}
	
	public function cuoco(){
		$this->layout = 'seagull';
		if ($this->Auth->user('role') === 'cuoco') {
			$res = $this->Prodotto->find('all');
			$this->set('prodotti', $res);
			$this->set('messaggio', 'Trovati '.count($res).' prodotti');
			$this->set('status', true);
		} else {
			$this->set('messaggio', 'Non sei autorizzato');
			$this->set('prodotti', array());
			$this->set('status', false);
		}
	}

	public function aggiungi(){
		if ($this->Auth->user('role') === 'admin') {
			$this->set('messaggio', 'Inserisci i dati richiesti');
			$this->set('status', true);
		} else {
			$this->set('messaggio', 'Non sei autorizzato');
			$this->set('status', false);
		}
	}
	
	public function salva(){
		$this->autoRender = false;
		if ($this->Auth->user('role') !== 'admin'){
			die("Non sei autorizzato");
		}
		if ((isset($_POST['nome'])) AND (isset($_POST['prezzo']))){
			$portata = array(
				'nome' => $_POST['nome'],
				'prezzo' => $_POST['prezzo']
			);
			$this->Prodotto->save($portata);
		}
		if (isset($_POST['altro'])){
			$this->render('aggiungi');
		} else {
			$this->set('messaggio', 'portata salvata con successo');
			$this->redirect($this->Auth->user('role'));
		}
	}
	
	public function modifica($id = NULL){
		if ($this->Auth->user('role') !== 'admin'){
			die("Non sei autorizzato ad aggiornare le portate");
		}
		if ($this->Auth->user('role') === 'admin') {
			$res = $this->Prodotto->find('first', array(
				'conditions' => array(
					'id' => $id
				)
			));
			$this->set('prodotto', $res);
			$this->set('messaggio', 'Modifica i campi');
			$this->set('status', true);
		} else {
			$this->set('messaggio', 'Non sei autorizzato');
			$this->set('prodotti', array());
			$this->set('status', false);
		}
	}
	
	public function update(){
		$this->autoRender = false;
		if ($this->Auth->user('role') !== 'admin'){
			die("Non sei autorizzato ad aggiornare le portate");
		}
		if ((isset($_POST['nome'])) AND (isset($_POST['prezzo']))){
			$id = $_POST["id"];
			$nome = $_POST['nome'];
			$prezzo = $_POST['prezzo'];
			$this->Prodotto->query("
				UPDATE portate
				SET nome = '$nome', prezzo = '$prezzo'
				WHERE id = '$id'
			");
		}
		$this->set('messaggio', 'portata salvata correttamente');
		$this->redirect($this->Auth->user('role'));
		}
		
	public function cancella($id = NULL){
		$this->autoRender = false;
		if ($this->Auth->user('role') !== 'admin'){
			die("Non sei Autorizzato a cancellare");
		}
		$this->Portata->query("DELETE FROM portate WHERE id = $id");
		$this->set('messaggio', 'prodotto eliminato');
		$this->redirect($this->Auth->user('role'));
	}
	
	public function visualizza($id = NULL){
		$autorizzazioni = array('admin', 'cuoco');
		if (in_array($this->Auth->user('role'),$autorizzazioni) === false){
			die("Non sei autorizzato a visualizzare");
		}
		$portata = $this->Portata->findById($id);
		$this->set('prodotto', $portata);
		$this->set('ruolo', $this->Auth->user('role'));
		$this->set('status', true);
	}

}