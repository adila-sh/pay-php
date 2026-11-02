<?php

namespace AdilaPay\Disputes\Types;

enum UploadEvidenceDisputesRequestFileContentType: string
{
    case ApplicationPdf = "application/pdf";
    case ImagePng = "image/png";
    case ImageJpeg = "image/jpeg";
}
