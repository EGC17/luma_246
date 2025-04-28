<?php
namespace Basic\ObserverLogger\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Basic\Logger\Logger\CustomLogger;

class OrderPlaceObserver implements ObserverInterface
{
    protected $customLogger;

    public function __construct(CustomLogger $customLogger)
    {
        $this->customLogger = $customLogger;
    }

    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $this->customLogger->info('[ORDER] Orden creada: #' . $order->getIncrementId() . ' (' . $order->getCustomerEmail() . ')');
    }
}
