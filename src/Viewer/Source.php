<?php
namespace Viewer;


class Source
{
    protected $source;

    public function __construct($source)
    {
        $this->source = $source;
    }

    public function viewSource()
    {
        if (!is_readable($this->source)) {
            return "<h1>File {$this->source} not found.</h1>";
        }

        ob_start();
        highlight_file($this->source);
        $output = ob_get_clean();
        return $output;
    }

    public function __toString()
    {
        return $this->viewSource();
    }
} 