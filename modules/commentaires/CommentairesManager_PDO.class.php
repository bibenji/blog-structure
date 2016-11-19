<?php

namespace modules\commentaires;

class CommentairesManager_PDO
{
	protected $db;
	
	public function __construct(\PDO $db)
	{
		$this->db = $db;
	}
    
    public function getComments()
    {
        $q = $this->db->prepare('SELECT pseudo, commentaire2 FROM commentaires WHERE idarticle = ? ORDER BY ID DESC');
		$q->execute(array($_GET['article']));
        $donnees = $q->fetchAll();
        return $donnees;
        
    }
    
    public function saveComment($idarticle, $dateenvoi, $pseudo, $mail, $com)
    {
        $q = $this->db->prepare('INSERT INTO commentaires (idarticle, date, pseudo, mail, commentaire2) VALUES(:idarticle, :date, :pseudo, :mail, :commentaire2)');
        $q ->execute(array(
			'idarticle' => $idarticle,
			'date' => $dateenvoi,
			'pseudo' => $pseudo,
			'mail' => $mail,
			'commentaire2' => $com));
        
        return "Commentaire bien enregistré, merci !";
        

        
    }

}
 

   