<?php
declare(strict_types=1);
namespace HumanElement\ConfigurableEmailEncoding\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    const XML_PATH_ENABLED = 'humanelement_configurable_email_encoding/general/enabled';

    const XML_PATH_CONTENT_TRANSFER_ENCODING = 'humanelement_configurable_email_encoding/general/content_transfer_encoding';

    protected ScopeConfigInterface $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    public function isEnabled(
        ?string $scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT,
        ?string $scopeCode = null
    ): bool {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_ENABLED,
            $scopeType,
            $scopeCode
        );
    }

    public function getContentTransferEncoding(
        ?string $scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT,
        ?string $scopeCode = null
    ): string {
        return $this->scopeConfig->getValue(
            self::XML_PATH_CONTENT_TRANSFER_ENCODING,
            $scopeType,
            $scopeCode);
    }
}
