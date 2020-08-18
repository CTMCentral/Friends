<?php

use Google\ApiCore\Testing\MessageAwareArrayComparator;
use Google\ApiCore\Testing\ProtobufGPBEmptyComparator;
use Google\ApiCore\Testing\ProtobufMessageComparator;
use SebastianBergmann\Comparator\Factory;

date_default_timezone_set('UTC');
Factory::getInstance()->register(new MessageAwareArrayComparator());
Factory::getInstance()->register(new ProtobufMessageComparator());
Factory::getInstance()->register(new ProtobufGPBEmptyComparator());
