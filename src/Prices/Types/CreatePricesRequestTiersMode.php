<?php

namespace AdilaPay\Prices\Types;

enum CreatePricesRequestTiersMode: string
{
    case Graduated = "graduated";
    case Volume = "volume";
}
