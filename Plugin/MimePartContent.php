<?php

namespace HumanElement\ConfigurableEmailEncoding\Plugin;

use HumanElement\ConfigurableEmailEncoding\Model\Config;

class MimePartContent
{

    private Config $config;

    public function __construct(
        Config $config
    )
    {
        $this->config = $config;
    }

    public function afterGetContent(\Magento\Framework\Mail\MimePart $subject, $result)
    {
        if ($this->config->isEnabled() && $subject->getEncoding() === \Laminas\Mime\Mime::ENCODING_7BIT) {
            return $this->normalizeNewLines($result);
        }
        return $result;
    }

    protected function normalizeNewLines($content)
    {
        $breaktype = "\r\n";
        $content = str_replace([$breaktype, "\r"], "\n", $content);
        $content = str_replace("\n", $breaktype, $content);
        if (substr($content, -(strlen($breaktype))) !== $breaktype) {
            $content .= $breaktype;
        }
        return $content;
    }
}

