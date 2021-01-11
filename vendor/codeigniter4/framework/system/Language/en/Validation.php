<?php

/**
 * Validation language strings.
 *
 * @package    CodeIgniter
 * @author     CodeIgniter Dev Team
 * @copyright  2019-2020 CodeIgniter Foundation
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link       https://codeigniter.com
 * @since      Version 4.0.0
 * @filesource
 *
 * @codeCoverageIgnore
 */

return [
	// Core Messages
   'noRuleSets'            => 'Tidak ada kumpulan aturan yang ditentukan dalam konfigurasi Validasi.',
   'ruleNotFound'          => '{0} bukan aturan yang valid.',
   'groupNotFound'         => '{0} bukan grup aturan validasi.',
   'groupNotArray'         => '{0} grup aturan harus berupa larik.',
   'invalidTemplate'       => '{0} bukan template Validasi yang valid.',

	// Rule Messages
   'alpha'                 => 'Bidang {field} hanya boleh berisi karakter alfabet.',
   'alpha_dash'            => 'Bidang {field} hanya boleh berisi karakter alfanumerik, garis bawah, dan tanda hubung.',
   'alpha_numeric'         => 'Bidang {field} hanya boleh berisi karakter alfanumerik.',
   'alpha_numeric_punct'   => 'Bidang {field} hanya boleh berisi karakter alfanumerik, spasi, dan ~! # $% & * - _ + = | :. karakter.',
   'alpha_numeric_space'   => 'Bidang {field} hanya boleh berisi karakter alfanumerik dan spasi.',
   'alpha_space'           => 'Bidang {field} hanya boleh berisi karakter alfabet dan spasi.',
   'decimal'               => 'Bidang {field} harus berisi angka desimal.',
   'differs'               => 'Bidang {bidang} harus berbeda dari bidang {param}.',
   'equals'                => 'Bidang {field} harus sama persis: {param}.',
   'exact_length'          => 'Bidang {field} harus sama persis dengan {param} karakter.',
   'greater_than'          => 'Bidang {field} harus berisi angka yang lebih besar dari {param}.',
   'greater_than_equal_to' => 'Bidang {field} harus berisi angka yang lebih besar dari atau sama dengan {param}.',
   'hex'                   => 'Bidang {field} hanya boleh berisi karakter heksadesimal.',
   'in_list'               => 'Bidang {field} harus salah satu dari: {param}.',
   'integer'               => 'Bidang {field} harus berisi bilangan bulat.',
   'is_natural'            => 'Bidang {field} hanya boleh berisi angka.',
   'is_natural_no_zero'    => 'Bidang {field} hanya boleh berisi angka dan harus lebih besar dari nol.',
   'is_not_unique'         => 'Bidang {field} harus berisi nilai yang sudah ada sebelumnya dalam database.',
   'is_unique'             => 'Bidang {field} harus berisi nilai unik.',
   'less_than'             => 'Bidang {field} harus berisi angka kurang dari {param}.',
   'less_than_equal_to'    => 'Bidang {field} harus berisi angka kurang dari atau sama dengan {param}.',
   'matches'               => 'Bidang {field} tidak cocok dengan bidang {param}.',
   'max_length'            => 'Bidang {field} tidak boleh melebihi {param} karakter.',
   'min_length'            => 'Bidang {field} setidaknya harus terdiri dari {param} karakter.',
   'not_equals'            => 'Bidang {field} tidak boleh: {param}.',
   'numeric'               => 'Bidang {field} harus berisi angka saja.',
   'regex_match'           => 'Format kolom {field} salah.',
   'required'              => 'Bidang {field} harus diisi.',
   'required_with'         => 'Bidang {field} harus diisi jika {param} ada.',
   'required_without'      => 'Bidang {field} harus diisi jika {param} tidak ada.',
   'string'                => 'Bidang {field} harus berupa string yang valid.',
   'timezone'              => 'Bidang {field} harus berupa zona waktu yang valid.',
   'valid_base64'          => 'Bidang {field} harus berupa string base64 yang valid.',
   'valid_email'           => 'Bidang {field} harus berisi alamat email yang valid.',
   'valid_emails'          => 'Bidang {field} harus berisi semua alamat email yang valid.',
   'valid_ip'              => 'Bidang {field} harus berisi IP yang valid.',
   'valid_url'             => 'Bidang {field} harus berisi URL yang valid.',
   'valid_date'            => 'Bidang {field} harus berisi tanggal yang valid.',

	// Credit Cards
   'valid_cc_num'          => '{field} tampaknya bukan nomor kartu kredit yang valid.',

	// Files
   'uploaded'              => '{field} bukan file unggahan yang valid.',
   'max_size'              => '{field} file terlalu besar.',
   'is_image'              => '{field} bukan file gambar unggahan yang valid.',
   'mime_in'               => '{field} tidak memiliki jenis pantomim yang valid.',
   'ext_in'                => '{field} tidak memiliki ekstensi file yang valid.',
   'max_dims'              => '{field} bisa jadi bukan gambar, atau terlalu lebar atau tinggi.',
];

