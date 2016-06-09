<?php

class Models_CurrentDebts
{
    protected $id = NULL;

    protected $user_id = NULL;

    protected $value = NULL;

    public function __construct(array $options = null)
    {
        if(is_array($options))
        {
            $this->setOptions($options);
        }
    }

    public function __set($name, $value)
    {
        $method = 'set' . $name;

        if(('mapper' == $name) || !method_exists($this, $method))
        {
            throw new Exception('Ungueltige CurrentDebts Eigenschaft.');
        }

        $this->$method($value);
    }

    public function __get($name)
    {
        $method = 'get' . $name;

        if(('mapper' == $name) || !method_exists($this, $method))
        {
            throw new Exception('Ungueltige CurrentDebts Eigenschaft.');
        }

        return $this->$method();
    }

    public function setId($id)
    {
        $this->id = (int) $id;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setUser_id($user_id)
    {
        $this->user_id = (string) $user_id;
        return $this;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function setValue($value)
    {
        $this->value = (string) $value;
        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }
}