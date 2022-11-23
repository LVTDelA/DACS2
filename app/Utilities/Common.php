<?php

namespace App\Utilities;

use Carbon\Carbon;
use Illuminate\Support\Str;


//  cau hinh xu ly uploads file anh

class Common
{
   public static  function uploadFile($file,$path)
   {
       $file_name_original = $file->getClientOriginalName();
       $extension = $file->getClientOriginalExtension();
       $file_name_without_extension = Str::replaceLast('.' . $extension, '',$file_name_original);
//Carbon: hàm xử lý để lấy date time
       $str_time_now = Carbon::now()->format('ymd_his');
 //str_slug() tạo ra một chuỗi URL thân thiện bằng chuỗi truyền vào
       $file_name = Str::slug($file_name_without_extension) . '_' . uniqid() . '_' . $str_time_now . '.' . $extension;

       $file->move($path,$file_name);

       return $file_name;
   }
}
