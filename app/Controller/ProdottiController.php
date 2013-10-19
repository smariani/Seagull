<?php
class ProdottiController extends AppController{
	
	public function index(){
		
	}
	
	public function admin(){
		$this->layout = 'seagull';
		if ($this->Auth->user('role') === 'admin') {
			$res = $this->Portata->find('all');
			$this->set('portate', $res);
			$this->set('messaggio', 'Trovate '.count($res).' portate');
			$this->set('status', true);
		} else {
			$this->set('messaggio', 'Non sei autorizzato');
			$this->set('portate', array());
			$this->set('status', false);
		}
	}
	
	public function cuoco(){
		$this->layout = 'seagull';
		if ($this->Auth->user('role') === 'cuoco') {
			$res = $this->Portata->find('all');
			$this->set('portate', $res);
			$this->set('messaggio', 'Trovate '.count($res).' portate');
			$this->set('status', true);
		} else {
			$this->set('messaggio', 'Non sei autorizzato');
			$this->set('portate', array());
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
			$this->Portata->save($portata);
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
			$res = $this->Portata->find('first', array(
				'conditions' => array(
					'id' => $id
				)
			));
			$this->set('portata', $res);
			$this->set('messaggio', 'Modifica i campi');
			$this->set('status', true);
		} else {
			$this->set('messaggio', 'Non sei autorizzato');
			$this->set('portate', array());
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
			$this->Portata->query("
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
		$this->set('messaggio', 'portata eliminata');
		$this->redirect($this->Auth->user('role'));
	}
	
	public function visualizza($id = NULL){
		$autorizzazioni = array('admin', 'cuoco');
		if (in_array($this->Auth->user('role'),$autorizzazioni) === false){
			die("Non sei autorizzato a visualizzare");
		}
		$portata = $this->Portata->findById($id);
		$this->set('portata', $portata);
		$this->set('ruolo', $this->Auth->user('role'));
		$this->set('status', true);
	}

}