<?php

/*
 * This file is part of nosun/reply-to-see.
 *
 * Copyright (c) 2019
 * Original Extension by WiseClock
 * Updated by NhanChauKP
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Nosun\ReplyToSee;

use Flarum\Api\Serializer\PostSerializer;
use Flarum\Extend;
use s9e\TextFormatter\Configurator;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js')
        ->css(__DIR__.'/resources/less/forum.less'),
    (new Extend\Formatter)
	    ->configure(function (Configurator $config) {
	        $config->BBCodes->addCustom(
	            '[LOGIN]{TEXT}[/LOGIN]',
	            '<login2see>{TEXT}</login2see>'
	        );
   		 }),
    new Extend\Locales(__DIR__ . '/resources/locale'),
    (new Extend\ApiSerializer(PostSerializer::class))
        ->attributes(HideContentInPosts::class),

];
