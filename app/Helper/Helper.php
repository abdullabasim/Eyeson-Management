<?php

namespace App\Helper;

use Illuminate\Http\Request;
use App\Models\School\notification as notificationModel;
use App\User as userModel;
use App\Models\School\Level as levelModel;
use App\Models\School\Clsss as classModel;
use App\Models\School\Score as scoreModel;
use Carbon\Carbon;
use Auth;


Class Helper {


    public static function notificationType($type,$receiver ,$class)
    {
       if ($type == 1)
       {
           $user = userModel::findOrFail($receiver);

           return " أرسل الى الطالب " . $user->name;
       }
       elseif($type == 2)
       {
           $level= levelModel::findOrFail($receiver);

           return "أرسل الى " . $level->title;
       }
       elseif($type == 3)
       {
           $level= levelModel::findOrFail($receiver);

           $class= classModel::findOrFail($class);

           return "أرسل الى " . $level->title. " شعبة " .$class->title;
       }
       elseif($type == 4)
       {


           return "أرسل الى جميع طلاب المدرسة";

       }

    }

    public static function getScore($term,$lesson,$student)
    {
        $score = scoreModel::where('term_id',$term)
                             ->where('lesson_id',$lesson)
                             ->where('student_id',$student)
                             ->first();

        if($score != null)
            return $score->score;
        else
            return " ";
    }

}