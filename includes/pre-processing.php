<?php
/******************************************************************************
 *
 * Subrion - open source content management system
 * Copyright (C) 2017 Intelliants, LLC <https://intelliants.com>
 *
 * This file is part of Subrion.
 *
 * Subrion is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Subrion is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Subrion. If not, see <http://www.gnu.org/licenses/>.
 *
 *
 * @link https://subrion.org/
 *
 ******************************************************************************/

if ($iaCore->get('bankwiretransfer_payment_details'))
{
	$member = iaUsers::getIdentity(true);

	$iaMailer = $iaCore->factory('mailer');

	$iaMailer->loadTemplate('bankwiretransfer_payment_details');
	$iaMailer->addAddress($member['email'], $member['fullname']);
	$iaMailer->setReplacements('bank_details', $iaCore->get('wiretransfer_bank_details'));

	$iaMailer->send();
}