<?php
namespace Basic\ObserverLogger\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Basic\Logger\Logger\CustomLogger;

class CartAddProductObserver implements ObserverInterface
{
    protected $customLogger;

    public function __construct(CustomLogger $customLogger)
    {
        $this->customLogger = $customLogger;
    }

    public function execute(Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();
        $quoteItem = $observer->getEvent()->getQuoteItem();

        $message = sprintf('[CART] Producto agregado: %s (SKU: %s, Cantidad: %d)',
            $product->getName(),
            $product->getSku(),
            $quoteItem->getQty()
        );

        $this->customLogger->info($message);
    }
}
