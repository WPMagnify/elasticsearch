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

/**
 * Create elasticsearch clients dynamically.
 *
 * @since 1.0
 */
interface ClientFactory
{
    /**
     * Create a new client. The factory should know everything it needs to make
     * the client.
     *
     * @throws Exception\CannotCreateClient if the client cannot be create for
     *         any reason.
     * @return Elasticsearch\Client|false False if the client cannot be created
     */
    public function createClient();
}
