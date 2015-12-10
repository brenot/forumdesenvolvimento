<?php
defined('_JEXEC') or die('Restricted access');

/**
 * Copyright 2012 Klarna AB
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * File containing the Transport factory
 *
 * PHP version 5.3
 *
 * @category   Payment
 * @package    Payment_Klarna
 * @subpackage Unit_Tests
 * @author     Klarna <support@klarna.com>
 * @copyright  2012 Klarna AB
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache license v2.0
 * @link       http://integration.klarna.com/
 */

/**
 * Factory of HTTP Transport
 *
 * @category   Payment
 * @package    Payment_Klarna
 * @subpackage Unit_Tests
 * @author     David K. <david.keijser@klarna.com>
 * @copyright  2012 Klarna AB
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache license v2.0
 * @link       http://integration.klarna.com/
 */
class Klarna_Checkout_HTTP_Transport
{
    /**
     * Create a new transport instance
     *
     * @return Klarna_Checkout_HTTP_TransportInterface
     */
    public static function create()
    {
        return new Klarna_Checkout_HTTP_CURLTransport(
            new Klarna_Checkout_HTTP_CURLFactory
        );
    }
}
