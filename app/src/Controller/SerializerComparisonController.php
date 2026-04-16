<?php

namespace App\Controller;

use App\Entity\Level1;
use App\Repository\Level1Repository;
use App\Repository\Level2Repository;
use App\Repository\Level3Repository;
use App\Repository\Level4Repository;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface as JmsSerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class SerializerComparisonController extends AbstractController
{
    #[Route('/serializer/comparison', name: 'app_serializer_comparison')]
    public function index(
        Level1Repository $level1Repository,
        Level2Repository $level2Repository,
        SerializerInterface $serializer,
        JmsSerializerInterface $jmsSerializer
        ): Response {
        $level1 = $level1Repository->findOneBy(['id' => 1]);
        $level2 = $level2Repository->findOneBy(['id' => 1]);
        // retourner le level1 en json avec le serializer de symfony et le serializer de jms
        $symfonyJson = $serializer->serialize($level1, 'json', ['max_depth' => 1]);
    
        // activer le maxDepth de jms
        $jmsJson = $jmsSerializer->serialize($level1, 'json',  SerializationContext::create()->enableMaxDepthChecks());
        $jmsJsonLevel2 = $jmsSerializer->serialize($level2, 'json',  SerializationContext::create()->enableMaxDepthChecks());
        return $this->render('serializer_comparison/index.html.twig', [
            'symfonyJson' => $symfonyJson,
            'jmsJson' => $jmsJson,
            'jmsJsonLevel2' => $jmsJsonLevel2
        ]);
    }
}