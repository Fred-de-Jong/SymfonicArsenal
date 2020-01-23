<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WeaponRepository")
 */
class Weapon
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", length=80)
     */

    private $name;


    /**
     * @ORM\Column(type="text")
     */
    private $body;


    //Getters & Setters
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }
    public function setName($name) {
       $this->name = $name;
    }

    public function getBody() {
        return $this->body;
    }
    public function setBody($body) {
       $this->body = $body;
    }
}
