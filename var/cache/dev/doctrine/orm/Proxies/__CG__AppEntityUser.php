<?php

namespace Proxies\__CG__\App\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class User extends \App\Entity\User implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\User' . "\0" . 'id', '' . "\0" . 'App\\Entity\\User' . "\0" . 'email', '' . "\0" . 'App\\Entity\\User' . "\0" . 'roles', '' . "\0" . 'App\\Entity\\User' . "\0" . 'password', '' . "\0" . 'App\\Entity\\User' . "\0" . 'nombreConnexion', '' . "\0" . 'App\\Entity\\User' . "\0" . 'status', '' . "\0" . 'App\\Entity\\User' . "\0" . 'imageFile', '' . "\0" . 'App\\Entity\\User' . "\0" . 'imageName', '' . "\0" . 'App\\Entity\\User' . "\0" . 'updatedAt', '' . "\0" . 'App\\Entity\\User' . "\0" . 'partenaire', '' . "\0" . 'App\\Entity\\User' . "\0" . 'versements', '' . "\0" . 'App\\Entity\\User' . "\0" . 'compte', '' . "\0" . 'App\\Entity\\User' . "\0" . 'nomComplet', '' . "\0" . 'App\\Entity\\User' . "\0" . 'cni', '' . "\0" . 'App\\Entity\\User' . "\0" . 'adresse', '' . "\0" . 'App\\Entity\\User' . "\0" . 'telephone', '' . "\0" . 'App\\Entity\\User' . "\0" . 'role', '' . "\0" . 'App\\Entity\\User' . "\0" . 'transactions', '' . "\0" . 'App\\Entity\\User' . "\0" . 'user', '' . "\0" . 'App\\Entity\\User' . "\0" . 'users', '' . "\0" . 'App\\Entity\\User' . "\0" . 'transactionss'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\User' . "\0" . 'id', '' . "\0" . 'App\\Entity\\User' . "\0" . 'email', '' . "\0" . 'App\\Entity\\User' . "\0" . 'roles', '' . "\0" . 'App\\Entity\\User' . "\0" . 'password', '' . "\0" . 'App\\Entity\\User' . "\0" . 'nombreConnexion', '' . "\0" . 'App\\Entity\\User' . "\0" . 'status', '' . "\0" . 'App\\Entity\\User' . "\0" . 'imageFile', '' . "\0" . 'App\\Entity\\User' . "\0" . 'imageName', '' . "\0" . 'App\\Entity\\User' . "\0" . 'updatedAt', '' . "\0" . 'App\\Entity\\User' . "\0" . 'partenaire', '' . "\0" . 'App\\Entity\\User' . "\0" . 'versements', '' . "\0" . 'App\\Entity\\User' . "\0" . 'compte', '' . "\0" . 'App\\Entity\\User' . "\0" . 'nomComplet', '' . "\0" . 'App\\Entity\\User' . "\0" . 'cni', '' . "\0" . 'App\\Entity\\User' . "\0" . 'adresse', '' . "\0" . 'App\\Entity\\User' . "\0" . 'telephone', '' . "\0" . 'App\\Entity\\User' . "\0" . 'role', '' . "\0" . 'App\\Entity\\User' . "\0" . 'transactions', '' . "\0" . 'App\\Entity\\User' . "\0" . 'user', '' . "\0" . 'App\\Entity\\User' . "\0" . 'users', '' . "\0" . 'App\\Entity\\User' . "\0" . 'transactionss'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (User $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId(): ?int
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', []);

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail(string $email): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', [$email]);

        return parent::setEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function getUsername(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsername', []);

        return parent::getUsername();
    }

    /**
     * {@inheritDoc}
     */
    public function getRoles(): array
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRoles', []);

        return parent::getRoles();
    }

    /**
     * {@inheritDoc}
     */
    public function setRoles(array $roles): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRoles', [$roles]);

        return parent::setRoles($roles);
    }

    /**
     * {@inheritDoc}
     */
    public function getPassword(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPassword', []);

        return parent::getPassword();
    }

    /**
     * {@inheritDoc}
     */
    public function setPassword(string $password): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPassword', [$password]);

        return parent::setPassword($password);
    }

    /**
     * {@inheritDoc}
     */
    public function getSalt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSalt', []);

        return parent::getSalt();
    }

    /**
     * {@inheritDoc}
     */
    public function eraseCredentials()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'eraseCredentials', []);

        return parent::eraseCredentials();
    }

    /**
     * {@inheritDoc}
     */
    public function getNombreConnexion(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNombreConnexion', []);

        return parent::getNombreConnexion();
    }

    /**
     * {@inheritDoc}
     */
    public function setNombreConnexion(int $nombreConnexion): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNombreConnexion', [$nombreConnexion]);

        return parent::setNombreConnexion($nombreConnexion);
    }

    /**
     * {@inheritDoc}
     */
    public function getStatus(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatus', []);

        return parent::getStatus();
    }

    /**
     * {@inheritDoc}
     */
    public function setStatus(string $status): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatus', [$status]);

        return parent::setStatus($status);
    }

    /**
     * {@inheritDoc}
     */
    public function setImageFile(\Symfony\Component\HttpFoundation\File\File $imageFile = NULL): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setImageFile', [$imageFile]);

        parent::setImageFile($imageFile);
    }

    /**
     * {@inheritDoc}
     */
    public function getImageFile(): ?\Symfony\Component\HttpFoundation\File\File
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImageFile', []);

        return parent::getImageFile();
    }

    /**
     * {@inheritDoc}
     */
    public function setImageName(?string $imageName): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setImageName', [$imageName]);

        parent::setImageName($imageName);
    }

    /**
     * {@inheritDoc}
     */
    public function getImageName(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImageName', []);

        return parent::getImageName();
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedAt', []);

        return parent::getUpdatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedAt', [$updatedAt]);

        return parent::setUpdatedAt($updatedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getPartenaire(): ?\App\Entity\Partenaire
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPartenaire', []);

        return parent::getPartenaire();
    }

    /**
     * {@inheritDoc}
     */
    public function setPartenaire(?\App\Entity\Partenaire $partenaire): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPartenaire', [$partenaire]);

        return parent::setPartenaire($partenaire);
    }

    /**
     * {@inheritDoc}
     */
    public function getVersements(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVersements', []);

        return parent::getVersements();
    }

    /**
     * {@inheritDoc}
     */
    public function addVersement(\App\Entity\Versement $versement): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addVersement', [$versement]);

        return parent::addVersement($versement);
    }

    /**
     * {@inheritDoc}
     */
    public function removeVersement(\App\Entity\Versement $versement): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeVersement', [$versement]);

        return parent::removeVersement($versement);
    }

    /**
     * {@inheritDoc}
     */
    public function getCompte()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCompte', []);

        return parent::getCompte();
    }

    /**
     * {@inheritDoc}
     */
    public function setCompte($compte)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCompte', [$compte]);

        return parent::setCompte($compte);
    }

    /**
     * {@inheritDoc}
     */
    public function getNomComplet(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNomComplet', []);

        return parent::getNomComplet();
    }

    /**
     * {@inheritDoc}
     */
    public function setNomComplet(string $nomComplet): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNomComplet', [$nomComplet]);

        return parent::setNomComplet($nomComplet);
    }

    /**
     * {@inheritDoc}
     */
    public function getCni(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCni', []);

        return parent::getCni();
    }

    /**
     * {@inheritDoc}
     */
    public function setCni(int $cni): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCni', [$cni]);

        return parent::setCni($cni);
    }

    /**
     * {@inheritDoc}
     */
    public function getAdresse(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAdresse', []);

        return parent::getAdresse();
    }

    /**
     * {@inheritDoc}
     */
    public function setAdresse(string $adresse): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAdresse', [$adresse]);

        return parent::setAdresse($adresse);
    }

    /**
     * {@inheritDoc}
     */
    public function getTelephone(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTelephone', []);

        return parent::getTelephone();
    }

    /**
     * {@inheritDoc}
     */
    public function setTelephone(int $telephone): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTelephone', [$telephone]);

        return parent::setTelephone($telephone);
    }

    /**
     * {@inheritDoc}
     */
    public function getRole(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRole', []);

        return parent::getRole();
    }

    /**
     * {@inheritDoc}
     */
    public function setRole(?int $role): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRole', [$role]);

        return parent::setRole($role);
    }

    /**
     * {@inheritDoc}
     */
    public function getTransactions(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTransactions', []);

        return parent::getTransactions();
    }

    /**
     * {@inheritDoc}
     */
    public function addTransaction(\App\Entity\Transaction $transaction): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addTransaction', [$transaction]);

        return parent::addTransaction($transaction);
    }

    /**
     * {@inheritDoc}
     */
    public function removeTransaction(\App\Entity\Transaction $transaction): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeTransaction', [$transaction]);

        return parent::removeTransaction($transaction);
    }

    /**
     * {@inheritDoc}
     */
    public function getUser(): ?\App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUser', []);

        return parent::getUser();
    }

    /**
     * {@inheritDoc}
     */
    public function setUser(?\App\Entity\User $user): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUser', [$user]);

        return parent::setUser($user);
    }

    /**
     * {@inheritDoc}
     */
    public function getUsers(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsers', []);

        return parent::getUsers();
    }

    /**
     * {@inheritDoc}
     */
    public function addUser(\App\Entity\User $user): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addUser', [$user]);

        return parent::addUser($user);
    }

    /**
     * {@inheritDoc}
     */
    public function removeUser(\App\Entity\User $user): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeUser', [$user]);

        return parent::removeUser($user);
    }

    /**
     * {@inheritDoc}
     */
    public function getTransactionss(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTransactionss', []);

        return parent::getTransactionss();
    }

    /**
     * {@inheritDoc}
     */
    public function addTransactionss(\App\Entity\Transaction $transactionss): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addTransactionss', [$transactionss]);

        return parent::addTransactionss($transactionss);
    }

    /**
     * {@inheritDoc}
     */
    public function removeTransactionss(\App\Entity\Transaction $transactionss): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeTransactionss', [$transactionss]);

        return parent::removeTransactionss($transactionss);
    }

}