<?php

namespace App;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

/**
 * @internal If anyone sees this source code, I'm sorry. Just something I bodged together.
 */
class StatisticsController
{
    public object $framework;

    public object $views;

    public object $linesOfCode;


    public function __construct()
    {
        $this->framework = $this->getFrameworkStats();
        unset($this->framework->versions);

        $this->views = $this->getViewStats();

        $this->linesOfCode = $this->getLinesOfCode();
    }

    protected function getFrameworkStats()
    {
        // Mock
        // $frameworkStats = '{"downloads":{"total":2497,"monthly":2290,"daily":76},"versions":["dev-master","v0.23.2-beta","v0.23.1-beta","v0.23.0-beta","v0.22.0-beta","v0.21.6-beta","v0.21.5-beta","v0.21.4-beta","v0.21.3-beta","v0.21.2-beta","v0.21.1-beta","v0.21.0-beta","v0.20.0-beta","v0.19.0-beta","v0.18.0-beta","v0.17.0-beta","v0.16.1-beta","v0.16.0-beta","v0.15.0-beta","v0.14.0-beta","v0.13.0-beta","v0.12.0-beta","v0.11.0-beta","v0.10.0-beta","v0.9.0-beta","v0.8.1-beta","v0.8.0-beta","v0.7.5-alpha","v0.7.4-alpha","v0.7.3-alpha","v0.7.2-alpha","v0.7.1-alpha","v0.7.0-alpha","v0.6.2-alpha","v0.6.1-alpha","v0.6.0-alpha","v0.5.3-alpha","v0.5.2-alpha","v0.5.1-alpha","v0.5.0-alpha","v0.4.3-alpha","v0.4.2-alpha","v0.4.1-alpha","v0.4.0-alpha","v0.3.1-alpha","v0.3.0-alpha","dev-update-changelog","dev-refactor-documentation-sidebar-internals","dev-analysis-KZEPOj","dev-analysis-BMOd0g","dev-analysis-OMWvDR","dev-refactor-docs-layout","dev-refactor-script-interactions","dev-analysis-vQEZPr","dev-analysis-L3GZVm","dev-280-feature-hide-the-hyde-install-command-once-it-has-been-run"],"average":"daily","date":"2022-03-21"}';
        // $frameworkStats = json_decode($frameworkStats);

        // return $frameworkStats;

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'User-Agent' => 'HydeDocsCI/dev-master (Twitter contact: @CodeWithCaen)',
        ])->get('https://packagist.org/packages/hyde/framework/stats.json');

        return $response->object();
    }

    protected function getViewStats()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'User-Agent' => 'HydeDocsCI/dev-master (Twitter contact: @CodeWithCaen)',
        ])->get('https://git.desilva.se/GitHubAnalyticsExplorer/table.json');

        $collection = $response->collect();

        $views = new Collection();

        foreach ($collection as $item) {
            if ($item['type'] === 'traffic/views') {
                $views->push((object) $item);
            }
        }

        $views = $views->sortBy('bucket');

        $oldest = $views->first();
        $newest = $views->last();

        // Calculate the number of weeks between the oldest and newest view (the date is string)
        $weeks = ((strtotime($newest->bucket) - strtotime($oldest->bucket)) / (60 * 60 * 24 * 7));

        $object = new \stdClass();
        $object->oldest = $oldest;
        $object->newest = $newest;
        $object->weeks = $weeks;
        $object->views = $views;
        $object->weekly = (int) ($views->sum('total') / $weeks);

        return $object;
    }
    
    protected function getLinesOfCode()
    {
        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'User-Agent' => 'HydeDocsCI/dev-master (Twitter contact: @CodeWithCaen)',
            ])->get('https://tokei.ekzhang.com/b1/github/hydephp/develop');
        } catch (\Throwable $th) {
            // Return last known count
            $object = new \stdClass();
            $object->total = 87513;
            return $object;
        }
        
        $object = new \stdClass();

        $object->total = $response->object()->lines;

        return $object;
    }
}
