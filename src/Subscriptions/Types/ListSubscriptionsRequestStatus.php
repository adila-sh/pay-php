<?php

namespace AdilaPay\Subscriptions\Types;

enum ListSubscriptionsRequestStatus: string
{
    case All = "all";
    case Active = "active";
    case PastDue = "past_due";
    case Unpaid = "unpaid";
    case Canceled = "canceled";
    case Incomplete = "incomplete";
    case IncompleteExpired = "incomplete_expired";
    case Trialing = "trialing";
    case Paused = "paused";
}
