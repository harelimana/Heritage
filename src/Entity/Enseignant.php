<?php
/**
 * Created by PhpStorm.
 * User: axxa
 * Date: 23.02.18
 * Time: 16:06
 */

namespace Axxa\Entity;


class Enseignant extends Personne
{
    private $coursDonnes = [];
    private $dateEntree;
    private $anciennete;
    
    /**
     * @return array
     */
    public function getCoursDonnes()
    {
        return $this->coursDonnes;
    }
    
    /**
     * @param array $coursDonnes
     */
    public function setCoursDonnes($coursDonnes)
    {
        $this->coursDonnes = $coursDonnes;
    }
    
    /**
     * @return mixed
     */
    public function getDateEntree()
    {
        return $this->dateEntree;
    }
    
    /**
     * @param mixed $dateEntree
     */
    public function setDateEntree($dateEntree)
    {
        $this->dateEntree = $dateEntree;
    }
    
    /**
     * @return mixed
     */
    public function getAnciennete()
    {
        return $this->anciennete;
    }
    
    /**
     * @param mixed $anciennete
     */
    public function setAnciennete($anciennete)
    {
        $this->anciennete = $anciennete;
    }
    
    public function toString()
    {
        return printf('%s%s%s%s%s%s%s%s',
            parent::getNom(),
            parent::getPrenom(),
            parent::getRue(),
            parent::getCodepostal(),
            parent::getPays(),
            $this->getAnciennete(),
            $this->getCoursDonnes(),
            $this->getDateEntree());
    }
}