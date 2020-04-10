<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/4/2020
 * Time: 1:37 PM
 */

namespace App\Classes\Modules\IncidentReport\DataTransferObject;

$table->unsignedBigInteger('asset_id')->nullable();
$table->unsignedBigInteger('staff_id')->nullable();
$table->unsignedBigInteger('handle_by')->nullable();
$table->unsignedBigInteger('confirm_by')->nullable();
$table->unsignedBigInteger('company_id')->nullable();
$table->string('root_cause')->nullable();
$table->string('incident_category')->nullable();
$table->string('job_start')->nullable();
$table->string('job_finish')->nullable();
$table->string('description')->nullable();
$table->longText('image')->nullable();
$table->string('rate')->nullable();
$table->string('status')->nullable();
class IncidentReportObject
{
    /** @var  int|null */
    private $asset_id;

    /** @var  int|null */
    private $staff_id;

    /** @var  int|null */
    private $handle_by;

    /** @var  int|null */
    private $confirm_by;

    /** @var  strting|null */
    private $root_cause;

    /** @var  strting|null */
    private $incident_category;

    /** @var  strting|null */
    private $job_start;

    /** @var  strting|null */
    private $job_finish;

    /** @var  strting|null */
    private $description;

    /** @var  strting|null */
    private $rate;

    /** @var  strting|null */
    private $status;




}