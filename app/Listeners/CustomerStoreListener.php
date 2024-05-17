<?php

namespace App\Listeners;

use App\Events\CustomerStoreEvent;
use App\Models\Customer;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerStoreListener implements ShouldQueue
{
    /**
     * @param CustomerStoreEvent $event
     * @return void
     */
    public function handle(CustomerStoreEvent $event): void
    {
        try {
            $customerData = $event->data;

            $newCustomer = Customer::createCustomer($customerData);

            info('NEW CUSTOMER STORED', ['ID' => $newCustomer->id ]);
        } catch(\Exception $e) {
            info('FAILED TO REGISTER THE CUSTOMER', [ $e->getMessage() ]);
        }
    }
}
