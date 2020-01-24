<?php
 namespace App\Controller;

 use App\Entity\Weapon;
 use App\Form\WeaponFormType;

 use Symfony\Component\HttpFoundation\Response;
 use Symfony\Component\HttpFoundation\Request;
 use Symfony\Component\Routing\Annotation\Route;
 use Sensio\Bundle\FrameworkExrtaBundle\Configuration\Method;
 use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
 use Symfony\Component\Form\Extension\Core\Type\TextType;
 use Symfony\Component\Form\Extension\Core\Type\TextareaType;
 use Symfony\Component\Form\Extension\Core\Type\SubmitType;



 class WeaponController extends AbstractController {
    /** 
     * @Route("/", name="weapon_list", methods={"GET"})
     */
     public function index() {

         $weapons= $this->getDoctrine()->getRepository(Weapon::class)->findAll();

         return $this->render('weapons/index.html.twig', array ("weapons" => $weapons));
     }

    /**
     * @Route("/weapon/new", name="new_weapon", methods={"GET", "POST"})
     */  

     public function new(Request $request) {
         $weapon = new Weapon();

         $form = $this->createForm(WeaponFormType::class, $weapon)->add("save", SubmitType::class, array("label" => "Create", "attr" => array("class" => "btn btn-primary mt-3")));


        $form->handleRequest($request);

        if($form->isSubmitted()&& $form->isValid()) {
            $weapon = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($weapon);
            $entityManager->flush();

            return $this->redirectToRoute("weapon_list");
        }

     return $this->render("weapons/new.html.twig", array("form" => $form->createView()));
         
     }

     /**
     * @Route("/weapon/edit/{id}", name="edit_weapon", methods={"GET", "POST"})
     */  

    public function edit(Request $request, $id) {
        $weapon = new Weapon();
        $weapon = $this->getDoctrine()->getRepository(Weapon::class)->find($id);

        $form = $this->createForm(WeaponFormType::class, $weapon);

       $form->handleRequest($request);

       if($form->isSubmitted()&& $form->isValid()) {

           $entityManager = $this->getDoctrine()->getManager();
           $entityManager->flush();

           return $this->redirectToRoute("weapon_list");
       }

    return $this->render("weapons/edit.html.twig", array("form" => $form->createView()));
        
    }


     
     /**
      * @Route("/weapon/{id}", name="weapon_show")
      */
      public function show($id) {
        $weapon = $this->getDoctrine()->getRepository(Weapon::class)->find($id);

        return $this->render("weapons/show.html.twig", array ("weapon" => $weapon));
    }

    /**
     * @Route("/weapon/delete/{id}", methods={"DELETE"})
     */

     public function delete(Request $request, $id) {
        $weapon = $this->getDoctrine()->getRepository(Weapon::class)->find($id);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($weapon);
        $entityManager->flush();

            $response = new Response();
            $response->send();
     }
 }