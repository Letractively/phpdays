<?php
/**
 * BlogTag
 *
 * @author Anton Danilchenko
 */
class Model_BlogTag {
    protected $_name = 'type: String, min: 2, max: 70, required, unique';
    protected $_url  = 'type: String, min: 2, max: 70, required, unique';
}