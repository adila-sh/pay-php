<?php

namespace AdilaPay\Schedules\Types;

enum PreviewSchedulesRequestAction: string
{
    case Save = "save";
    case Release = "release";
    case Cancel = "cancel";
}
