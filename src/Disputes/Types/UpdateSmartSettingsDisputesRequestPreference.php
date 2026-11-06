<?php

namespace AdilaPay\Disputes\Types;

enum UpdateSmartSettingsDisputesRequestPreference: string
{
    case On = "on";
    case Off = "off";
    case Inherit = "inherit";
}
