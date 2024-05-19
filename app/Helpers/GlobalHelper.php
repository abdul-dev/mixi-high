<?php

use Carbon\Carbon;

function percentageFormatter($amount)
{
    if (empty($amount))
        return '';
    return '%' . ($amount + 0);
}

function amountFormatter($amount)
{
    if (empty($amount))
        return '';
    return '$' . ($amount + 0);
}

function formatNumber($number, $precision = 1)
{
    $abbrevs = ['k', 'M', 'B', 'T'];

    for ($index = count($abbrevs) - 1; $index >= 0; $index--) {
        $divisor = pow(1000, $index + 1);

        if ($number >= $divisor) {
            return round($number / $divisor, $precision) . $abbrevs[$index];
        }
    }

    return number_format($number);
}


function getYesNoLabel($data)
{
    if (!empty($data)) {
        return '<span class="badge badge-success badge-sm">Yes</span>';
    }
    return '<span class="badge badge-secondary badge-sm">No</span>';
}

function isChecked($data)
{
    if (!empty($data)) {
        return 'checked';
    }
    return '';
}

function isSelected($val1, $val2)
{
    if ($val1 == $val2) {
        return "selected";
    }
}

function imageToBase64($image, $folder_name)
{
    if (!empty($image)) {
        $imagePath = "public/uploads/" . $folder_name . '/' . $image;
        return "data:image/png;base64," . base64_encode(file_get_contents($imagePath));
    }
    return '';
}

function getDropdownOptions($args, $multiSelect = false)
{
    if (empty($args['optional'])) {
        $args['optional'] = 0;
    }

    if (empty($args['selected_value'])) {
        $args['selected_value'] = '';
    }

    $column_name = 'name';
    if (!empty($args['column_name'])) {
        $column_name = $args['column_name'];
    }

    $modelName = "\App\Models\\" . $args['model'];
    $data = $modelName::all();
    $optionsHtml = '';

    if ($args['optional'] || empty($data)) {
        $optionsHtml .= "<option value=''>-</option>";
    }

    foreach ($data as $option) {
        $selected = '';

        // Adjust the condition based on whether it's a multi-select or single select
        if (($multiSelect && in_array($option->id, (array)$args['selected_value'])) ||
            (!$multiSelect && $option->id == $args['selected_value'])) {
            $selected = 'selected';
        }

        $optionsHtml .= "<option value='$option->id' $selected>$option[$column_name]</option>";
    }

    return $optionsHtml;
}


function getReadableDateTime($datetimeStr)
{

    if (!empty($datetimeStr)) {
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetimeStr)->format('d/m/Y H:i');
    } else {
        return NULL;
    }
}

function getReadableDate($date)
{

    if (!empty($date)) {
        return Carbon::createFromFormat('Y-m-d', $date)->format('d/m/Y');
    } else {
        return NULL;
    }
}

function getInputDate($date)
{
    return Carbon::parse($date)->format('d, M Y');
}

function getInputDateTime($datetime)
{
    return Carbon::parse($datetime)->format('d, M Y, H:i');
}

function getOrderStatusLabel($status)
{
    if ($status == 'quotation') {
        return '<span class="badge badge-dark badge-sm">Quotation</span>';
    } else if ($status == 'reviewed') {
        return '<span class="badge badge-info badge-sm">Reviewed</span>';
    } else if ($status == 'confirmed') {
        return '<span class="badge badge-success badge-sm">Confirmed</span>';
    } else if ($status == 'processed') {
        return '<span class="badge badge-warning badge-sm">Processed</span>';
    } else if ($status == 'completed') {
        return '<span class="badge badge-success badge-sm">Completed</span>';
    }
    return '<span class="badge badge-secondary badge-sm">Unidentified</span>';
}

function getLoggedInRole()
{
    return session()->get('Role')->code;
}

function get_settings_option($key, $value = null)
{
    $option = \App\Models\Setting::where('key', $key)->first();

    if (!$option) {
        \App\Models\Setting::create(['key' => $key, 'value' => $value]);
        return $value;
    } else {
        return $option->value;
    }
}




