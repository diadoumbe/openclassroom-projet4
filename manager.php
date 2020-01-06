<?php

require_once 'classbillet.php';
require_once 'classcomment.php';

class Managerbc
{
	protected $db; // Instance de PDO

	// fonction constructeur instancie l objet
	public function __construct(PDO $db)
	{
		$this->db= $db;
	}


	// fonction ajouter billet dans admin
	public function addb(Billet $billet)
	{
		$q = $this->db->prepare('INSERT INTO billet(titreb, messageb, auteurb, dateb) VALUES(:titre, :message, :auteur, NOW() )') or die(print_r($_db->errorInfo()));

		$q->bindValue(':titre', $billet->titreb());
		$q->bindValue(':message', $billet->messageb());
		$q->bindValue(':auteur', $billet->auteurb());

		$q->execute();
	}


	// fonction ajouter commentaire
	public function addc(Comment $comment)
	{
		$q = $this->db->prepare('INSERT INTO comment(titrec, idbc, commentc, signalc, auteurc, datec) VALUES(:titre, :id, :comment, :signal, :auteur, NOW() )') or die(print_r($db->errorInfo()));

		$q->bindValue(':titre', $comment->titrec(), PDO::PARAM_STR);
		$q->bindValue(':id', $comment->idbc(), PDO::PARAM_INT);
		$q->bindValue(':comment', $comment->commentc(), PDO::PARAM_STR);
		$q->bindValue(':signal', $comment->signalc(), PDO::PARAM_INT);
		$q->bindValue(':auteur', $comment->auteurc(), PDO::PARAM_STR);
		 
		$q->execute();
	}


	// fonction supprimer un billet dans admin
	public function deleteb( $id)
	{
		$this->db->prepare('DELETE FROM billet WHERE idb = :id ') or die(print_r($db->errorInfo()));

		$q->bindValue(':id', $id, PDO::PARAM_INT);

		$q->execute();
	}


	// fonction supprimer un commentaire dans admin
	public function deletec( $id)
	{
		$this->db->prepare('DELETE FROM comment WHERE idc = :id ') or die(print_r($db->errorInfo()));

		$q->bindValue(':id', $id, PDO::PARAM_INT);

		$q->execute();
	}


	// fonction supprimer tous les commentaires d un billet dans admin
	public function deleteListc( $id)
	{
		$this->db->prepare('DELETE * FROM comment WHERE idbc = :id ') or die(print_r($db->errorInfo()));

		$q->bindValue(':id', $id, PDO::PARAM_INT);

		$q->execute();
	}


	// fonction retourne un billet
	public function getb($id)
	{
		$id = (int) $id;

		$q = $this->db->prepare('SELECT * FROM billet WHERE idb = :id ') or die(print_r($db->errorInfo()));

		$q->bindValue(':id', $id, PDO::PARAM_INT);

		$q->execute();

		$nombre=$q->rowCount();
		
		$donnees = $q->fetch(PDO::FETCH_ASSOC);

		return new Billet($donnees);
	}


	// fonction retourne un commentaire
	public function getc($id)
	{
		$id = (int) $id;

		$q = $this->db->prepare('SELECT * FROM comment WHERE idc = :id ') or die(print_r($db->errorInfo()));

		$q->bindValue(':id', $id, PDO::PARAM_INT);

		$q->execute();

		$nombre=$q->rowCount(); 
		
		$donnees = $q->fetch(PDO::FETCH_ASSOC);

		return new Comment($donnees);
	}


	// fonction lister tous les billets
	public function getListb()
	{
		$billets = [];

		$q = $this->db->query('SELECT * FROM billet ORDER BY dateb') or die(print_r($db->errorInfo()));

		$nombre=$q->rowCount();
		
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$billets[] = new Billet($donnees);
		}

		return $billets;
	}


	// fonction lister tous les commentaires d un billet
	public function getListc($id)
	{
		$comments = [];

		$q = $this->db->prepare('SELECT * FROM comment WHERE idbillet=: id ORDER BY datec') or die(print_r($db->errorInfo()));

		$q->bindValue(':id', $id, PDO::PARAM_INT);
		
		$nombre=$q->rowCount();
		
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$comments[] = new Comment($donnees);
		}

		return $comments;
	}

	// fonction modifier billet dans l admin
	public function updateb(Billet $billet)
	{
		$q = $this->db->prepare('UPDATE billet SET titreb = :titre, messageb = :message, auteurb = :auteur WHERE idb = :id') or die(print_r($db->errorInfo()));

		$q->bindValue(':titre', $billet->titreb(), PDO::PARAM_STR);
		$q->bindValue(':message', $billet->messageb(), PDO::PARAM_STR);
		$q->bindValue(':auteur', $billet->auteurb(), PDO::PARAM_STR);
		$q->bindValue(':id', $billet->idb(), PDO::PARAM_INT);

		$q->execute();
	}


	// fonction modifier commentaire dans l admin
	public function updatec(Comment $comment)
	{
		$q = $this->db->prepare('UPDATE billet SET titrec = :titre, commentc = :comment, auteurc = :auteur WHERE idc = :id') or die(print_r($db->errorInfo()));

		$q->bindValue(':titre', $comment->titrec(), PDO::PARAM_STR);
		$q->bindValue(':comment', $comment->commentc(), PDO::PARAM_STR);
		$q->bindValue(':auteur', $comment->auteurc(), PDO::PARAM_STR);
		$q->bindValue(':id', $comment->idc(), PDO::PARAM_INT);

		$q->execute();
	}


	// fonction lister tous les commentaires signalés
	public function signalistc()
	{
		$comments = [];
		$q = $this->db->query('SELECT * FROM comment WHERE signalc=1 ') or die(print_r($db->errorInfo()));

		$nombre=$q->rowCount();
		
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$comments[] = new Comment($donnees);
		}
		 
		return $comments;
	}


	// fonction signaler commentaire
	public function signalc( $id)
	{
		$q = $this->db->prepare('UPDATE billet SET signalc = 1 WHERE idc = :id') or die(print_r($db->errorInfo()));

		$q->bindValue(':id', $id, PDO::PARAM_INT);

		$q->execute();
	}


	// fonction instanciation connexion a la bdd
	//public function setDb(PDO $db)
	//{
	//	$this->db = $db;
	//}

}