<?php

namespace App\Migration;

/**
 * Template pattern
 */
abstract class Migrate
{
    /**
     * Method to be call.
     * @param   Json $data
     * @return  mixed
     */
    final public function execute($data)
    {
        return $this->migrate($data);
    }

    abstract protected function migrate($data);
}
