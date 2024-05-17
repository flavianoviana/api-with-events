<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;

class CustomerStoreEvent
{
    use Dispatchable;

    public array $data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }
}
