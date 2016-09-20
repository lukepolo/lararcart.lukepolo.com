<?php

namespace App\Http\Controllers;

use App\Services\DocumentationService;
use Symfony\Component\DomCrawler\Crawler;

class DocsController extends Controller
{
    const DEFAULT_VERSION = '1.0';

    protected $documentationService;

    /**
     * Create a new controller instance.
     *
     * @param  DocumentationService  $documentationService
     */
    public function __construct(DocumentationService $documentationService)
    {
        $this->documentationService = $documentationService;
    }

    /**
     * Show the root documentation page (/).
     *
     * @return Response
     */
    public function showRootPage()
    {
        return redirect(self::DEFAULT_VERSION.'/getting-started');
    }

    /**
     * Show a documentation page.
     *
     * @param  string $version
     * @param  string|null $page
     * @return Response
     */
    public function show($version, $page = null)
    {
        if (! $this->isVersion($version)) {
            return redirect(self::DEFAULT_VERSION.'/'.$version, 301);
        }

        if (! defined('CURRENT_VERSION')) {
            define('CURRENT_VERSION', $version);
        }

        $sectionPage = $page ?: 'overview';

        $content = $this->documentationService->get($version, $sectionPage);

        if (is_null($content)) {
            abort(404);
        }

        $title = (new Crawler($content))->filterXPath('//h2');

        $section = '';

        if ($this->documentationService->sectionExists($version, $page)) {
            $section .= '/'.$page;
        } elseif (! is_null($page)) {
            return redirect('/'.$version);
        }

        $canonical = null;

        if ($this->documentationService->sectionExists(self::DEFAULT_VERSION, $sectionPage)) {
            $canonical = self::DEFAULT_VERSION.'/'.$sectionPage;
        }

        return view('docs', [
            'title' => count($title) ? $title->text() : null,
            'index' => $this->documentationService->getIndex($version),
            'content' => $content,
            'currentVersion' => $version,
            'versions' => DocumentationService::getDocVersions(),
            'currentSection' => $section,
            'canonical' => $canonical,
        ]);
    }

    /**
     * Determine if the given URL segment is a valid version.
     *
     * @param  string  $version
     * @return bool
     */
    protected function isVersion($version)
    {
        return in_array($version, array_keys(DocumentationService::getDocVersions()));
    }
}