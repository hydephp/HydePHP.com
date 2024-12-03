<?php

declare(strict_types=1);

namespace App\DataCollections\Types;

use Hyde\Markdown\Models\Markdown;
use App\Extend\Concerns\DataCollectionType;

class Testimonials extends DataCollectionType
{
    public string $name;
    public ?string $title;
    public ?string $company;
    public ?string $company_url;
    public ?string $twitter_link;
    public ?string $twitter_username;
    public ?string $profile_image;

    public Markdown $markdown;
}
