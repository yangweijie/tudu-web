<?php
/**
 * Tudu Library
 *
 * LICENSE
 *
 *
 * @category   Tudu
 * @package    Tudu_Model_Entity
 * @copyright  Copyright (c) 2009-2010 Shanghai Best Oray Information S&T CO., Ltd.
 * @link       http://www.oray.com/
 * @version    $Id: Abstract.php 1837 2012-05-04 09:36:23Z cutecube $
 */

/**
 * 图度业务数据
 *
 * @category   Tudu
 * @package    Tudu_Model_Entity_Tudu
 * @copyright  Copyright (c) 2009-2010 Shanghai Best Oray Information S&T CO., Ltd.
 */
abstract class Tudu_Model_Tudu_Entity_Extension_Abstract
{
    /**
     * 声明当前扩展数据对应的处理流程
     *
     * @var string
     */
    protected $_handler = null;

    /**
     * 属性列表
     *
     * @var array
     */
    protected $_attributes = array();

    /**
     *
     * @var mixed
     */
    protected $_invoker = null;

    /**
     *
     * @param array $attributes
     */
    final public function __construct(array $attributes = null)
    {
        // 如果定义时没有指定流程名称，则按当前类名
        if (null === $this->_handler) {
            $arr = explode('_', get_class($this));
            $this->_handler = strtolower(array_pop($arr));
        }

        if (!empty($attributes)) {
            $this->setAttribute($attributes);
        }
    }

    /**
     * 初始化扩展对象数据
     * 添加到图度时会进行调用
     *
     * @param Tudu_Model_Tudu_Entity_Tudu $tudu
     */
    public function init(Tudu_Model_Tudu_Entity_Tudu &$tudu)
    {}

    /**
     * 获取当前对象处理流程模型的名称
     *
     * @return string
     */
    public function getHandler()
    {
        return $this->_handler;
    }

    /**
     * 设置对象属性
     *
     * @param mixed $name
     * @param mixed $value
     * @return Tudu_Model_Entity_Extension
     */
    public function setAttribute($name, $value = null)
    {
        if (is_array($name) && null === $value) {
            foreach ($name as $key => $value) {
                $this->_attributes[$key] = $value;
            }

        } else if (is_string($name)) {
            $this->_attributes[$name] = $value;
        }

        return $this;
    }

    /**
     * 获取对象属性
     *
     * @param string $name
     * @return mixed
     */
    public function getAttribute($name)
    {
        if (!isset($this->_attributes[$name])) {
            return null;
        }

        return $this->_attributes[$name];
    }

    /**
     * 获取属性列表
     *
     * @return array
     */
    public function getAttributes()
    {
        return $this->_attributes;
    }
}