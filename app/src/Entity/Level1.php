<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\MaxDepth;
use JMS\Serializer\Annotation as JMS;

#[ORM\Entity]
class Level1 {
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    public ?int $id = null;

    #[ORM\Column]
    public string $name = "Niveau 1";

    #[ORM\OneToOne(targetEntity: Level2::class)]
    #[JMS\MaxDepth(1)]
    #[MaxDepth(1)]
    public ?Level2 $level2 = null;
}
