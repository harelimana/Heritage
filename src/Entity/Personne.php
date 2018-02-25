<?php
namespace Axxa\Entity;
/**
 * Created by PhpStorm.
 * User: axxa
 * Date: 19.02.18
 * Time: 21:15
 */

class Personne
{
    protected $id;
    protected $nom;
    protected $prenom;
    protected $rue;
    protected $codePostal;
    protected $pays;
    protected $societe;
    protected $type;
    
    function __construct($personne = null) {
        if (!$personne == null) {
            $this->hydrate($personne);
        }
        $this->type = strtolower(get_class($this));
    }
    
    public function hydrate($personne) {
        foreach ($personne as $key => $value) {
            $methodName = 'set' . ucfirst($key);
            if (method_exists($this, $methodName)) {
                $this->$methodName($value);
            }
        }
    }
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }
    
    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    
    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }
    
    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    
    /**
     * @return mixed
     */
    public function getRue()
    {
        return $this->rue;
    }
    
    /**
     * @param mixed $rue
     */
    public function setRue($rue)
    {
        $this->rue = $rue;
    }
    
    /**
     * @return mixed
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }
    
    /**
     * @param mixed $codePostal
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
    }
    
    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }
    
    /**
     * @param mixed $pays
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    }
    
    /**
     * @return \stdClass
     */
    
    public function getType(){
        return $this->type;
    }
    
    /**
     * @return mixed
     */
    public function getSociete()
    {
        return $this->societe;
    }
    
    /**
     * @param mixed $societe
     */
    public function setSociete($societe)
    {
        $this->societe = $societe;
    }
    
    public function toString(){
        return printf('%s%s%s%s%s%s',
            $this->getNom(),
            $this->getPrenom(),
            $this->getRue(),
            $this->getCodepostal(),
            $this->getPays(),
            $this->getSociete());
    }
    
}