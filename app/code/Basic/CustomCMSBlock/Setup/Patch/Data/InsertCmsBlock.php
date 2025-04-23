<?php

namespace Basic\CustomCMSBlock\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Cms\Model\BlockFactory;
use Magento\Framework\Setup\Patch\PatchResultInterface;


class InsertCmsBlock implements DataPatchInterface
{
    protected $moduleDataSetup;
    protected $blockFactory;

    /**
     * Constructor method to initialize dependencies.
     *
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param BlockFactory $blockFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        BlockFactory $blockFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->blockFactory = $blockFactory;
    }

    /**
     * Applies the patch to create the custom CMS block.
     *
     * @return PatchResultInterface|void
     */
    public function apply()
    {
        // Check if the block already exists to avoid duplication
        $block = $this->blockFactory->create()->load('custom_cms_block', 'identifier');
        if ($block->getId()) {
            return; // Exit if the block already exists
        }

        // Creating the CMS block with custom content
        $block->setTitle('Custom CMS Block')
              ->setIdentifier('custom_cms_block')
              ->setContent('<div><h1>Welcome to the Custom CMS Block</h1><p>This block is inserted automatically during module installation.</p></div>')
              ->setIsActive(1)
              ->setStores([0]) // Store ID 0 means it is available for all stores
              ->save();              
    }

    /**
     * Return a list of the patches that are applied by this patch.
     *
     * @return array
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * Check if the patch can be applied.
     *
     * @return int
     */
    public function getAliases()
    {
        return [];
    }
}
