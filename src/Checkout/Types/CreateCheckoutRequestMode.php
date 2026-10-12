<?php

namespace AdilaPay\Checkout\Types;

enum CreateCheckoutRequestMode: string
{
    case Payment = "payment";
    case Subscription = "subscription";
}
