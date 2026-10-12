<?php

namespace AdilaPay\Products\Types;

enum CreateProductsRequestDefaultPriceDataRecurringInterval: string
{
    case Day = "day";
    case Week = "week";
    case Month = "month";
    case Year = "year";
}
