<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model
{
    protected $table = "user";
    protected $fillable = ["nombres","apellidos","correo","telefono","cedula"];
    public $timestamps = false;


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
     * @return User
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

    public function getArray()
    {
        return [
            "nombres" => $this->nombres,
            "apellidos" => $this->apellidos,
            "cedula" => $this->cedula,
            "correo" => $this->correo,
            "telefono" => $this->telefono
        ];
    }


    public function setId($id){
        $this->id = $id;
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


    public function rules()
    {
        return [
            'nombres'  => [
                ($this->getId() == null ? '' : 'required'),
                'string',
                'max:255'
            ],
            'apellidos'  => [
                ($this->getId() == null ? '' : 'required'),
                'string',
                'max:255'
            ],
            'correo' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:user' . ($this->getId() == null ? '' : ',id,'. $this->getId())
            ],
            'cedula' => [
                'required',
                'numeric',
                'digits:10',
                'unique:user' . ($this->getId() == null ? '' : ',id,'. $this->getId())
            ],
            'telefono' => [
                'required',
                'numeric',
                'digits:10',
            ]
        ];
    }

}
