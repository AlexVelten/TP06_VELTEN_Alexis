<?php
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="User")
 * @ORM\Entity
 */
class User
{
    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=50)
     * @ORM\Id
     */
    private $login;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=256, nullable=true)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="firstName", type="string", length=50, nullable=true)
     */
    private $firstName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lastName", type="string", length=50, nullable=true)
     */
    private $lastName;



    /**
     * Get login.
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set login.
     *
     * @param string|null $nom
     *
     * @return User
     */
    public function setLogin($login = null)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get firstName.
     *
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set firstName.
     *
     * @param string|null $firstName
     *
     * @return User
     */
    public function setLastName($firstName = null)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get lastName.
     *
     * @return string|null
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set lastName.
     *
     * @param string|null $lastName
     *
     * @return User
     */
    public function setLastName($lastName = null)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string|null
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set password.
     *
     * @param string|null $password
     *
     * @return User
     */
    public function setPassword($password = null)
    {
        $this->password = $password;

        return $this;
    }


}
