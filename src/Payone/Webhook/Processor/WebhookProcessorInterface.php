<?php

declare(strict_types=1);

namespace PayonePayment\Payone\Webhook\Processor;

use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Symfony\Component\HttpFoundation\Response;

interface WebhookProcessorInterface
{
    /**
     * Processes the provided webhook data
     *
     * @param SalesChannelContext $salesChannelContext
     * @param array               $data
     *
     * @return Response
     */
    public function process(SalesChannelContext $salesChannelContext, array $data): Response;
}