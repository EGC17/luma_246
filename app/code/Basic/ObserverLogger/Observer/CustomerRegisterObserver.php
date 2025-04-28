<?php
namespace Basic\ObserverLogger\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Basic\Logger\Logger\CustomLogger;

class CustomerRegisterObserver implements ObserverInterface
{
    protected $customLogger;

    public function __construct(CustomLogger $customLogger)
    {
        $this->customLogger = $customLogger;
    }

    public function execute(Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
        $this->customLogger->info('[REGISTER] Cliente registrado: ' . $customer->getEmail());
    }
}
