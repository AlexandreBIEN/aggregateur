<?php 

class User {

    // ATTRIBUTS

    /**
     * Identifiant de l'utilisateur
     *
     * @var string
     */
    protected $login;

    /**
     * Centres d'intérêts de l'utilisateur
     *
     * @var string
     */
    protected $interests;


    // CONSTRUCTEUR

    public function __construct(string $login, string $interests)
    {
        $this->login = $login;
        $this->interests = $interests;
    }


    // METHODS

    // SETTER

    /**
     * Défini l'identifiant de l'utilisateur
     *
     * @param string $login
     * @return self
     */
    public function setLogin(string $login):self
    {
        $this->login = $login;
        return $this;
    }

    /**
     * Défini les centres d'intérêts de l'utilisateur
     *
     * @param string $interests
     * @return self
     */
    public function setInterests(string $interests):self
    {
        $this->interests = $interests;
        return $this;
    }


    // GETTER

    /**
     * Récupère l'identifiant de l'utilisateur
     *
     * @return string
     */
    public function getLogin():string
    {
        return $this->login;
    }

    /**
     * Récupère les centres d'intérêts de l'utilisateur
     *
     * @return string
     */
    public function getInterests():string
    {
        return $this->interests;
    }
}