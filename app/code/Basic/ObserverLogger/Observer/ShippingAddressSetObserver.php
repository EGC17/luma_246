<?php
namespace Basic\ObserverLogger\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Basic\Logger\Logger\CustomLogger;

class ShippingAddressSetObserver implements ObserverInterface
{
    protected $customLogger;

    public function __construct(CustomLogger $customLogger)
    {
        $this->customLogger = $customLogger;
    }

    public function execute(Observer $observer)
    {
        $quote = $observer->getEvent()->getQuote();
        $shippingAddress = $quote->getShippingAddress();

        if ($shippingAddress) {
            $street = $shippingAddress->getStreet();
            $formattedStreet = implode(' ', $street);

            // Verifica si la calle y otros campos están vacíos
            if (!empty($formattedStreet) && !empty($shippingAddress->getCity()) && !empty($shippingAddress->getRegion())) {
                $shippingDetails = $formattedStreet . ', ' . $shippingAddress->getCity() . ', ' .
                    $shippingAddress->getRegion() . ', ' . $shippingAddress->getPostcode() . ' - ' . 
                    $shippingAddress->getCountryId();

                $this->customLogger->info('[SHIPPING] Dirección de envío configurada: ' . $shippingDetails);
            } else {
                $this->customLogger->info('[SHIPPING] Dirección de envío incompleta o con plantillas no resueltas.');
            }
        }
    }
}
