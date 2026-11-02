<?php

namespace AdilaPay\Checkout\Types;

enum CreateCheckoutRequestBillingAddressCollection: string
{
    case Auto = "auto";
    case Required = "required";
}
