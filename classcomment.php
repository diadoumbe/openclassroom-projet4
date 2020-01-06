<?php

class Comment
{
	protected $idc;
	protected $idbc;
	protected $titrec;
	protected $commentc;
	protected $signalc;
	protected $auteurc;
	protected $datec;
	protected $erreursc = [];


	const AUTEURC_FAU = 1;
	const TITREC_FAU = 2;
	const COMMENTC_FAU = 3;


	public function __construct($value=[])
	{
		if (!empty($value))
		{
			$this->hydrate($value)	;
		}
	}
	
	
	// Un tableau de données doit être passé à la fonction (d'où le préfixe « array »).
	public function hydrate(array $donnees)
	{
		foreach ($donnees as $key => $value)
		{
			// On récupère le nom du setter correspondant à l'attribut.
			$method = 'set'.ucfirst($key);

			// Si le setter correspondant existe.
			if (is_callable([$this, $method]))
			{
				// On appelle le setter.
				$this->$method($value);
			}
		}
	}

	public function idc() { return $this->idc; }
	public function idbc() { return $this->idbc; }
	public function titrec() { return $this->titrec; }
	public function commentc() { return $this->commentc; }
	public function signalc() { return $this->signalc; }
	public function auteurc() { return $this->auteurc; }
	public function datec() { return $this->datec; }

	public function setIdc($idcl)
	{
		// L'identifiant du commentaire, un nombre entier.
		$this->idc = (int) $idcl;
	}

	public function setIdbc($idbcl)
	{
		// L'identifiant du billet du commentaire, un nombre entier.
		$this->idbc = (int) $idbcl;
	}

	public function setTitrec($titrecl)
	{
		// On vérifie qu'il s'agit bien d'une chaîne de caractères.
		// Dont la longueur est inférieure à 50 caractères.
		if (is_string($titrecl) && strlen($titrecl) <= 50 && !empty($titrecl))
		{
			$this->titrec = $titrecl;
		}
		else {$this->erreursc[]=self::TITREC_FAU;}
	}

	public function setCommentc($commentcl)
	{
		// On vérifie qu'il s'agit bien d'une chaîne de caractères.
		// Dont la longueur est inférieure à 30 caractères.
		if (is_string($commentcl) && strlen($commentcl) <= 2000 && !empty($commentcl))
		{
			$this->commentc = $commentcl;
		}
		else{$this->erreursc[]=self::COMMENTC_FAU;}
	}


	public function setSignalc($signalcl)
	{
		$signalcl = (int) $signalcl;

		// On vérifie que la force passée est comprise entre 0 et 1.
		if ($signalcl = 0 OR $signalcl = 1)
		{
			$this->signalc = $signalcl;
		}
	}


	public function setAuteurc($auteurcl)
	{
		// On vérifie qu'il s'agit bien d'une chaîne de caractères.
		// Dont la longueur est inférieure à 50 caractères.
		if (is_string($auteurcl) && (strlen($auteurcl) <= 50) && !empty($auteurcl))
		{
			$this->auteurc = $auteurcl;
		}
		else{$this->erreursc[]= self:: AUTEURC_FAU;}
	}



	public function setDatec( $datecl)
	{
		$this->datec = $datecl;
	}


	public function validc()
	{
		 
		return !empty($this->auteurc) || !empty($this->commentc) || !empty($this->titrec) ||
		!empty($this->idbc);
	}


	public function erreurslistc()
	{

		return $this->erreursc;
	}


}