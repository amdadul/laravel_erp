<?php

namespace App\Modules\Hr\Models;


use App\Modules\StoreInventory\Models\Stores;
use App\Model\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employees extends Model
{
    protected $table = 'employees';
    protected $guarded=[];

    const ACTIVE = 1;
    const IN_ACTIVE = 0;

    public static function totalEmployees()
    {
        $data = new Employees();
        $data = $data->select(DB::raw('count(*) as total'));
        $data = $data->where('status', '=', self::ACTIVE);
        $data = $data->first();
        return $data ? $data->total : 0;
    }

    public static function getEmployeeNameById($employee_id)
    {
        $data = DB::table('employees')
            ->select(DB::raw('full_name'))
            ->where('id','=',$employee_id)
            ->first();
        return $data ? $data->full_name : 'N/A';
    }

    public function department()
    {
        return $this->belongsTo(Departments::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designations::class);
    }

    public function store()
    {
        return $this->belongsTo(Stores::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class);
    }

    public function leaveApplication()
    {
        return $this->hasMany(LeaveApplication::class);
    }

    public function salarySetup()
    {
        return $this->hasMany(SalarySetup::class);
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}
