<?php

namespace HumanElement\ConfigurableEmailEncoding\Model;

use Magento\Framework\Mail\MimeInterface;
use Magento\Framework\Mail\MimePartInterfaceFactory as OriginalMimePartInterfaceFactory;
use Magento\Framework\ObjectManagerInterface;

class MimePartInterfaceFactory extends OriginalMimePartInterfaceFactory
{
    private Config $config;

    public function __construct(
        Config $config,
        ObjectManagerInterface $objectManager,
        $instanceName = '\\Magento\\Framework\\Mail\\MimePartInterface')
    {
        parent::__construct($objectManager, $instanceName);
        $this->config = $config;
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data = [])
    {
        if($this->config->isEnabled()) {
            $data['encoding'] = $this->config->getContentTransferEncoding();
        }

        return $this->_objectManager->create($this->_instanceName, $data);
    }
}

