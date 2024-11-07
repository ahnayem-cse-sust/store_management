<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpFoundation\Response;

if (!function_exists('slugify')) {
    function slugify($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}

if (!function_exists('options')) {
    function options($table, $where, $columns, $valueColumn, $displayColumn, $orderByColumn, $direction, $selectedText = '', $selectedValue = 0, $dataColumns = array())
    {
        if (!empty($selectedText)) {
            $response = '<option value="">' . $selectedText . '</option>';
        } else {
            $response = '';
        }
        if (Schema::hasColumn($table, 'deleted_at')) {
            $info = DB::table($table)
                ->where($where)
                ->whereNull('deleted_at')
                ->orderBy($orderByColumn, $direction)
                ->get();
        } else {
            $info = DB::table($table)
                ->where($where)
                ->orderBy($orderByColumn, $direction)
                ->get();
        }

        $selected = '';
        foreach ($info as $key => $value) {
            $merge = '';
            if (is_array($selectedValue)) {
                if (in_array($value->id, $selectedValue)) {
                    $selected = 'selected';
                } else {
                    $selected = '';
                }
            } else {
                $selected = $selectedValue == $value->$valueColumn ? 'selected' : '';
            }
            if (empty($displayColumn)) {
                foreach ($columns as $k => $v) {
                    $merge .= $value->$v . ' - ';
                }
                $merge = rtrim($merge, ' - ');
            }
            if (empty($displayColumn)) {
                $display = $merge;
            } else {
                $display = $value->$displayColumn;
            }
            $data_columns = '';
            foreach ($dataColumns as $k1 => $v1) {
                $data_columns .= ' data-' . $v1 . '=' . $value->$v1;
            }
            $response .= '<option ' . $selected . ' value="' . $value->$valueColumn . '" ' . $data_columns . '>' . $display . '</option>';
        }
        return $response;
    }
}
if (!function_exists('option')) {
    function option($info = array(), $selectedText = '', $selectedValue = -1)
    {
        if (!empty($selectedText)) {
            $response = '<option value="">' . $selectedText . '</option>';
        } else {
            $response = '';
        }
        foreach ($info as $key => $value) {
            $selected = $selectedValue == $key ? 'selected' : '';
            $display = $value;
            $response .= '<option ' . $selected . ' value="' . $key . '">' . $display . '</option>';
        }
        return $response;
    }
}

if (!function_exists('findById')) {
    function findById($table, $where)
    {
        $info = DB::table($table)
            ->where($where)
            ->first();
        return $info;
    }
}
if (!function_exists('findAll')) {
    function findAll($table, $where, $order, $serialized)
    {
        if (!empty($order)) {
            $info = DB::table($table)
                ->where($where)
                ->orderBy($order, $serialized)
                ->get();
        } else {
            $info = DB::table($table)
                ->where($where)
                ->get();
        }
        return $info;
    }
}
if (!function_exists('find')) {
    function find($model, $where, $order, $serialized, $return, $with = array())
    {
        $model = 'App\\' . $model;
        if (!empty($with)) {
            $info = $model::with($with)
                ->where($where)
                ->orderBy($order, $serialized)
                ->$return();
        } else {
            $info = $model::where($where)
                ->orderBy($order, $serialized)
                ->$return();
        }

        return $info;
    }
}
if (!function_exists('slug')) {
    function slug()
    {
        $user = Auth::user();
        $slug = $user->office->country->currency->slug;
        return $slug;
    }
}
if (!function_exists("path")) {
    function path()
    {
        $path = request()->path();
        $path = str_replace('edit', '', $path);
        $path = str_replace('delete', '', $path);
        $path = preg_replace('/\d+/u', '', $path);
        $path = chop($path, '/');
        $path = str_replace('/', '_', $path);
        $path = str_replace('-', '_', $path);
        return $path;
    }
}
if (!function_exists("access")) {
    function access()
    {
        $access_permission = 'access_' . path();
        abort_if(Gate::denies($access_permission), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return 1;
    }
}
if (!function_exists("create")) {
    function create()
    {
        $create_permission = 'create_' . path();
        abort_if(Gate::denies($create_permission), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return 1;
    }
}
if (!function_exists("edit")) {
    function edit()
    {
        $edit_permission = 'edit_' . path();
        abort_if(Gate::denies($edit_permission), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return 1;
    }
}
if (!function_exists("delete")) {
    function delete()
    {
        $delete_permission = 'delete_' . path();
        $delete_permission = str_replace('_destroy', '', $delete_permission);
        abort_if(Gate::denies($delete_permission), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return 1;
    }
}
if (!function_exists("show")) {
    function show()
    {
        $show_permission = 'show_' . path();
        abort_if(Gate::denies($show_permission), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return 1;
    }
}
if (!function_exists("convert")) {
    function convert()
    {
        $result = config('panel.primary_language');
        $language = $_GET;
        if (isset($language)) {
            if (array_key_exists("change_language", $language)) {
                if ($language['change_language'] == 'ar') {
                    $result = 'ar';
                } else if ($language['change_language'] == 'en') {
                    $result = 'en';
                }
            }
        }
        return $result;
    }
}

if (!function_exists("checkExist")) {
    function checkExist($url)
    {
        if (isset($url) && !empty($url) && File::exists(public_path($url))) {
            return 1;
        } else {
            return 0;
        }
    }
}
if (!function_exists("PAD")) {
    function PAD($str, $length = 4, $charecter = "0", $type = STR_PAD_LEFT)
    {
        return str_pad($str, $length, $charecter, $type);
    }
}
if (!function_exists("numberFormat")) {
    function numberFormat($amount, $precision = 2)
    {
        return number_format((float) $amount, $precision, '.', '');
    }
}
if (!function_exists("acl")) {
    function acl()
    {
        $user = Auth::user();
        if ($user->role_id == 1) {
            $office_ids = \App\Office::all()->pluck('id')->toArray();
        } else {
            $office_ids = explode(',', $user->acl);
        }
        return $office_ids;
    }
}
if (!function_exists("country_id")) {
    function country_id()
    {
        $user = Auth::user();
        if ($user->role_id == 1) {
            $country_id = \App\Country::all()->pluck('id')->toArray();
        } else {
            $country_id = $user->country_id;
        }
        return $country_id;
    }
}
if (!function_exists("region_type_id")) {
    function region_type_id()
    {
        $user = Auth::user();
        if ($user->role_id == 1) {
            $region_type_id = "";
        } else {
            $region_type_id = $user->office->region_type_id;
        }
        return $region_type_id;
    }
}
if (!function_exists('bn2enNumber')) {
    function bn2enNumber($number)
    {
        $search_array = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "0");
        $replace_array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
        $en_number = str_replace($search_array, $replace_array, $number);

        return $en_number;
    }
}
if (!function_exists('enNumber2bn')) {
    function enNumber2bn($number)
    {
        $search_array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
        $replace_array = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
        $en_number = str_replace($search_array, $replace_array, $number);
        return $en_number;
    }
}
if (!function_exists('enNumber2ar')) {
    function enNumber2ar($number)
    {
        $number = strrev($number);
        $search_array = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        $replace_array = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        $ar_number = str_replace($search_array, $replace_array, $number);
        return $ar_number;
    }
}
if (!function_exists('formatedDate')) {
    function formatedDate($date, $format = 'm-d-Y')
    {
        $result = date($format, strtotime($date));
        return $result;
    }
}
if (!function_exists('sendSmsBD')) {
    function sendSmsBD($mobile_no, $content)
    {
        $contacts = $mobile_no;
        // $senderid ="8804445629107";
        $senderid = "binameer";
        $api_key = "binameer6258815a4c6780.24968544";
        $msg = urlencode($content);
        $url = "http://bulksms.smsbuzzbd.com/smsapi?api_key=$api_key&type=text&contacts=$contacts&senderid=$senderid&msg=$msg";
        // $url = "http://bulksms.smsbuzzbd.com/smsapi?api_key=(APIKEY)&type=text&contacts=(NUMBER)&senderid=(Approved Sender ID)&msg=(Message Content)";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        if (str_contains($output, 'SMS SUBMITTED')) {
            return 1;
        } else {
            return 0;
        }
    }
}
if (!function_exists('sendSms')) {
    function sendSms($mobile_no, $content)
    {
        $userSender = "BINAMEER";
        $userName = "Hraam20";
        $userPassword = "886622Htg";
        $msg = urlencode($content);
        //$msg = $content;
        //$url = "http://msegat.com/gw/?userName=$userName&userPassword=$userPassword&numbers=$mobile_no&userSender=$userSender&msg=$msg&By=Link&msgEncoding=UTF8";
        $url = "https://msegat.com/gw/?userName=Hraam20&userPassword=886622Htg&numbers=$mobile_no&userSender=BINAMEER&msg=$msg&By=Link&msgEncoding=UTF8";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        if ($output == 1) {
            return 1;
        } else {
            return 0;
        }
    }
}
if (!function_exists('sendEmail')) {
    function sendEmail($to, $txt)
    {
        $subject = "Binameer Accounts Login";
        $headers = "From: info@binameer.com" . "\r\n";
        mail($to, $subject, $txt, $headers);
    }
}
if (!function_exists('convert_number_to_words')) {
    function convert_number_to_words($number)
    {
        $hyphen = '-';
        $conjunction = ' and ';
        $separator = ', ';
        $negative = 'negative ';
        $decimal = ' point ';
        $dictionary = array(
            0 => 'zero',
            1 => 'one',
            2 => 'two',
            3 => 'three',
            4 => 'four',
            5 => 'five',
            6 => 'six',
            7 => 'seven',
            8 => 'eight',
            9 => 'nine',
            10 => 'ten',
            11 => 'eleven',
            12 => 'twelve',
            13 => 'thirteen',
            14 => 'fourteen',
            15 => 'fifteen',
            16 => 'sixteen',
            17 => 'seventeen',
            18 => 'eighteen',
            19 => 'nineteen',
            20 => 'twenty',
            30 => 'thirty',
            40 => 'fourty',
            50 => 'fifty',
            60 => 'sixty',
            70 => 'seventy',
            80 => 'eighty',
            90 => 'ninety',
            100 => 'hundred',
            1000 => 'thousand',
            1000000 => 'million',
            1000000000 => 'billion',
            1000000000000 => 'trillion',
            1000000000000000 => 'quadrillion',
            1000000000000000000 => 'quintillion',
        );
        if (!is_numeric($number)) {
            return false;
        }
        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }
        if ($number < 0) {
            return $negative . convert_number_to_words(abs($number));
        }
        $string = $fraction = null;
        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }
        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens = ((int) ($number / 10)) * 10;
                $units = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    $string .= $conjunction . convert_number_to_words($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= convert_number_to_words($remainder);
                }
                break;
        }
        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string) $fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }
        return $string;
    }
}
if (!function_exists('presentStock')) {
    function presentStock($branch_id, $warehouse_id = '', $group_id = '', $subgroup_id = '', $item_id = '', $from_date = '', $to_date = '')
    {
        $where = [];
        $where[] = ['openings.branch_id', '=', $branch_id];
        if (!empty($warehouse_id)) {
            $where[] = ['warehouse_id', '=', $warehouse_id];
        }
        if (!empty($group_id)) {
            $where[] = ['group_id', '=', $group_id];
        }
        if (!empty($subgroup_id)) {
            $where[] = ['subgroup_id', '=', $subgroup_id];
        }
        if (!empty($item_id)) {
            $where[] = ['item_id', '=', $item_id];
        }
        $where[] = ['warehouses.type', '=', 'Main'];
        $opening_qty = \App\Opening::leftJoin('warehouses', 'warehouses.id', '=', 'openings.warehouse_id')
            ->where($where)->sum('opening_quantity');

        $opening_qty = isset($opening_qty) ? $opening_qty : 0;

        $where = [];
        $where[] = ['branch_id', '=', $branch_id];
        $where[] = ['status', '=', 'Approved'];
        if (!empty($warehouse_id)) {
            $where[] = ['warehouse_id', '=', $warehouse_id];
        }
        if (!empty($group_id)) {
            $where[] = ['group_id', '=', $group_id];
        }
        if (!empty($subgroup_id)) {
            $where[] = ['subgroup_id', '=', $subgroup_id];
        }
        if (!empty($item_id)) {
            $where[] = ['item_id', '=', $item_id];
        }

        $receive_quantity = \App\MaterialReceiveDetails::where($where)->sum('receive_quantity');
        $receive_quantity = isset($receive_quantity) ? $receive_quantity : 0;

        $where = [];
        $where[] = ['branch_id', '=', $branch_id];
        if (!empty($warehouse_id)) {
            $where[] = ['warehouse_id', '=', $warehouse_id];
        }
        if (!empty($group_id)) {
            $where[] = ['group_id', '=', $group_id];
        }
        if (!empty($subgroup_id)) {
            $where[] = ['subgroup_id', '=', $subgroup_id];
        }
        if (!empty($item_id)) {
            $where[] = ['item_id', '=', $item_id];
        }

        $delivery_qty = \App\ChallanDetails::where($where)->sum('delivered_quantity');
        $delivery_qty = isset($delivery_qty) ? $delivery_qty : 0;
        //  $balance = $opening_qty - $delivery_qty;

        $where = [];
        $where[] = ['branch_id', '=', $branch_id];
        if (!empty($warehouse_id)) {
            $where[] = ['warehouse_from_id', '=', $warehouse_id];
        }
        if (!empty($group_id)) {
            $where[] = ['group_id', '=', $group_id];
        }
        if (!empty($subgroup_id)) {
            $where[] = ['subgroup_id', '=', $subgroup_id];
        }
        if (!empty($item_id)) {
            $where[] = ['item_id', '=', $item_id];
        }

        $tsdelivery_qty = \App\TSChallanDetails::where($where)->sum('delivered_quantity');
        $tsdelivery_qty = isset($tsdelivery_qty) ? $tsdelivery_qty : 0;

        $where = [];
        $where[] = ['demageitems.branch_id', '=', $branch_id];
        if (!empty($warehouse_id)) {
            $where[] = ['warehouse_id', '=', $warehouse_id];
        }
        if (!empty($group_id)) {
            $where[] = ['group_id', '=', $group_id];
        }
        if (!empty($subgroup_id)) {
            $where[] = ['subgroup_id', '=', $subgroup_id];
        }
        if (!empty($item_id)) {
            $where[] = ['item_id', '=', $item_id];
        }
        $where[] = ['warehouses.type', '=', 'Main'];
        $where[] = ['status', '=', 'Approved'];
        $demage_qty = \App\DemageItem::leftJoin('warehouses', 'warehouses.id', '=', 'demageitems.warehouse_id')
            ->where($where)->sum('quantity');
        $demage_qty = isset($demage_qty) ? $demage_qty : 0;

        $balance = ($opening_qty + $receive_quantity) - ($delivery_qty + $tsdelivery_qty + $demage_qty);
        return $balance;
    }
}
if (!function_exists('presentToolsStock')) {
    function presentToolsStock($branch_id, $warehouse_id = '', $group_id = '', $subgroup_id = '', $item_id = '', $from_date = '', $to_date = '')
    {
        $where = [];
        $where[] = ['openings.branch_id', '=', $branch_id];
        if (!empty($warehouse_id)) {
            $where[] = ['warehouse_id', '=', $warehouse_id];
        }
        if (!empty($group_id)) {
            $where[] = ['group_id', '=', $group_id];
        }
        if (!empty($subgroup_id)) {
            $where[] = ['subgroup_id', '=', $subgroup_id];
        }
        if (!empty($item_id)) {
            $where[] = ['item_id', '=', $item_id];
        }
        $where[] = ['warehouses.type', '=', 'Tools'];
        $opening_qty = \App\Opening::leftJoin('warehouses', 'warehouses.id', '=', 'openings.warehouse_id')
            ->where($where)->sum('opening_quantity');

        $opening_qty = isset($opening_qty) ? $opening_qty : 0;

        $where = [];
        $where[] = ['branch_id', '=', $branch_id];
        if (!empty($warehouse_id)) {
            $where[] = ['warehouse_to_id', '=', $warehouse_id];
        }
        if (!empty($group_id)) {
            $where[] = ['group_id', '=', $group_id];
        }
        if (!empty($subgroup_id)) {
            $where[] = ['subgroup_id', '=', $subgroup_id];
        }
        if (!empty($item_id)) {
            $where[] = ['item_id', '=', $item_id];
        }

        $tsdelivery_qty = \App\TSChallanDetails::where($where)->sum('delivered_quantity');
        $tsdelivery_qty = isset($tsdelivery_qty) ? $tsdelivery_qty : 0;

        $where = [];
        $where[] = ['branch_id', '=', $branch_id];
        if (!empty($warehouse_id)) {
            $where[] = ['warehouse_id', '=', $warehouse_id];
        }
        if (!empty($group_id)) {
            $where[] = ['group_id', '=', $group_id];
        }
        if (!empty($subgroup_id)) {
            $where[] = ['subgroup_id', '=', $subgroup_id];
        }
        if (!empty($item_id)) {
            $where[] = ['item_id', '=', $item_id];
        }

        $where[] = ['status', '=', 'Issued'];

        $tsitemissue_qty = \App\TSItemIssueDetails::where($where)->sum('quantity');
        $tsitemissue_qty = isset($tsitemissue_qty) ? $tsitemissue_qty : 0;

        $where = [];
        $where[] = ['demageitems.branch_id', '=', $branch_id];
        if (!empty($warehouse_id)) {
            $where[] = ['warehouse_id', '=', $warehouse_id];
        }
        if (!empty($group_id)) {
            $where[] = ['group_id', '=', $group_id];
        }
        if (!empty($subgroup_id)) {
            $where[] = ['subgroup_id', '=', $subgroup_id];
        }
        if (!empty($item_id)) {
            $where[] = ['item_id', '=', $item_id];
        }
        $where[] = ['warehouses.type', '=', 'Tools'];
        $where[] = ['status', '=', 'Approved'];
        $demage_qty = \App\DemageItem::leftJoin('warehouses', 'warehouses.id', '=', 'demageitems.warehouse_id')
            ->where($where)->sum('quantity');

        $demage_qty = isset($demage_qty) ? $demage_qty : 0;

        $where = [];
        $where[] = ['branch_id', '=', $branch_id];
        if (!empty($warehouse_id)) {
            $where[] = ['warehouse_id', '=', $warehouse_id];
        }
        if (!empty($group_id)) {
            $where[] = ['group_id', '=', $group_id];
        }
        if (!empty($subgroup_id)) {
            $where[] = ['subgroup_id', '=', $subgroup_id];
        }
        if (!empty($item_id)) {
            $where[] = ['item_id', '=', $item_id];
        }

        $return_qty = \App\TSItemReturnDetails::where($where)->sum('return_quantity');
        $return_qty = isset($return_qty) ? $return_qty : 0;

        $balance = ($opening_qty + $tsdelivery_qty + $return_qty) - ($tsitemissue_qty + $demage_qty);
        return $balance;
    }
}