<?php

namespace AdilaPay\Refunds\Types;

enum CreateRefundsRequestReason: string
{
    case Duplicate = "duplicate";
    case Fraudulent = "fraudulent";
    case RequestedByCustomer = "requested_by_customer";
}
