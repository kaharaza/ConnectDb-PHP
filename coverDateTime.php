<?php


/** เปลี่ยนวันที่เป็นภาษาไทย */
function DateThaiAndTime($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
    $strMonthThai = $strMonthCut[$strMonth];
    $strYearCut = substr($strYear, 2, 2);
    return "วันที่: $strDay $strMonthThai $strYearCut เวลา: $strHour: $strMinute: $strSeconds";
}

function DateThai($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
    $strMonthThai = $strMonthCut[$strMonth];
    return "วันที่: $strDay $strMonthThai $strYear";
}


function DateFullThai($strFullDate)
{
    $strFullY = date("Y", strtotime($strFullDate)) + 543;
    $strFullM = date("n", strtotime($strFullDate));
    $strFullD = date("j", strtotime($strFullDate));
    $strFullH = date("H", strtotime($strFullDate));
    $strFullMinute = date("i", strtotime($strFullDate));
    $strFullSeconds = date("s", strtotime($strFullDate));
    $strFullMonthCut = array("", "มกราคม", "กุมภาพันธ์ุ", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
    $strFullMonthThai = $strFullMonthCut[$strFullM];
    return "$strFullD $strFullMonthThai $strFullY";
}

function DateFullThaiAndTime($strFullDate)
{
    $strFullY = date("Y", strtotime($strFullDate)) + 543;
    $strFullM = date("n", strtotime($strFullDate));
    $strFullD = date("j", strtotime($strFullDate));
    $strFullH = date("H", strtotime($strFullDate));
    $strFullMinute = date("i", strtotime($strFullDate));
    $strFullSeconds = date("s", strtotime($strFullDate));
    $strFullMonthCut = array("", "มกราคม", "กุมภาพันธ์ุ", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
    $strFullMonthThai = $strFullMonthCut[$strFullM];
    return "วันที่: $strFullD $strFullMonthThai $strFullY เวลา: $strFullH: $strFullMinute: $strFullSeconds ";
}
