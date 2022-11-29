<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Send waitlist notifications task.
 *
 * @package     enrol_bycategory
 * @copyright   2022 Matthias Tylkowski <matthias.tylkowski@b-tu.de>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace enrol_bycategory\task;
defined('MOODLE_INTERNAL') || die();
/**
 * Send waitlist notifications task.
 *
 * @package     enrol_bycategory
 * @copyright   2022 Matthias Tylkowski <matthias.tylkowski@b-tu.de>
 * @author      Matthias Tylkowski
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class send_waitlist_notifications extends \core\task\scheduled_task {
  /**
     * Name for this task.
     *
     * @return string
     */
    public function get_name() {
      return get_string('sendwaitlistnotificationstask', 'enrol_bycategory');
  }

  /**
   * Run task for sending expiry notifications.
   */
  public function execute() {
      /**@var enrol_bycategory_plugin */
      $enrol = enrol_get_plugin('bycategory');
      $trace = new \text_progress_trace();
      $enrol->send_waitlist_notifications($trace);
  }
}
