<?php
/**
 * JDF (Jalali Date Function) — Persian Calendar
 * نسخه بهینه‌شده برای استفاده در پروژه‌های حرفه‌ای
 * Author: OpenAI (ویرایش برای پارسا)
 */

const JDF_PERSIAN_MONTHS = [
    '', 'فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور',
    'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'
];

const JDF_PERSIAN_DAYS = [
    'یکشنبه', 'دوشنبه', 'سه‌شنبه', 'چهارشنبه', 'پنج‌شنبه', 'جمعه', 'شنبه'
];

function jdate(string $format, int|string $timestamp = null, string $time_zone = 'Asia/Tehran', string $tr_num = 'fa'): string
{
    if ($time_zone !== 'local') {
        date_default_timezone_set($time_zone ?: 'Asia/Tehran');
    }

    $ts = $timestamp ? (int)tr_num($timestamp, 'en') : time();
    $date = explode('_', date('H_i_j_n_O_P_s_w_Y', $ts));
    [$j_y, $j_m, $j_d] = gregorian_to_jalali((int)$date[8], (int)$date[3], (int)$date[2]);

    $result = '';
    $format = str_replace('c', 'Y-m-d\TH:i:sP', $format);

    for ($i = 0, $len = strlen($format); $i < $len; $i++) {
        $char = $format[$i];
        $result .= match ($char) {
            'A' => ((int)$date[0] < 12) ? 'ق.ظ' : 'ب.ظ',
            'a' => ((int)$date[0] < 12) ? 'am' : 'pm',
            'd' => str_pad($j_d, 2, '0', STR_PAD_LEFT),
            'D' => jdate_words('day', (int)$date[6]),
            'F' => jdate_words('month', $j_m),
            'H' => $date[0],
            'i' => $date[1],
            'j' => $j_d,
            'l' => jdate_words('day', (int)$date[6]),
            'm' => str_pad($j_m, 2, '0', STR_PAD_LEFT),
            'M' => jdate_words('month', $j_m),
            'n' => $j_m,
            's' => $date[6],
            'S' => 'ام',
            'w' => $date[7],
            'Y', 'o' => $j_y,
            'y' => substr($j_y, 2, 2),
            default => $char
        };
    }

    return ($tr_num !== 'en') ? tr_num($result, 'fa') : $result;
}

function tr_num(string $str, string $mod = 'en'): string
{
    $fa = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
    $en = ['0','1','2','3','4','5','6','7','8','9'];

    return $mod === 'fa' ? str_replace($en, $fa, $str) : str_replace($fa, $en, $str);
}

function jdate_words(string $type, int $num): string
{
    return match ($type) {
        'month' => JDF_PERSIAN_MONTHS[$num] ?? '',
        'day' => JDF_PERSIAN_DAYS[$num % 7] ?? '',
        default => ''
    };
}

function gregorian_to_jalali(int $gy, int $gm, int $gd): array
{
    $g_d_m = [0,31,28,31,30,31,30,31,31,30,31,30,31];
    $gy2 = ($gm > 2) ? $gy + 1 : $gy;
    $days = 355666 + (365 * $gy) + floor(($gy2 + 3) / 4) - floor(($gy2 + 99) / 100) + floor(($gy2 + 399) / 400) + $gd;

    for ($i = 0; $i < $gm; $i++) {
        $days += $g_d_m[$i];
    }

    $jy = -1595 + (33 * floor($days / 12053));
    $days %= 12053;

    $jy += 4 * floor($days / 1461);
    $days %= 1461;

    if ($days > 365) {
        $jy += floor(($days - 1) / 365);
        $days = ($days - 1) % 365;
    }

    for ($jm = 0; $jm < 11 && $days >= (($jm < 6) ? 31 : 30); $jm++) {
        $days -= ($jm < 6) ? 31 : 30;
    }

    return [$jy, $jm + 1, $days + 1];
}
?>