// return [
// 	// Core Messages
//    'noRuleSets'            => 'No rulesets specified in Validation configuration.',
//    'ruleNotFound'          => '{0} is not a valid rule.',
//    'groupNotFound'         => '{0} is not a validation rules group.',
//    'groupNotArray'         => '{0} rule group must be an array.',
//    'invalidTemplate'       => '{0} is not a valid Validation template.',

// 	// Rule Messages
//    'alpha'                 => 'The {field} field may only contain alphabetical characters.',
//    'alpha_dash'            => 'The {field} field may only contain alphanumeric, underscore, and dash characters.',
//    'alpha_numeric'         => 'The {field} field may only contain alphanumeric characters.',
//    'alpha_numeric_punct'   => 'The {field} field may contain only alphanumeric characters, spaces, and  ~ ! # $ % & * - _ + = | : . characters.',
//    'alpha_numeric_space'   => 'The {field} field may only contain alphanumeric and space characters.',
//    'alpha_space'           => 'The {field} field may only contain alphabetical characters and spaces.',
//    'decimal'               => 'The {field} field must contain a decimal number.',
//    'differs'               => 'The {field} field must differ from the {param} field.',
//    'equals'                => 'The {field} field must be exactly: {param}.',
//    'exact_length'          => 'The {field} field must be exactly {param} characters in length.',
//    'greater_than'          => 'The {field} field must contain a number greater than {param}.',
//    'greater_than_equal_to' => 'The {field} field must contain a number greater than or equal to {param}.',
//    'hex'                   => 'The {field} field may only contain hexidecimal characters.',
//    'in_list'               => 'The {field} field must be one of: {param}.',
//    'integer'               => 'The {field} field must contain an integer.',
//    'is_natural'            => 'The {field} field must only contain digits.',
//    'is_natural_no_zero'    => 'The {field} field must only contain digits and must be greater than zero.',
//    'is_not_unique'         => 'The {field} field must contain a previously existing value in the database.',
//    'is_unique'             => 'The {field} field must contain a unique value.',
//    'less_than'             => 'The {field} field must contain a number less than {param}.',
//    'less_than_equal_to'    => 'The {field} field must contain a number less than or equal to {param}.',
//    'matches'               => 'The {field} field does not match the {param} field.',
//    'max_length'            => 'The {field} field cannot exceed {param} characters in length.',
//    'min_length'            => 'The {field} field must be at least {param} characters in length.',
//    'not_equals'            => 'The {field} field cannot be: {param}.',
//    'numeric'               => 'The {field} field must contain only numbers.',
//    'regex_match'           => 'The {field} field is not in the correct format.',
//    'required'              => 'The {field} field is required.',
//    'required_with'         => 'The {field} field is required when {param} is present.',
//    'required_without'      => 'The {field} field is required when {param} is not present.',
//    'string'                => 'The {field} field must be a valid string.',
//    'timezone'              => 'The {field} field must be a valid timezone.',
//    'valid_base64'          => 'The {field} field must be a valid base64 string.',
//    'valid_email'           => 'The {field} field must contain a valid email address.',
//    'valid_emails'          => 'The {field} field must contain all valid email addresses.',
//    'valid_ip'              => 'The {field} field must contain a valid IP.',
//    'valid_url'             => 'The {field} field must contain a valid URL.',
//    'valid_date'            => 'The {field} field must contain a valid date.',

// 	// Credit Cards
//    'valid_cc_num'          => '{field} does not appear to be a valid credit card number.',

// 	// Files
//    'uploaded'              => '{field} is not a valid uploaded file.',
//    'max_size'              => '{field} is too large of a file.',
//    'is_image'              => '{field} is not a valid, uploaded image file.',
//    'mime_in'               => '{field} does not have a valid mime type.',
//    'ext_in'                => '{field} does not have a valid file extension.',
//    'max_dims'              => '{field} is either not an image, or it is too wide or tall.',
// ];
