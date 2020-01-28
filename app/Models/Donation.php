<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property float $amount
 * @property string $donation_date
 * @property integer $donation_receiver
 * @property string $created_at
 * @property string $updated_at
 * @property integer $parent_project_id
 * @property integer $donor_id
 */
class Donation extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['amount', 'donation_date', 'donation_receiver', 'created_at', 'updated_at', 'parent_project_id', 'donor_id'];

}
