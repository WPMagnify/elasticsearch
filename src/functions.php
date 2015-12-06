<?php
/*
 * This file is part of the wp-magnify/magnify-elasticsearch package.
 *
 * (c) Christopher Davis <http://christopherdavis.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Magnify\Elasticsearch as ES;
/**
 * Hooked into the `magnify_loaded` to initialize the driver.
 *
 * @param $magnify the magnify application class.
 * @return void
 */
function magnify_elasticsearch_load(Magnify $magnify)
{
    foreach (magnify_elasticsearch_drivers() as $d) {
        $magnify["elasticsearch.{$d}.factory"] = function ($magnify) use ($d) {
            return new ES\OptionsClientFactory($magnify['logger'], sprintf(
                'magnify_elasticsearch_%s',
                $d
            ));
        };

        $magnify["elasticsearch.{$d}"] = function ($magnify) use ($d) {
            return new ES\ElasticsearchDriver(
                $magnify["elasticsearch.{$d}.factory"],
                $d
            );
        };

        $magnify->registerDriver($magnify["elasticsearch.{$d}"]);
    }
}

function magnify_elasticsearch_drivers()
{
    return magnify_filter('elasticsearch_drivers', ['default']);
}
