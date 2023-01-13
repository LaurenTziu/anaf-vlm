<?php

/**
 * @return array<string, mixed>
 */
function getInfo(): array
{
    return [
        'general_data' => [
            'tax_identification_number' => 38744563,
            'search_date' => date('Y-m-d'),
            'company_name' => 'ANDALI SOLUTIONS PRO S.R.L.',
            'address' => 'JUD. ARGEŞ, SAT LEREŞTI COM. LEREŞTI, STR. ŞOTCAN, NR.940, ET.PARTER',
            'registration_number' => 'J03/176/2018',
            'phone' => '',
            'fax' => '',
            'postal_code' => '117430',
            'document' => '',
            'registration_status' => 'INREGISTRAT din data 25.01.2018',
            'registration_date' => '2018-01-25',
            'activity_code' => '6201',
            'bank_account' => '',
            'ro_invoice_status' => false,
            'authority_name' => 'Serviciul Fiscal Municipal Câmpulung',
        ],
        'vat_registration' => [
            'status' => false,
            'start_date' => '',
            'stop_date' => '',
            'stop_effective_date' => '',
            'message' => 'nu figureaza in registre ',
        ],
        'vat_at_checkout' => [
            'start_date' => '',
            'stop_date' => '',
            'update_date' => '',
            'publish_date' => '',
            'updated_type' => '',
        ],
        'inactive_state' => [
            'inactivation_date' => '',
            'reactivation_date' => '',
            'publish_date' => '',
            'deletion_date' => '',
            'status' => false,
        ],
        'split_vat' => [
            'start_date' => '',
            'stop_date' => '',
            'status' => false,
        ],
        'hq_address' => [
            'street' => 'Str. Şotcan',
            'no' => '940',
            'city' => 'Sat Lereşti Com. Lereşti',
            'city_code' => '338',
            'county' => 'ARGEŞ',
            'county_code' => '3',
            'county_short' => 'AG',
            'country' => '',
            'details' => '',
            'postalCode' => '117430',
        ],
        'fiscal_address' => [
            'street' => 'Str. Şotcan',
            'no' => '940',
            'city' => 'Sat Lereşti Com. Lereşti',
            'city_code' => '338',
            'county' => 'ARGEŞ',
            'county_code' => '3',
            'county_short' => 'AG',
            'country' => '',
            'details' => '',
            'postalCode' => '117430',
        ],
    ];
}

function getAnafInfo(): array
{
    return [
        'cod' => 200,
        'message' => 'SUCCESS',
        'found' => [
            0 => [
                'date_generale' => [
                    'cui' => 38744563,
                    'data' => date('Y-m-d'),
                    'denumire' => 'ANDALI SOLUTIONS PRO S.R.L.',
                    'adresa' => 'JUD. ARGEŞ, SAT LEREŞTI COM. LEREŞTI, STR. ŞOTCAN, NR.940, ET.PARTER',
                    'nrRegCom' => 'J03/176/2018',
                    'telefon' => '',
                    'fax' => '',
                    'codPostal' => '117430',
                    'act' => '',
                    'stare_inregistrare' => 'INREGISTRAT din data 25.01.2018',
                    'data_inregistrare' => '2018-01-25',
                    'cod_CAEN' => '6201',
                    'iban' => '',
                    'statusRO_e_Factura' => false,
                    'organFiscalCompetent' => 'Serviciul Fiscal Municipal Câmpulung',
                ],
                'inregistrare_scop_Tva' => [
                    'scpTVA' => false,
                    'data_inceput_ScpTVA' => '',
                    'data_sfarsit_ScpTVA' => '',
                    'data_anul_imp_ScpTVA' => '',
                    'mesaj_ScpTVA' => 'nu figureaza in registre ',
                ],
                'inregistrare_RTVAI' => [
                    'dataInceputTvaInc' => '',
                    'dataSfarsitTvaInc' => '',
                    'dataActualizareTvaInc' => '',
                    'dataPublicareTvaInc' => '',
                    'tipActTvaInc' => '',
                    'statusTvaIncasare' => false,
                ],
                'stare_inactiv' => [
                    'dataInactivare' => '',
                    'dataReactivare' => '',
                    'dataPublicare' => '',
                    'dataRadiere' => '',
                    'statusInactivi' => false,
                ],
                'inregistrare_SplitTVA' => [
                    'dataInceputSplitTVA' => '',
                    'dataAnulareSplitTVA' => '',
                    'statusSplitTVA' => false,
                ],
                'adresa_sediu_social' => [
                    'sdenumire_Strada' => 'Str. Şotcan',
                    'snumar_Strada' => '940',
                    'sdenumire_Localitate' => 'Sat Lereşti Com. Lereşti',
                    'scod_Localitate' => '338',
                    'sdenumire_Judet' => 'ARGEŞ',
                    'scod_Judet' => '3',
                    'scod_JudetAuto' => 'AG',
                    'stara' => '',
                    'sdetalii_Adresa' => '',
                    'scod_Postal' => '117430',
                ],
                'adresa_domiciliu_fiscal' => [
                    'ddenumire_Strada' => 'Str. Şotcan',
                    'dnumar_Strada' => '940',
                    'ddenumire_Localitate' => 'Sat Lereşti Com. Lereşti',
                    'dcod_Localitate' => '338',
                    'ddenumire_Judet' => 'ARGEŞ',
                    'dcod_Judet' => '3',
                    'dcod_JudetAuto' => 'AG',
                    'dtara' => '',
                    'ddetalii_Adresa' => '',
                    'dcod_Postal' => '117430',
                ],
            ],
        ],
        'notFound' => [],
    ];
}
