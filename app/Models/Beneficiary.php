<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $post_code
 * @property string $city
 * @property string $country
 * @property string $id_type
 * @property string $id_number
 * @property string $nationality
 * @property string $marital_status
 * @property int $number_of_children_girls
 * @property int $number_of_children_boys
 * @property int $total_family_member
 * @property int $total_family_member_male
 * @property int $total_family_member_female
 * @property string $other_information
 * @property string $id_photo_1
 * @property string $id_photo_2
 * @property string $photo
 * @property string $created_at
 * @property string $updated_at
 */
class Beneficiary extends Model
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
    protected $fillable = ['name', 'first_name', 'last_name', 'address', 'phone', 'email', 'post_code', 'city', 'country', 'id_type', 'id_number', 'nationality', 'marital_status', 'number_of_children_girls', 'number_of_children_boys', 'total_family_member', 'total_family_member_male', 'total_family_member_female', 'other_information', 'id_photo_1', 'id_photo_2', 'photo', 'created_at', 'updated_at'];

}
