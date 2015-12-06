<?php
/*
 * This file is part of the wp-magnify/magnify-elasticsearch package.
 *
 * (c) Christopher Davis <http://christopherdavis.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Magnify\Elasticsearch;

use Psr\Log\LoggerInterface;

/**
 * Create elasticsearch clients from configuration stored in WordPress options.
 *
 * @since 1.0
 */
final class OptionsClientFactory implements ClientFactory
{
    const OPTION_NAME = 'mangify_elasticsearch_%s';

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var string
     */
    private $name;

    public function __construct(LoggerInterface $logger, $name)
    {
        $this->logger = $logger;
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function createClient()
    {
        
    }
}
