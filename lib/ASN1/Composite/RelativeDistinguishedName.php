<?php
/*
 * This file is part of PHPASN1 written by Friedrich Große.
 *
 * Copyright © Friedrich Große, Berlin 2012
 *
 * PHPASN1 is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * PHPASN1 is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with PHPASN1.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace FG\ASN1\Composite;

use FG\ASN1\Object;
use FG\ASN1\Universal\Set;

class RelativeDistinguishedName extends Set
{
    /**
     * @param string|\FG\ASN1\Universal\ObjectIdentifier $objIdentifierString
     * @param \FG\ASN1\Object $value
     */
    public function __construct($objIdentifierString, Object $value)
    {
        // TODO: This does only support one element in the RelativeDistinguishedName Set but it it is defined as follows:
        // RelativeDistinguishedName ::= SET SIZE (1..MAX) OF AttributeTypeAndValue
        parent::__construct(new AttributeTypeAndValue($objIdentifierString, $value));
    }

    public function getContent()
    {
        /** @var Object $firstObject */
        $firstObject = $this->children[0];
        return $firstObject->__toString();
    }
}