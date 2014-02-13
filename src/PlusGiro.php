<?php
/**
 * This file is part of ledgr/banking.
 *
 * Copyright (c) 2014 Hannes Forsgård
 *
 * ledgr/banking is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * ledgr/banking is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with ledgr/banking.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace ledgr\banking;

/**
 * PlusGiro account
 *
 * @author Hannes Forsgård <hannes.forsgard@fripost.org>
 */
class PlusGiro extends AbstractGiro
{
    /**
     * Get string describing account type
     *
     * @return string
     */
    public function getType()
    {
        return "PlusGiro";
    }

    /**
     * Get string describing account structure
     *
     * @return string
     */
    protected function getStructure()
    {
        return "/^\d{1,7}-\d$/";
    }
}
