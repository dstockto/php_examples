<?php
namespace Example\PHP55;

class Producer
{
    protected $consumer;
    protected $queue;

    public function fill()
    {
        $data = yield;

        echo 'Producer got message "' . $data . '"<br>';

        if ($this->getQueue()->getMaxSize() == 0) {
            echo 'Queue cannot hold anything else, exiting.';
            return;
        }

        while (!$this->getQueue()->isFull()) {
            $value = rand(1, 10000);
            echo "Enqueuing $value<br>";
            $this->getQueue()->enqueue($value);
        }

        // Yield to consumer
        $this->getConsumer()->consume()->send('Your turn to eat values.');
    }

    /**
     * @param mixed $consumer
     */
    public function setConsumer($consumer)
    {
        $this->consumer = $consumer;
    }

    /**
     * @return mixed
     */
    public function getConsumer()
    {
        return $this->consumer;
    }

    /**
     * @param mixed $queue
     */
    public function setQueue($queue)
    {
        $this->queue = $queue;
    }
    /**
     * @return mixed
     */
    public function getQueue()
    {
        return $this->queue;
    }
}

class Consumer
{
    protected $producer;
    protected $queue;

    /**
     * @param mixed $queue
     */
    public function setQueue($queue)
    {
        $this->queue = $queue;
    }

    /**
     * @return mixed
     */
    public function getQueue()
    {
        return $this->queue;
    }

    /**
     * @param mixed $producer
     */
    public function setProducer($producer)
    {
        $this->producer = $producer;
    }

    /**
     * @return mixed
     */
    public function getProducer()
    {
        return $this->producer;
    }

    public function consume()
    {
        $data = yield;

        echo 'Consumer got message "' . $data . '"<br>';

        while (!$this->getQueue()->isEmpty()) {
            $value = $this->getQueue()->dequeue();
            echo 'Got value ' . $value . ' from queue.<br>';
        }

        // Yield to producer
        $this->getProducer()->fill()->send('Your turn to make more values.');
    }
}


class ShrinkingQueue extends \SplQueue
{
    protected $maxSize;

    /**
     * @return mixed
     */
    public function getMaxSize()
    {
        return $this->maxSize;
    }

    /**
     * @return int
     */
    public function getNumItems()
    {
        return $this->numItems;
    }
    protected $numItems;

    public function __construct($maxSize)
    {
        $this->maxSize = $maxSize;
        $this->numItems = 0;
    }

    public function isEmpty()
    {
        return $this->numItems == 0;
    }

    public function isFull()
    {
        return $this->numItems == $this->maxSize;
    }

    public function enqueue($value)
    {
        if (!$this->isFull()) {
            parent::enqueue($value);
            $this->numItems++;
        }
    }

    public function dequeue()
    {
        $value = parent::dequeue();
        $this->numItems--;

        if ($this->numItems <= 0) {
            $this->maxSize--;
            $this->numItems = 0;
//            echo 'Queue shrank.<br>';
        }

        return $value;
    }
}

$queue = new ShrinkingQueue(3);
$producer = new Producer();
$producer->setQueue($queue);

$consumer = new Consumer();
$consumer->setQueue($queue);
$consumer->setProducer($producer);
$producer->setConsumer($consumer);

$producer->fill()->send('GO!');
