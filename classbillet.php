<?php

class Billet
{
	protected $idb;
	protected $titreb;
	protected $messageb;
	protected $auteurb;
	protected $dateb;
	protected $erreursb=[];


	const AUTEURB_FAU = 1;
	const TITREB_FAU = 2;
	const MESSAGEB_FAU = 3;

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

	public function idb() { return $this->idb; }
	public function titreb() { return $this->titreb; }
	public function messageb() { return $this->messageb; }
	public function auteurb() { return $this->auteurb; }
	public function dateb() { return $this->dateb; }

	public function setIdb($idbl)
	{
		// L'identifiant du bilet, un nombre entier.
		$this->idb = (int) $idbl;
	}

	public function setTitreb($titrebl)
	{
		// On vérifie qu'il s'agit bien d'une chaîne de caractères.
		// Dont la longueur est inférieure à 50 caractères.
		if (is_string($titrebl) && strlen($titrebl) <= 50 && !empty($titrebl))
		{
			$this->titreb = $titrebl;
		}
		else{$this->erreursb[]= self::TITREB_FAU;}
	}

	public function setMessageb($messagebl)
	{
		// On vérifie qu'il s'agit bien d'une chaîne de caractères.
		// Dont la longueur est inférieure à 30 caractères.
		if (is_string($messagebl) && strlen($messagebl) <= 2000 && !empty($messagebl))
		{
			$this->messageb = $messagebl;
		}
		else{$this->erreursb[]= self::MESSAGEB_FAU;}
	}


	public function setAuteurb($auteurbl)
	{
		// On vérifie qu'il s'agit bien d'une chaîne de caractères.
		// Dont la longueur est inférieure à 30 caractères.
		if (is_string($auteurbl) && strlen($auteurbl) <= 50 && !empty($auteurbl))
		{
			$this->auteurb = $auteurbl;
		}
		else{$this->erreursb[]= self::AUTEURB_FAU;}
	}


	public function setDateb( $datebl)
	{
		 
		$this->dateb = $datebl;
	}


	public function validb()
	{

		return !empty($this->auteurb) || !empty($this->messageb) || !empty($this->titreb) ||
		!empty($this->idbc);
	}


	public function erreurslistb()
	{

		return $this->erreursb;
	}


}