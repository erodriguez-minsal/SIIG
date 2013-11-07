<?php

namespace MINSAL\IndicadoresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MINSAL\IndicadoresBundle\Validator as CustomAssert;

/**
 * MINSAL\IndicadoresBundle\Entity\ClasificacionNivel
 *
 * @ORM\Table(name="clasificacion_nivel")
 * @ORM\Entity
 */
class ClasificacionNivel
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $codigo
     *
     * @ORM\Column(name="codigo", type="string", length=15, nullable=false)
     * @CustomAssert\OnlyAlphanumeric()
     */
    private $codigo;

    /**
     * @var string $descripcion
     *
     * @ORM\Column(name="descripcion", type="string", length=50, nullable=false)
     * @CustomAssert\AlphanumericPlus()
     */
    private $descripcion;

    /**
     * @var string $comentario
     *
     * @ORM\Column(name="comentario", type="text", nullable=true)
     * @CustomAssert\AlphanumericPlus()
     */
    private $comentario;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set descripcion
     *
     * @param  string             $descripcion
     * @return ClasificacionNivel
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set comentario
     *
     * @param  string             $comentario
     * @return ClasificacionNivel
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;

        return $this;
    }

    /**
     * Get comentario
     *
     * @return string
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    public function __toString()
    {
        return $this->descripcion ? :'';
    }

    /**
     * Set codigo
     *
     * @param  string             $codigo
     * @return ClasificacionNivel
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set id
     *
     * @param  integer            $id
     * @return ClasificacionNivel
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}