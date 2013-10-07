<?php

class CoHost
{
    protected $id;

    public function getId()
    {
        if (is_null($this->id)) {
            $set = $this->setId();
            $set->send(yield identifier());
        }

        yield $this->id;
    }

    public function setId()
    {
        if (is_null($this->id)) {
            $this->id = yield;
        }
    }
}

function identifier()
{
    static $i = 0;
    return $i++;
}


$host = new CoHost();


$host->setId()->send(54);

$get = $host->getId();

foreach ($get as $val) {
    echo $val;
}
