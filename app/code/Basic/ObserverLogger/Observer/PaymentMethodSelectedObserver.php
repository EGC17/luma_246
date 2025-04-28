<?php
namespace Basic\ObserverLogger\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Basic\Logger\Logger\CustomLogger;

class PaymentMethodSelectedObserver implements ObserverInterface
{
    protected $customLogger;

    public function __construct(CustomLogger $customLogger)
    {
        $this->customLogger = $customLogger;
    }

    public function execute(Observer $observer)
    {
        $request = $observer->getEvent()->getRequest();
        $method = $request->getParam('payment', [])['method'] ?? 'N/A';

        $this->customLogger->info('[PAYMENT] Método de pago seleccionado: ' . $method);
    }
}
