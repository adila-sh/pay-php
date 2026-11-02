<?php

namespace AdilaPay\Prices\Types;

enum CreatePricesRequestRecurringUsageType: string
{
    case Licensed = "licensed";
    case Metered = "metered";
}
