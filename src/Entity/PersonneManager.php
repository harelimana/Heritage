<?php
/**
 * Created by PhpStorm.
 * User: axxa
 * Date: 19.02.18
 * Time: 21:27
 */

namespace Axxa\Entity;
namespace Factory\Faker;

use Axxa\Entity\Etudiant;
use Axxa\Entity\Enseignant;
use \Axxa\Entity\Personne;


use \PDO;

class PersonneManager
{
    protected $connex;
    
    function __construct(\PDO $connex)
    {
        $this->connexion = $connex;
    }
    
    public function getConnexion()
    {
        return $this->connexion;
    }
    
    /**
     * @param $personne
     * @return mixed
     */
    public function createPersonne(Personne $personne)
    {
     $stmt = $this->connexion->prepare(
         'INSERT INTO personne
                SET nom = :nom,
                prenom = :prenom,
                adresse = :adresse,
                codepostal = :codepostal,
                pays = :pays,
                type = :type,
                societe = :societe');
        $stmt->bindValue(':nom', $personne->getNom());
        $stmt->bindValue(':prenom', $personne->getPrenom());
        $stmt->bindValue(':adresse', $personne->getRue());
        $stmt->bindValue(':codepostal', $personne->getCodePostal());
        $stmt->bindValue(':pays', $personne->getPays());
        $stmt->bindValue(':type', $personne->getType());
        
        $stmt->bindValue(':societe', $personne->getSociete());
        
        $stmt->execute();
       return;
    }
    
    public function updatePersonne(Personne $personne)
    {
        
        $stmt = $this->connexion->prepare("UPDATE personne
                SET nom = :nom,
                prenom = :prenom,
                adresse = :adresse,
                codepostal = :codepostal,
                pays = :pays,
                societe = :societe");
        $stmt->bindValue(':nom', $personne->getNom());
        $stmt->bindValue(':prenom', $personne->getPrenom());
        $stmt->bindValue(':adresse', $personne->getRue());
        $stmt->bindValue(':codepostal', $personne->getCodePostal());
        $stmt->bindValue(':pays', $personne->getPays());
        $stmt->bindValue(':societe', $personne->getSociete());
        return $stmt->execute();
    }
    
    /*
     * @param $id
     */
    
    /**
     * @param null $id
     * @return array|mixed|null
     */
    public function readPersonne($id = null) {
        if ($id != null) {
            $stmt = $this->connexion->prepare('SELECT * FROM personne WHERE id = :id');
            $stmt->bindValue(':id', $personne->getId(), PDO::PARAM_INT);
            $stmt->bindValue(':type', $personne->getType(), PDO::PARAM_STR);
           
            switch($personne->getType())
            {
                case 'etudiant': $stmt->fetchObject(Etudiant::class); break;
                case 'enseignant': $stmt->fetchAll(Enseignant::class); break;
                default: break;
            }
           return $stmt->execute();
           
        } else {
            // maybe use here a "Try and Catch" for eventual errors; in the meanwhile, give back all the records
            $stmt = $this->connexion->query('SELECT * FROM personne');
        }
      
    }
    
    public function deletePersonne($id = null) {
        if ($id != null) {
            $stmt = $this->connexion->prepare('DELETE * FROM personne WHERE id = :id');
            $stmt->bindValue(':id', $personne->getId(), PDO::PARAM_INT);
            return $stmt->execute();
        }
    }
}