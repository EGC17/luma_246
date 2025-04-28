<?php

namespace Basic\ObserverLogger\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class CustomerLoginObserver implements ObserverInterface
{


    /**
     * @var \Basic\Logger\Logger\CustomLogger
     */
    private $customLogger;

    public function __construct(
        \Basic\Logger\Logger\CustomLogger $customLogger
    )
    {
        $this->customLogger = $customLogger;
        
    }

    public function execute(Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
        $this->customLogger->info('[LOGIN] Cliente inició sesión: ' . $customer->getEmail());
    }
}
