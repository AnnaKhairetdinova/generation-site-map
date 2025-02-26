# generation-site-map
Site map generation library

## Как запустить

1. Установить библиотеку
    ```bash
    composer require a.khairetdinova/generation-site-map:dev-main

## Пример
    require_once _DIR_ . '/vendor/autoload.php';

    use GenerationSiteMap\GenerateSiteMap;
    
    $pages = [
        [
            'loc' => 'https://example.com/',
            'lastmod' => '2023-10-01',
            'priority' => 1,
            'changefreq' => 'dsdssd'
        ],
        [
            'loc' => 'https://example.com/about',
            'lastmod' => '2023-10-02',
            'priority' => 0.8,
            'changefreq' => 'dsdssd'
        ]
    ];

    $dir = dirname(DIR) . '/test';
    $path  = $dir . '/test.xml';

    try {
        $generator = new GenerateSiteMap($pages, 'xml', $path);
        $generator->generate();
    } catch (Exception $e) {
        echo "Ошибка: " . $e->getMessage() . "\n";
    }
