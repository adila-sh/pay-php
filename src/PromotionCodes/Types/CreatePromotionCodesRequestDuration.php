<?php

namespace AdilaPay\PromotionCodes\Types;

enum CreatePromotionCodesRequestDuration: string
{
    case Once = "once";
    case Forever = "forever";
    case Repeating = "repeating";
}
