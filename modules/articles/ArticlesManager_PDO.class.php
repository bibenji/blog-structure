<?php

namespace modules\articles;

class ArticlesManager_PDO
{
	protected $db;
	
	public function __construct(\PDO $db)
	{
		$this->db = $db;
	}
    
    /*
    * Permet de récupérer les articles par catégorie ou toutes catégories confondues
    */
    public function getArticles($deb, $nb, $cat = '"1","2","3","4"') {
		$q = $this->db->prepare('SELECT a.id id, a.slug slug, a.titre titre, a.article article, a.picture picture, a.categorie categorie_id, c.nom categorie, a.compteur compteur, a.old_date date_publication
								FROM articles a
								INNER JOIN categories c ON a.categorie = c.id
								WHERE a.categorie IN (' . $cat . ')
								ORDER BY id DESC
								LIMIT :deb, :nb
								');
		$q->bindValue(':deb', $deb, \PDO::PARAM_INT);
		$q->bindValue(':nb', $nb, \PDO::PARAM_INT);
		$q->execute();
		
		while ($donnees = $q->fetch()) {
				$articles[] = $donnees;
		}
		return $articles;
	}
    
    /*
    * Permet de récupérer des articles de manière aléatoire
    */
    public function getRandArts($deb, $nb) {
        $q = $this->db->prepare('SELECT a.id id, a.slug slug, a.titre titre, a.article article, a.picture picture, a.categorie categorie_id, c.nom categorie, a.compteur compteur, a.old_date date_publication
								FROM articles a
								INNER JOIN categories c ON a.categorie = c.id
								ORDER BY RAND()
								LIMIT :deb, :nb
								');
		$q->bindValue(':deb', $deb, \PDO::PARAM_INT);
		$q->bindValue(':nb', $nb, \PDO::PARAM_INT);
		$q->execute();
		
		while ($donnees = $q->fetch()) {
				$articles[] = $donnees;
		}
		return $articles;
    }
    
    /*
    * Permet d'obtenir les articles les plus vus
    * 
    */
    public function getBestArticles($deb, $nb) {        
        $q = $this->db->prepare('
            SELECT a.id id, a.slug slug, a.titre titre, a.article article, a.picture picture, a.categorie categorie_id, c.nom categorie, CAST(a.compteur AS UNSIGNED) stat
            FROM articles a, categories c
            WHERE a.categorie = c.id
            ORDER BY stat DESC LIMIT :deb, :nb
        '); 
        $q->bindValue(':deb', $deb, \PDO::PARAM_INT);
		$q->bindValue(':nb', $nb, \PDO::PARAM_INT);
		$q->execute();
		
		while ($donnees = $q->fetch()) {
				$articles[] = $donnees;
		}
		return $articles;
    }    
    
    /*
    * Permet de récupérer des articles au hasard, toutes catégories confondues
    */
    function recupArticles() {
	$q = $this->db->prepare('
			SELECT id, titre
            FROM articles
			ORDER BY RAND() LIMIT 0, 8
			');
	$q->execute(array());
	
	   while ($donnees = $q->fetch()) {
            $articles[] = $donnees;
        }
        return $articles;
        
    }
    

       
	
    /*
    * Compte le nombre d'articles par catégorie ou toutes catégories confondues
    */
	public function totalArticles($cat = '"1","2","3","4"') {
		$q = $this->db->query('SELECT COUNT(id) FROM articles WHERE categorie IN (' . $cat . ')');
	//public function totalArticles($cat = -1) {
		//$q = $this->db->query('SELECT COUNT(id) FROM articles' . ($cat ? (' WHERE categorie IN ' . $cat) : ("")) . '');
		return $q->fetchColumn(); // possibilité de tout mettre sur la même ligne
		
	}
    
    /*
    * Permet de récupérer un article à partir de son id
    */
    public function getUnArticle($id) {
		$q = $this->db->query('SELECT a.id id, a.titre titre, a.article article, a.picture picture, a.categorie categorie_id, c.nom categorie, a.compteur compteur, a.date_publication date_publication
								FROM articles a
								INNER JOIN categories c ON a.categorie = c.id
								WHERE a.id = ' . $id);
		
        $un_article = $q->fetch();
        return $un_article;
        /*
		$un_article = $q->fetch(\PDO::FETCH_ASSOC);
		$un_article['nb_commentaires'] = $this->getTotalCommentaires($id);
		return new Article($un_article);
        */
	}
    
    /*
    * Permet de récupérer d'autres articles autres que l'article en cours
    */
	public function getOthersArticles($deb, $nb, $id, $cat = '"1","2","3","4"') {
		$articles = array();
		$q = $this->db->prepare('SELECT a.id id, a.slug slug, a.titre titre, a.picture picture, a.article article
								FROM articles a
								WHERE a.categorie IN (' . $cat . ')
								AND a.id <> ' . $id . '
								ORDER BY rand()
								LIMIT :deb, :nb
								');
		$q->bindValue(':deb', $deb, \PDO::PARAM_INT);
		$q->bindValue(':nb', $nb, \PDO::PARAM_INT);
		$q->execute();
		
		while ($donnees = $q->fetch(\PDO::FETCH_ASSOC)) {
				$articles[] = $donnees;
		}
		
		return $articles;
	}
    
    /*
    * Fonction utilisée pour rechercher des articles par mots-clés
    */
    public function searchArts($keywords, $in_contenu) {
        
    $keywords = htmlentities($keywords);
    $keywords = addcslashes($keywords, '%_');
        
    if ($in_contenu) $in_contenu = ' OR a.article LIKE :keys1 ';
    else $in_contenu = ' ';
        
    $q = $this->db->prepare('
        SELECT a.id id, a.slug slug, a.titre titre, a.article article, a.picture picture, a.categorie categorie_id, c.nom categorie, a.compteur compteur, a.date_publication date_publication
		FROM articles a
		INNER JOIN categories c ON a.categorie = c.id
        WHERE a.titre LIKE :keys1'.
        $in_contenu
        .'LIMIT 0, 20');
    
     
        
    $q->bindValue(':keys1', '%'.$keywords.'%', \PDO::PARAM_STR);
    
    
    $q->execute();
        
    //var_dump($keywords);
    //var_dump($q);  
        
    $results = $q->fetchAll();
    return $results;
    }
    
    
    /*
    * Mise à jour du compteur
    */
    public function majCompteur($id, $compteur) {
		$q = $this->db->query('UPDATE articles SET compteur = ' . ++$compteur . ' WHERE id = ' . $id);
	}
    
    /*
    * Insertion de la note dans la table
    */
    public function saveNote($id, $note, $ip) {
        $donnees = array (
            'id' => $id,
            'note' => $note,
            'ip' => $ip
        );
        $q = $this->db->prepare('INSERT INTO notes_articles (id_article, note, ip_vote) VALUES (:id, :note, :ip)');
        $q->execute($donnees);
        return "Merci pour votre aide !";
        
    }
    
    /*
    * Fonction pour déterminer si update ou nouvel article
    */
    public function save(array $donnees) {
        if ($donnees['article_id'] != '')
        {
            return $this->update($donnees);            
        }
        else
        {                       
            return $this->add($donnees);
        }
    }
    
    /*
    * Fonction pour ajouter un article
    */
    public function add($donnees) {
        $q = $this->db->prepare('INSERT INTO articles(id, categorie, titre, article, picture, compteur, slug, date_publication) VALUES(:article_id, :categorie, :titre, :article, :picture, :compteur, :slug, :date_publication)');
        
		$q->execute($donnees);
        
        return "Nouvel article bien enregistré !";
    }
    
    /*
    * Fonction pour mettre un jour un article
    */
    public function update($donnees)
    {
        $q = $this->db->prepare('UPDATE articles SET categorie = :categorie, titre = :titre, article = :article, picture = :picture, slug = :slug, date_publication = :date_publication WHERE id = :article_id');
        $q->execute($donnees);
        return "L'article a bien été modifié !";
    }
    
    /*
    * Fonction pour supprimer un article
    */
    public function supprimer($id)
    {
        $picture = $this->db->query('SELECT picture FROM articles WHERE id = ' . $id)->fetchColumn();        
        unlink('ressources/pics_articles/'.$picture);
        $this->db->exec('DELETE FROM articles WHERE id = ' . $id);
        return 'Article bien supprimé !';
    }
    
    
    public function pudate($donnees)
    {
        $q = $this->db->prepare('UPDATE articles SET slug = :slug WHERE id = :article_id');
        $q->execute($donnees);        
    }
    
    
    
    
    
	
    
    
    
    
    
    
    
    
    
    
    
    
    
	public function getArticlesTitlesByCat($cat)
	{
		$articles = array();
		$q = $this->db->query('SELECT id, titre FROM articles WHERE categorie = ' . $cat . '');
		while ($donnees = $q->fetch(\PDO::FETCH_ASSOC))
		{
			$articles[] = $donnees;
		}
		return $articles;
	}
	
	// A REVOIR //
	
		
	
	
	public function getTotalCommentaires($id) {
		$q = $this->db->query('SELECT COUNT(*) FROM commentaires WHERE idarticle = ' . $id);
		return $q->fetchColumn();
	}
	
	

}