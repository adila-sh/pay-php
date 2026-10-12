<?php

namespace AdilaPay\Prices\Types;

enum CreatePricesRequestBillingScheme: string
{
    case PerUnit = "per_unit";
    case Tiered = "tiered";
}
