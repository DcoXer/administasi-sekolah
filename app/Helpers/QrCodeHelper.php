<?php

namespace App\Helpers;

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class QrCodeHelper
{
    public static function generateBase64(string $text): string
    {
        $renderer = new ImageRenderer(
            new RendererStyle(64), // ukuran qrcode
            new SvgImageBackEnd()
        );

        $writer = new Writer($renderer);
        $qrSvg = $writer->writeString($text);

        return 'data:image/svg+xml;base64,' . base64_encode($qrSvg);
    }
}
