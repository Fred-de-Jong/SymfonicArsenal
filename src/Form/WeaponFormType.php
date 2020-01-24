<?php

namespace App\Form;

use App\Entity\Weapon;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;


class WeaponFormType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add("name", TextType::class, array("attr" => array("class" => "form-control")))
        ->add("body", TextareaType::class, array("attr" => array("class" => "form-control")));
    }
}