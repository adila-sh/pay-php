<?php

namespace AdilaPay\Prices\Types;

enum CreatePricesRequestRecurringInterval: string
{
    case Day = "day";
    case Week = "week";
    case Month = "month";
    case Year = "year";
}
