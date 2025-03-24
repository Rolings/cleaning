<?php

namespace App\Enums\Setting;

use App\Traits\EnumsTrait;

enum SettingFieldsEnum: string
{
    use EnumsTrait;

    case CONTACT_PHONE = 'contact_phone';
    case CONTACT_EMAIL = 'contact_email';
    case CONTACT_ADDRESS = 'contact_address';
    case CONTACT_FACEBOOK = 'contact_facebook';
    case CONTACT_TWITTER = 'contact_twitter';
    case CONTACT_INSTAGRAM = 'contact_instagram';
    case CONTACT_YOUTUBE = 'contact_youtube';
    case CONTACT_LINKEDIN = 'contact_linkedin';
    case ABOUT_TITLE = 'about_title';
    case ABOUT_DESCRIPTION = 'about_description';
    case ABOUT_PREVIEW_DESCRIPTION = 'about_preview_description';
    case TAX_PERCENTAGE = 'tax_percentage';
    case DISCOUNT_PERCENTAGE = 'discount_percentage';

}
