<?php

namespace AdilaPay\Prices\Types;

enum CreatePricesRequestTransformQuantityRound: string
{
    case Up = "up";
    case Down = "down";
}
