<?php

namespace App\Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity("correo", message="Correo: ya en uso")
 * @UniqueEntity("cedula", message="cedula: ya en uso")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @var string
     * @ORM\GeneratedValue()
     * @ORM\Column(type="string", length=20, nullable=false)
     * @Assert\NotNull(message="nombres: no pueden estar vacios")
     * @Assert\NotBlank(message="nombres: no pueden estar vacios")
     */
    private $nombres;
    /**
     * @var string
     * @ORM\GeneratedValue()
     * @ORM\Column(type="string", length=20, nullable=false)
     * @Assert\NotNull(message="apellidos: no pueden estar vacios")
     * @Assert\NotBlank(message="apellidos: no pueden estar vacios")
     */
    private $apellidos;
    /**
     * @var string
     * @ORM\GeneratedValue()
     * @Assert\Type(type="double",message="cedula: debe ser de tipo numerico")
     * @ORM\Column(type="string", length=10, unique=true, nullable=false)
     * @Assert\NotNull(message="cedula: no puede estar vacios")
     * @Assert\Positive(message="Cedula: debe ser positivo")
     *
     * @Assert\Length(max="10", min="10", maxMessage="cedula: debe tener maximo 10 digitos", minMessage="cedula: debe tener minino 10 digitos",exactMessage="cedula: debe tener 10 digitos")
     */
    private $cedula;
    /**
     * @var string
     * @ORM\GeneratedValue()
     * @ORM\Column(type="string", unique=true, length=50, nullable=false)
     * @Assert\NotNull(message="correo: no pueden estar vacios")
     * @Assert\Email(message="correo: debe tener formato ejemplo@ejemplo.com")
     *
     */
    private $correo;
    /**
     * @var string
     * @ORM\GeneratedValue()
     * @ORM\Column(type="string", length=10, nullable=false)
     * @Assert\Type(type="double",message="telefono: debe ser de tipo numerico")
     * @Assert\NotNull(message="telefono: no pueden estar vacios")
     * @Assert\Positive(message="telefono: debe ser positivo")
     * @Assert\Length(max="10", min="10", maxMessage="telefono: debe tener maximo 10 digitos", minMessage="telefono: debe tener minino 10 digitos",exactMessage="telefono : debe tener 10 digitos")
     */
    private $telefono;

    /**
     * User constructor.
     * @param $nombres
     * @param $apellidos
     * @param $cedula
     * @param $correo
     * @param $telefono
     * @return User|bool
     */
    public function __invoke($nombres, $apellidos, $cedula, $correo, $telefono)
    {
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->cedula = $cedula;
        $this->correo = $correo;
        $this->telefono = $telefono;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * @param mixed $nombres
     */
    public function setNombres($nombres): void
    {
        $this->nombres = $nombres;
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     */
    public function setApellidos($apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return mixed
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * @param mixed $cedula
     */
    public function setCedula($cedula): void
    {
        $this->cedula = $cedula;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param mixed $correo
     */
    public function setCorreo($correo): void
    {
        $this->correo = $correo;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono): void
    {
        $this->telefono = $telefono;
    }

    public function validator(ValidatorInterface $validator)
    {
        $error = $validator->validate($this);
        $data = [];
        if(isset(explode("\n",(string)$error)[1])){
            $data[0] = trim(explode("(",explode("\n",(string)$error)[1])[0]);
        }
        if(isset(explode("\n",(string)$error)[3])){
            $data[1] = trim(explode("(",explode("\n",(string)$error)[3])[0]);
        }
        if(isset(explode("\n",(string)$error)[5])){
            $data[2] = trim(explode("(",explode("\n",(string)$error)[5])[0]);
        }
        if(isset(explode("\n",(string)$error)[7])){
            $data[3] = trim(explode("(",explode("\n",(string)$error)[7])[0]);
        }
        if(isset(explode("\n",(string)$error)[9])){
            $data[4] = trim(explode("(",explode("\n",(string)$error)[9])[0]);
        }
        if(isset(explode("\n",(string)$error)[11])){
            $data[5] = trim(explode("(",explode("\n",(string)$error)[11])[0]);
        }
        if(isset(explode("\n",(string)$error)[13])){
            $data[6] = trim(explode("(",explode("\n",(string)$error)[13])[0]);
        }
        if(isset(explode("\n",(string)$error)[15])){
            $data[7] = trim(explode("(",explode("\n",(string)$error)[15])[0]);
        }
        return $data;
    }


}
