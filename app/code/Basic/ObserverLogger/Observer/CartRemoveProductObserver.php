<?php
namespace Basic\ObserverLogger\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Basic\Logger\Logger\CustomLogger;

class CartRemoveProductObserver implements ObserverInterface
{
    protected $customLogger;

    public function __construct(CustomLogger $customLogger)
    {
        $this->customLogger = $customLogger;
    }

    public function execute(Observer $observer)
    {
        $quoteItem = $observer->getEvent()->getQuoteItem();
        $product = $quoteItem->getProduct();

        $this->customLogger->info(sprintf('[CART] Producto eliminado: %s (SKU: %s)', $product->getName(), $product->getSku()));
    }
}
