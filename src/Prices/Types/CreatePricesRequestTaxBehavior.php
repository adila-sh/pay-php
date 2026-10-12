<?php

namespace AdilaPay\Prices\Types;

enum CreatePricesRequestTaxBehavior: string
{
    case Inclusive = "inclusive";
    case Exclusive = "exclusive";
    case Unspecified = "unspecified";
}
