<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quiz
 *
 * @ORM\Table(name="quiz")
 * @ORM\Entity
 */
class Quiz
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_quiz", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idQuiz;

    /**
     * @var int
     *
     * @ORM\Column(name="nom_quiz", type="integer", nullable=false)
     */
    private $nomQuiz;

    public function getIdQuiz(): ?int
    {
        return $this->idQuiz;
    }

    public function getNomQuiz(): ?int
    {
        return $this->nomQuiz;
    }

    public function setNomQuiz(int $nomQuiz): self
    {
        $this->nomQuiz = $nomQuiz;

        return $this;
    }


}
