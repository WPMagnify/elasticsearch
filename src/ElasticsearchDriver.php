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

use Magnify\Core\Driver;

/**
 * A magnify driver backed by Elasticsearch
 *
 * @since 1.0
 */
final class ElasticsearchDriver implements Driver
{
    /**
     * @var Elasticsearch\Client
     */
    private $client = null;

    /**
     * @var ClientFactory
     */
    private $factory;

    /**
     * @var string
     */
    private $name;

    public function __construct(ClientFactory $factory, $name=null)
    {
        $this->factory = $factory;
        $this->name = $name ?: 'default';
    }

    /**
     * {@inheritdoc}
     */
    public function reader()
    {
        return false !== $this->getClient();
    }

    /**
     * {@inheritdoc}
     */
    public function persist($blogId, array $post)
    {

    }

    /**
     * {@inheritdoc}
     */
    public function bulkPersist($blogId, array $posts)
    {

    }

    /**
     * {@inheritdoc}
     */
    public function delete($blogId, $postId)
    {

    }

    /**
     * {@inheritdoc}
     */
    public function bulkDelete($blogId, array $postIds)
    {

    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return sprintf(__('Elasticsearch (%s)', MAGNIFY_ES_TD), $this->name);
    }

    /**
     * {@inheritdoc}
     */
    public function getIdentifier()
    {
        return sprintf(
            'magnify_elasticsearch_%s',
            preg_replace('/[^a-z0-9_-]/', '', strtolower($this->name))
        );
    }

    private function getClient()
    {
        if (null === $this->client) {
            $this->client = $this->factory->createClient();
        }

        return $this->client;
    }
}
