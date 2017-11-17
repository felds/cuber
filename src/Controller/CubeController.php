<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Cube;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cube")
 */
final class CubeController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction(EntityManagerInterface $em): Response
    {
        $entities = $em->getRepository(Cube::class)->findAll([], [ 'updatedAt' => 'DESC' ]);

        return $this->render('Cube/index.html.twig', [
            'entities' => $entities,
        ]);
    }

    /**
     * @Route("/new")
     */
    public function newAction(Request $request, EntityManagerInterface $em): Response
    {
        $entity = new Cube();
        $form = $this->createNewForm($entity);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirectToRoute('app_cube_index');
        }

        return $this->render('Cube/new.html.twig', [
            'entity' => $entity,
            'form' => $form->createView(),
        ]);
    }

    private function createNewForm(Cube $entity): FormInterface
    {
        $builder = $this->createFormBuilder($entity)
            ->add('name')
        ;

        return $builder->getForm();
    }
}