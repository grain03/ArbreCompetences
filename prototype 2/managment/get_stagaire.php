<?php 

class Trainee
{
    // properties
    private $id;
    private $f_name;
    private $l_name;
    private $cne;



    // Getter method to retrieve

    public function getId()
    {
        return $this->id;
    }

    public function getFullName()
    {
        return $this->f_name . " ".  $this->l_name;
    }

    public function getCNE()
    {
        return $this->cne;
    }




    
    // Setter method to retrieve

    public function setId($id)
    {
        return $this->id = $id;
    }

    public function setFullName($f_name, $l_name)
    {
        $this->f_name = $f_name; 
        $this->l_name = $l_name; 
        return $this->f_name . " ".  $this->l_name;
    }


    public function setCNE($CNE)
    {
        return $this->cne = $CNE;
    }


}

