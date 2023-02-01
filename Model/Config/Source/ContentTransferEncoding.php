<?php
namespace HumanElement\ConfigurableEmailEncoding\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\Mail\MimeInterface;

class ContentTransferEncoding implements OptionSourceInterface
{
    public function toOptionArray(): array
    {
        return [
            [
                'label' => 'quoted-printable',
                'value' => MimeInterface::ENCODING_QUOTED_PRINTABLE,
            ],
            [
                'label' => '7bit',
                'value' => MimeInterface::ENCODING_7BIT,
            ],
            [
                'label' => 'base64',
                'value' => MimeInterface::ENCODING_BASE64,
            ]
        ];
    }
}
