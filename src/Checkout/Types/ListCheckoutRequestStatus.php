<?php

namespace AdilaPay\Checkout\Types;

enum ListCheckoutRequestStatus: string
{
    case Open = "open";
    case Complete = "complete";
    case Expired = "expired";
}
