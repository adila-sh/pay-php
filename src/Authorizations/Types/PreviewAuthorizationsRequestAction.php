<?php

namespace AdilaPay\Authorizations\Types;

enum PreviewAuthorizationsRequestAction: string
{
    case Capture = "capture";
    case Cancel = "cancel";
}
