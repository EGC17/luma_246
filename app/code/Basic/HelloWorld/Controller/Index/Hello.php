<?php

namespace Basic\HelloWorld\Controller\Index;


use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;

/**
 * HttpGetActionInterface indica que esta acción solo debe responder a solicitudes HTTP GET (como acceder por URL desde un navegador).
 * Esta es la forma moderna de declarar el tipo de acción en lugar de extender Action.
 * Magento lo usará automáticamente al acceder a /helloworld/index/hello
 * */

class Hello implements HttpGetActionInterface
{
    /**
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * Usa inyección de dependencias para recibir el objeto PageFactory, que se encarga de generar páginas HTML completas (con layout y bloques).
     */

    public function __construct(PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
    }

    /**
     * Este es el método obligatorio en cualquier controlador de Magento.
     * Devuelve un objeto de tipo Page, que le dice a Magento que debe renderizar una vista (layout + template).
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        return $this->pageFactory->create();
    }

}