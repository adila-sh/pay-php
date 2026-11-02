<?php

namespace AdilaPay\PaymentIntents\Types;

enum CreatePaymentIntentsRequestCaptureMethod: string
{
    case Automatic = "automatic";
    case Manual = "manual";
}
