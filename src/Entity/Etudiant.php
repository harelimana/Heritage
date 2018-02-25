<?php
/**
 * Created by PhpStorm.
 * User: axxa
 * Date: 23.02.18
 * Time: 16:04
 */

namespace Axxa\Entity;
use \DateTime;

class Etudiant extends Personne
{
    private $coursSuivis = [];
    private $dateInscription;
    private $niveau;
    
    /**
     * @return array
     */
    public function getCoursSuivis()
    {
        return $this->coursSuivis;
    }
    
    /**
     * @param array $coursSuivis
     */
    public function setCoursSuivis($coursSuivis)
    {
        $this->coursSuivis = $coursSuivis;
    }
    
    /**
     * @return mixed
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }
    
    /**
     * @param mixed $dateInscription
     */
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;
    }
    
    /**
     * @return mixed
     */
    public function getNiveau()
    {
        return $this->niveau;
    }
    
    /**
     * @param mixed $niveau
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
    }
    
    public function toString(){
       return printf('%s%s%s%s%s%s%s%s',
            $this->getNom(),
            $this->getPrenom(),
            $this->getRue(),
            $this->getCodepostal(),
            $this->getPays(),
            $this->getNiveau(),
            $this->getCoursSuivis(),
            $this->getDateInscription());
    }
    
}