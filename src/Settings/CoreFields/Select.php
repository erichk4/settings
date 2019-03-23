<?php
/**
 * Select field class
 */

namespace underDEV\Utils\Settings\CoreFields;

class Select {

	/**
	 * Select field
	 * You can define `multiple` addon to make it multiple
	 * If you want to use Selectize.js, set `pretty` addon to true
	 * @param  Field $field Field instance
	 * @return void
	 */
	public function input( $field ) {

		$multiple = $field->addon( 'multiple' ) ? 'multiple="multiple"' : '';
		$name     = $field->addon( 'multiple' ) ? $field->input_name() . '[]' : $field->input_name();
		$pretty   = $field->addon( 'pretty' ) ? 'pretty-select' : '';

		echo '<select ' . $multiple . ' name="' . $name . '" id="' . $field->input_id() . '" class="' . $pretty . '">';

			foreach ( $field->addon( 'options' ) as $option_value => $option_label ) {

				$selected = in_array( $option_value, (array) $field->value() ) ? 'selected="selected"' : '';
				echo '<option value="' . $option_value . '" ' . $selected . '>' . $option_label . '</option>';

			}

		echo '</select>';

	}

	/**
	 * Sanitize select value
	 * Uses sanitize_text_field()
	 * @param  mixed   $value saved value
	 * @return mixed          sanitized value
	 */
	public function sanitize( $value ) {

		if ( is_array( $value ) ) {

			foreach ( $value as $i => $v ) {
				$value[ $i ] = sanitize_text_field( $v );
			}

		} else {
			$value = sanitize_text_field( $value );
		}

		return $value;

	}
	
	
	/**
 * Get Countries (WordPress)
 * 
 * Get translated Countries in WordPress. Runs output through a 
 * filter before returning to allow for customization through third
 * party plugins and themes, or for select removal/modification/addition 
 * of countries for whatever reason.
 * 
 * Function Usage: 
 * search and replace all instances of `example` and replace it with your 
 * theme or plugin's textdomain (example:twentyseventeen). Then call as:
 * $countries = example_get_countries();
 * 
 * Filter Usage:
 * function example_countries_filter( $countries ) {
 * 		// add a translatable country:
 * 		$countries['XX'] = __( 'Country Name', 'example' );
 * 		// remove a country:
 * 		unset( $countries['YY'] );
 *		// modify a country:
 *		$countries['US'] = __( 'America, F*ck Yeah.', 'example' );
 * 		// always return countries!
 * 		return $countries;
 * }
 * add_filter( 'example_countries_filters', 'example_countries_filter', 10 );
 * 
 * @link https://developer.wordpress.org/themes/functionality/internationalization/
 * @link https://developer.wordpress.org/plugins/internationalization/how-to-internationalize-your-plugin/
 * @link https://developer.wordpress.org/reference/functions/__/
 * @link https://developer.wordpress.org/plugins/hooks/filters/
 * @link https://developer.wordpress.org/reference/functions/apply_filters/
 * @link https://developer.wordpress.org/reference/functions/add_filter/
 * 
 * @return array Countries as Country code => Country name
 */
function get_countries() {

	$countries = array(
		'AF' => __( 'Afghanistan', 'example' ), 
		'AL' => __( 'Albania', 'example' ), 
		'DZ' => __( 'Algeria', 'example' ), 
		'AS' => __( 'American Samoa', 'example' ), 
		'AD' => __( 'Andorra', 'example' ), 
		'AO' => __( 'Angola', 'example' ), 
		'AI' => __( 'Anguilla', 'example' ), 
		'AQ' => __( 'Antarctica', 'example' ), 
		'AG' => __( 'Antigua and Barbuda', 'example' ), 
		'AR' => __( 'Argentina', 'example' ), 
		'AM' => __( 'Armenia', 'example' ), 
		'AW' => __( 'Aruba', 'example' ), 
		'AU' => __( 'Australia', 'example' ), 
		'AT' => __( 'Austria', 'example' ), 
		'AZ' => __( 'Azerbaijan', 'example' ), 
		'BS' => __( 'Bahamas', 'example' ), 
		'BH' => __( 'Bahrain', 'example' ), 
		'BD' => __( 'Bangladesh', 'example' ), 
		'BB' => __( 'Barbados', 'example' ), 
		'BY' => __( 'Belarus', 'example' ), 
		'BE' => __( 'Belgium', 'example' ), 
		'BZ' => __( 'Belize', 'example' ), 
		'BJ' => __( 'Benin', 'example' ), 
		'BM' => __( 'Bermuda', 'example' ), 
		'BT' => __( 'Bhutan', 'example' ), 
		'BO' => __( 'Bolivia', 'example' ), 
		'BA' => __( 'Bosnia and Herzegovina', 'example' ), 
		'BW' => __( 'Botswana', 'example' ), 
		'BV' => __( 'Bouvet Island', 'example' ), 
		'BR' => __( 'Brazil', 'example' ), 
		'BQ' => __( 'British Antarctic Territory', 'example' ), 
		'IO' => __( 'British Indian Ocean Territory', 'example' ), 
		'VG' => __( 'British Virgin Islands', 'example' ), 
		'BN' => __( 'Brunei', 'example' ), 
		'BG' => __( 'Bulgaria', 'example' ), 
		'BF' => __( 'Burkina Faso', 'example' ), 
		'BI' => __( 'Burundi', 'example' ), 
		'KH' => __( 'Cambodia', 'example' ), 
		'CM' => __( 'Cameroon', 'example' ), 
		'CA' => __( 'Canada', 'example' ), 
		'CT' => __( 'Canton and Enderbury Islands', 'example' ), 
		'CV' => __( 'Cape Verde', 'example' ), 
		'KY' => __( 'Cayman Islands', 'example' ), 
		'CF' => __( 'Central African Republic', 'example' ), 
		'TD' => __( 'Chad', 'example' ), 
		'CL' => __( 'Chile', 'example' ), 
		'CN' => __( 'China', 'example' ), 
		'CX' => __( 'Christmas Island', 'example' ), 
		'CC' => __( 'Cocos [Keeling] Islands', 'example' ), 
		'CO' => __( 'Colombia', 'example' ), 
		'KM' => __( 'Comoros', 'example' ), 
		'CG' => __( 'Congo - Brazzaville', 'example' ), 
		'CD' => __( 'Congo - Kinshasa', 'example' ), 
		'CK' => __( 'Cook Islands', 'example' ), 
		'CR' => __( 'Costa Rica', 'example' ), 
		'HR' => __( 'Croatia', 'example' ), 
		'CU' => __( 'Cuba', 'example' ), 
		'CY' => __( 'Cyprus', 'example' ), 
		'CZ' => __( 'Czech Republic', 'example' ), 
		'CI' => __( 'Côte d’Ivoire', 'example' ), 
		'DK' => __( 'Denmark', 'example' ), 
		'DJ' => __( 'Djibouti', 'example' ), 
		'DM' => __( 'Dominica', 'example' ), 
		'DO' => __( 'Dominican Republic', 'example' ), 
		'NQ' => __( 'Dronning Maud Land', 'example' ), 
		'DD' => __( 'East Germany', 'example' ), 
		'EC' => __( 'Ecuador', 'example' ), 
		'EG' => __( 'Egypt', 'example' ), 
		'SV' => __( 'El Salvador', 'example' ), 
		'GQ' => __( 'Equatorial Guinea', 'example' ), 
		'ER' => __( 'Eritrea', 'example' ), 
		'EE' => __( 'Estonia', 'example' ), 
		'ET' => __( 'Ethiopia', 'example' ), 
		'FK' => __( 'Falkland Islands', 'example' ), 
		'FO' => __( 'Faroe Islands', 'example' ), 
		'FJ' => __( 'Fiji', 'example' ), 
		'FI' => __( 'Finland', 'example' ), 
		'FR' => __( 'France', 'example' ), 
		'GF' => __( 'French Guiana', 'example' ), 
		'PF' => __( 'French Polynesia', 'example' ), 
		'TF' => __( 'French Southern Territories', 'example' ), 
		'FQ' => __( 'French Southern and Antarctic Territories', 'example' ), 
		'GA' => __( 'Gabon', 'example' ), 
		'GM' => __( 'Gambia', 'example' ), 
		'GE' => __( 'Georgia', 'example' ), 
		'DE' => __( 'Germany', 'example' ), 
		'GH' => __( 'Ghana', 'example' ), 
		'GI' => __( 'Gibraltar', 'example' ), 
		'GR' => __( 'Greece', 'example' ), 
		'GL' => __( 'Greenland', 'example' ), 
		'GD' => __( 'Grenada', 'example' ), 
		'GP' => __( 'Guadeloupe', 'example' ), 
		'GU' => __( 'Guam', 'example' ), 
		'GT' => __( 'Guatemala', 'example' ), 
		'GG' => __( 'Guernsey', 'example' ), 
		'GN' => __( 'Guinea', 'example' ), 
		'GW' => __( 'Guinea-Bissau', 'example' ), 
		'GY' => __( 'Guyana', 'example' ), 
		'HT' => __( 'Haiti', 'example' ), 
		'HM' => __( 'Heard Island and McDonald Islands', 'example' ), 
		'HN' => __( 'Honduras', 'example' ), 
		'HK' => __( 'Hong Kong SAR China', 'example' ), 
		'HU' => __( 'Hungary', 'example' ), 
		'IS' => __( 'Iceland', 'example' ), 
		'IN' => __( 'India', 'example' ), 
		'ID' => __( 'Indonesia', 'example' ), 
		'IR' => __( 'Iran', 'example' ), 
		'IQ' => __( 'Iraq', 'example' ), 
		'IE' => __( 'Ireland', 'example' ), 
		'IM' => __( 'Isle of Man', 'example' ), 
		'IL' => __( 'Israel', 'example' ), 
		'IT' => __( 'Italy', 'example' ), 
		'JM' => __( 'Jamaica', 'example' ), 
		'JP' => __( 'Japan', 'example' ), 
		'JE' => __( 'Jersey', 'example' ), 
		'JT' => __( 'Johnston Island', 'example' ), 
		'JO' => __( 'Jordan', 'example' ), 
		'KZ' => __( 'Kazakhstan', 'example' ), 
		'KE' => __( 'Kenya', 'example' ), 
		'KI' => __( 'Kiribati', 'example' ), 
		'KW' => __( 'Kuwait', 'example' ), 
		'KG' => __( 'Kyrgyzstan', 'example' ), 
		'LA' => __( 'Laos', 'example' ), 
		'LV' => __( 'Latvia', 'example' ), 
		'LB' => __( 'Lebanon', 'example' ), 
		'LS' => __( 'Lesotho', 'example' ), 
		'LR' => __( 'Liberia', 'example' ), 
		'LY' => __( 'Libya', 'example' ), 
		'LI' => __( 'Liechtenstein', 'example' ), 
		'LT' => __( 'Lithuania', 'example' ), 
		'LU' => __( 'Luxembourg', 'example' ), 
		'MO' => __( 'Macau SAR China', 'example' ), 
		'MK' => __( 'Macedonia', 'example' ), 
		'MG' => __( 'Madagascar', 'example' ), 
		'MW' => __( 'Malawi', 'example' ), 
		'MY' => __( 'Malaysia', 'example' ), 
		'MV' => __( 'Maldives', 'example' ), 
		'ML' => __( 'Mali', 'example' ), 
		'MT' => __( 'Malta', 'example' ), 
		'MH' => __( 'Marshall Islands', 'example' ), 
		'MQ' => __( 'Martinique', 'example' ), 
		'MR' => __( 'Mauritania', 'example' ), 
		'MU' => __( 'Mauritius', 'example' ), 
		'YT' => __( 'Mayotte', 'example' ), 
		'FX' => __( 'Metropolitan France', 'example' ), 
		'MX' => __( 'Mexico', 'example' ), 
		'FM' => __( 'Micronesia', 'example' ), 
		'MI' => __( 'Midway Islands', 'example' ), 
		'MD' => __( 'Moldova', 'example' ), 
		'MC' => __( 'Monaco', 'example' ), 
		'MN' => __( 'Mongolia', 'example' ), 
		'ME' => __( 'Montenegro', 'example' ), 
		'MS' => __( 'Montserrat', 'example' ), 
		'MA' => __( 'Morocco', 'example' ), 
		'MZ' => __( 'Mozambique', 'example' ), 
		'MM' => __( 'Myanmar [Burma]', 'example' ), 
		'NA' => __( 'Namibia', 'example' ), 
		'NR' => __( 'Nauru', 'example' ), 
		'NP' => __( 'Nepal', 'example' ), 
		'NL' => __( 'Netherlands', 'example' ), 
		'AN' => __( 'Netherlands Antilles', 'example' ), 
		'NT' => __( 'Neutral Zone', 'example' ), 
		'NC' => __( 'New Caledonia', 'example' ), 
		'NZ' => __( 'New Zealand', 'example' ), 
		'NI' => __( 'Nicaragua', 'example' ), 
		'NE' => __( 'Niger', 'example' ), 
		'NG' => __( 'Nigeria', 'example' ), 
		'NU' => __( 'Niue', 'example' ), 
		'NF' => __( 'Norfolk Island', 'example' ), 
		'KP' => __( 'North Korea', 'example' ), 
		'VD' => __( 'North Vietnam', 'example' ), 
		'MP' => __( 'Northern Mariana Islands', 'example' ), 
		'NO' => __( 'Norway', 'example' ), 
		'OM' => __( 'Oman', 'example' ), 
		'PC' => __( 'Pacific Islands Trust Territory', 'example' ), 
		'PK' => __( 'Pakistan', 'example' ), 
		'PW' => __( 'Palau', 'example' ), 
		'PS' => __( 'Palestinian Territories', 'example' ), 
		'PA' => __( 'Panama', 'example' ), 
		'PZ' => __( 'Panama Canal Zone', 'example' ), 
		'PG' => __( 'Papua New Guinea', 'example' ), 
		'PY' => __( 'Paraguay', 'example' ), 
		'YD' => __( 'People\'s Democratic Republic of Yemen', 'example' ), 
		'PE' => __( 'Peru', 'example' ), 
		'PH' => __( 'Philippines', 'example' ), 
		'PN' => __( 'Pitcairn Islands', 'example' ), 
		'PL' => __( 'Poland', 'example' ), 
		'PT' => __( 'Portugal', 'example' ), 
		'PR' => __( 'Puerto Rico', 'example' ), 
		'QA' => __( 'Qatar', 'example' ), 
		'RO' => __( 'Romania', 'example' ), 
		'RU' => __( 'Russia', 'example' ), 
		'RW' => __( 'Rwanda', 'example' ), 
		'BL' => __( 'Saint Barthélemy', 'example' ), 
		'SH' => __( 'Saint Helena', 'example' ), 
		'KN' => __( 'Saint Kitts and Nevis', 'example' ), 
		'LC' => __( 'Saint Lucia', 'example' ), 
		'MF' => __( 'Saint Martin', 'example' ), 
		'PM' => __( 'Saint Pierre and Miquelon', 'example' ), 
		'VC' => __( 'Saint Vincent and the Grenadines', 'example' ), 
		'WS' => __( 'Samoa', 'example' ), 
		'SM' => __( 'San Marino', 'example' ), 
		'SA' => __( 'Saudi Arabia', 'example' ), 
		'SN' => __( 'Senegal', 'example' ), 
		'RS' => __( 'Serbia', 'example' ), 
		'CS' => __( 'Serbia and Montenegro', 'example' ), 
		'SC' => __( 'Seychelles', 'example' ), 
		'SL' => __( 'Sierra Leone', 'example' ), 
		'SG' => __( 'Singapore', 'example' ), 
		'SK' => __( 'Slovakia', 'example' ), 
		'SI' => __( 'Slovenia', 'example' ), 
		'SB' => __( 'Solomon Islands', 'example' ), 
		'SO' => __( 'Somalia', 'example' ), 
		'ZA' => __( 'South Africa', 'example' ), 
		'GS' => __( 'South Georgia and the South Sandwich Islands', 'example' ), 
		'KR' => __( 'South Korea', 'example' ), 
		'ES' => __( 'Spain', 'example' ), 
		'LK' => __( 'Sri Lanka', 'example' ), 
		'SD' => __( 'Sudan', 'example' ), 
		'SR' => __( 'Suriname', 'example' ), 
		'SJ' => __( 'Svalbard and Jan Mayen', 'example' ), 
		'SZ' => __( 'Swaziland', 'example' ), 
		'SE' => __( 'Sweden', 'example' ), 
		'CH' => __( 'Switzerland', 'example' ), 
		'SY' => __( 'Syria', 'example' ), 
		'ST' => __( 'São Tomé and Príncipe', 'example' ), 
		'TW' => __( 'Taiwan', 'example' ), 
		'TJ' => __( 'Tajikistan', 'example' ), 
		'TZ' => __( 'Tanzania', 'example' ), 
		'TH' => __( 'Thailand', 'example' ), 
		'TL' => __( 'Timor-Leste', 'example' ), 
		'TG' => __( 'Togo', 'example' ), 
		'TK' => __( 'Tokelau', 'example' ), 
		'TO' => __( 'Tonga', 'example' ), 
		'TT' => __( 'Trinidad and Tobago', 'example' ), 
		'TN' => __( 'Tunisia', 'example' ), 
		'TR' => __( 'Turkey', 'example' ), 
		'TM' => __( 'Turkmenistan', 'example' ), 
		'TC' => __( 'Turks and Caicos Islands', 'example' ), 
		'TV' => __( 'Tuvalu', 'example' ), 
		'UM' => __( 'U.S. Minor Outlying Islands', 'example' ), 
		'PU' => __( 'U.S. Miscellaneous Pacific Islands', 'example' ), 
		'VI' => __( 'U.S. Virgin Islands', 'example' ), 
		'UG' => __( 'Uganda', 'example' ), 
		'UA' => __( 'Ukraine', 'example' ), 
		'SU' => __( 'Union of Soviet Socialist Republics', 'example' ), 
		'AE' => __( 'United Arab Emirates', 'example' ), 
		'GB' => __( 'United Kingdom', 'example' ), 
		'US' => __( 'United States', 'example' ), 
		'ZZ' => __( 'Unknown or Invalid Region', 'example' ), 
		'UY' => __( 'Uruguay', 'example' ), 
		'UZ' => __( 'Uzbekistan', 'example' ), 
		'VU' => __( 'Vanuatu', 'example' ), 
		'VA' => __( 'Vatican City', 'example' ), 
		'VE' => __( 'Venezuela', 'example' ), 
		'VN' => __( 'Vietnam', 'example' ), 
		'WK' => __( 'Wake Island', 'example' ), 
		'WF' => __( 'Wallis and Futuna', 'example' ), 
		'EH' => __( 'Western Sahara', 'example' ), 
		'YE' => __( 'Yemen', 'example' ), 
		'ZM' => __( 'Zambia', 'example' ), 
		'ZW' => __( 'Zimbabwe', 'example' ), 
		'AX' => __( 'Åland Islands', 'example' ), 
	);
	
	/**
	 * Filter the countries before returning
	 * 
	 * @param array $countries countries array for filtering
	 */
	$countries = apply_filters( 'example_countries_filters', $countries );

	/**
	 * Return the translated and filtered countries
	 */
	return $countries;
}

}
