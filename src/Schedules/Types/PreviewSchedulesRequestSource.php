<?php

namespace AdilaPay\Schedules\Types;

enum PreviewSchedulesRequestSource: string
{
    case Customer = "customer";
    case Subscription = "subscription";
    case Schedule = "schedule";
}
