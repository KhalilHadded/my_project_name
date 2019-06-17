<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Document;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {


        return $this->render('@App/Default/uploader.html.twig');
    }

    /**
     *
     * @Route("/ajax/snippet/image/send", name="ajax_snippet_image_send", methods="GET|POST")
     */
    public function ajaxSnippetImageSendAction(Request $request)
    {
        $em = $this->container->get("doctrine.orm.default_entity_manager");

        $document = new Document();
        $media = $request->files->get('file');

        $document->setFile($media);
        $document->setPath($media->getPathName());
        $document->setName($media->getClientOriginalName());
        $document->upload();
        $em->persist($document);
        $em->flush();

        //infos sur le document envoyé
        //var_dump($request->files->get('file'));die;
        return new JsonResponse(array('success' => true));
    }
}
