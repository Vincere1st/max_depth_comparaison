<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\MaxDepth;

#[ORM\Entity]
class Level2 {
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    public ?int $id = null;

    #[ORM\Column]
    public string $name = "Niveau 2";

    #[ORM\OneToOne(targetEntity: Level3::class)]
    public ?Level3 $level3 = null;
}
