<?php

return [
    /**
     * API Key for DeepL.
     * This key can be obtained on https://www.deepl.com/
     */
    'deepl_api_key' => env('DEEPL_API_KEY', null),

    /**
     * Should we use the DeepL Pro API? Default is free.
     */
    'deepl_pro_api' => env('DEEPL_PRO_API', false),

    /**
     * The formality parameter. One of: "default", "more", "less", "prefer_more" or "prefer_less".
     * @see https://developers.deepl.com/api-reference/translate#param-formality
     */
    'formality' => 'default',

    /**
     * Sets whether the translation engine should respect the original formatting,
     * even if it usually corrects some aspects. Possible values are:
     * false (default)
     * true
     * @see https://developers.deepl.com/api-reference/translate#param-preserve-formatting
     */
    'preserve_formatting' => false,

    /**
     * Ignore tags.
     * @see https://developers.deepl.com/api-reference/translate#param-ignore-tags
     */
    'ignore_tags' => [
        "ignore",
        "ignore-filename",
        "ignore-index",
    ],

    /**
     * DeepL API URL. Change to pro URL, if you are going to use the pro plan, otherwise free.
     */
    'deepl_url' => env('DEEPL_API_URL', 'https://api.deepl.com/v2/translate'), // Endpoint for pro API
    'deepl_url_free' => env('DEEPL_API_URL_FREE', 'https://api-free.deepl.com/v2/translate') // Endpoint for free API
];