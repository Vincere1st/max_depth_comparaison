<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

#[ORM\Entity]
class Level3 {
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    public ?int $id = null;

    #[ORM\Column]
    public string $name = "Niveau 3";

    #[ORM\OneToOne(targetEntity: Level4::class)]
    public ?Level4 $level4 = null;
}

