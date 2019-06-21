<?php

declare(strict_types=1);

namespace PayonePayment\Payone\Request\Refund;

use PayonePayment\Payone\Request\AbstractRequestFactory;
use PayonePayment\Payone\Request\System\SystemRequest;
use PayonePayment\Payone\Struct\PaymentTransaction;
use Shopware\Core\Framework\Context;

class RefundRequestFactory extends AbstractRequestFactory
{
    /** @var SystemRequest */
    private $systemRequest;

    /** @var RefundRequest */
    private $refundRequest;

    public function __construct(SystemRequest $systemRequest, RefundRequest $refundRequest)
    {
        $this->systemRequest = $systemRequest;
        $this->refundRequest = $refundRequest;
    }

    public function getRequestParameters(PaymentTransaction $transaction, Context $context): array
    {
        $this->requests[] = $this->refundRequest->getRequestParameters(
            $transaction->getOrder(),
            $context,
            $transaction->getCustomFields()
        );

        $this->requests[] = $this->systemRequest->getRequestParameters(
            $transaction->getOrder()->getSalesChannelId()
        );

        return $this->createRequest();
    }
}
