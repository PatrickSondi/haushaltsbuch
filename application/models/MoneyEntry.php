<?php

class Models_MoneyEntry
{
    protected $id = NULL;

    protected $description = NULL;

    protected $value = NULL;

    protected $user_id = NULL;

    protected $category_id = NULL;

    protected $month_id = NULL;

    protected $payed = NULL;

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
            throw new Exception('Ungueltige MoneyEntry Eigenschaft.');
        }

        $this->$method($value);
    }

    public function __get($name)
    {
        $method = 'get' . $name;

        if(('mapper' == $name) || !method_exists($this, $method))
        {
            throw new Exception('Ungueltige MoneyEntry Eigenschaft.');
        }

        return $this->$method();
    }

    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
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

    public function setDescription($description)
    {
        $this->description = (string) $description;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
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

    public function setUser_id($user_id)
    {
        $this->user_id = (string) $user_id;
        return $this;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function setCategory_id($category_id)
    {
        $this->category_id = (string) $category_id;
        return $this;
    }

    public function getCategory_id()
    {
        return $this->category_id;
    }

    public function setMonth_id($month_id)
    {
        $this->month_id = (string) $month_id;
        return $this;
    }

    public function getMonth_id()
    {
        return $this->month_id;
    }

    public function setPayed($payed)
    {
        $this->payed = (string) $payed;
        return $this;
    }

    public function getPayed()
    {
        return $this->payed;
    }
}