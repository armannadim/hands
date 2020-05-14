<?php

namespace App\Models;



class Expense extends AdminModel
{

    public function donatedBy(){
        return $this->belongsTo(AdminUser::class, 'donation_given_by' );
    }

    public function beneficiary(){
        return $this->belongsTo(Beneficiary::class);
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
