<?php

/**
 * @see       https://github.com/laminas/laminas-ldap for the canonical source repository
 * @copyright https://github.com/laminas/laminas-ldap/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-ldap/blob/master/LICENSE.md New BSD License
 */

namespace LaminasTest\Ldap\Node;

use LaminasTest\Ldap as TestLdap;

/**
 * @group      Laminas_Ldap
 * @group      Laminas_Ldap_Node
 */
class AttributeIterationTest extends TestLdap\AbstractTestCase
{
    public function testSimpleIteration()
    {
        $node = $this->createTestNode();
        $i    = 0;
        $data = [];
        foreach ($node->getAttributes() as $k => $v) {
            $this->assertNotNull($k);
            $this->assertNotNull($v);
            $this->assertEquals($node->$k, $v);
            $data[$k] = $v;
            $i++;
        }
        $this->assertEquals(5, $i);
        $this->assertEquals($i, count($node));
        $this->assertEquals([
                                 'boolean'     => [true, false],
                                 'cn'          => ['name'],
                                 'empty'       => [],
                                 'host'        => ['a', 'b', 'c'],
                                 'objectclass' => ['account', 'top']], $data);
    }
}
