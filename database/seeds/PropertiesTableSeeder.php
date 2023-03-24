<?php

use Illuminate\Database\Seeder;

class PropertiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('properties')->delete();
        
        \DB::table('properties')->insert(array (
            0 => 
            array (
                'id' => 9,
                'property_category_id' => 2,
                'name' => 'Psi a kočky',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 10,
                'property_category_id' => 2,
                'name' => 'Hlodavci a drobná zvířata',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 11,
                'property_category_id' => 2,
                'name' => 'Ptáci',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 12,
                'property_category_id' => 2,
                'name' => 'Hospodářská zvířata',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 13,
                'property_category_id' => 2,
                'name' => 'Plazi a obojživelníci',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 14,
                'property_category_id' => 2,
                'name' => 'Koně',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 15,
                'property_category_id' => 3,
                'name' => 'Ortopedie',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 16,
                'property_category_id' => 3,
                'name' => 'Všeobecná prevence a léčba',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 17,
                'property_category_id' => 3,
                'name' => 'Kardiologie',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 18,
                'property_category_id' => 3,
                'name' => 'Laboratoř',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 25,
                'property_category_id' => 3,
                'name' => 'Urologie',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 26,
                'property_category_id' => 3,
                'name' => 'Gastroenterologie',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 27,
                'property_category_id' => 1,
                'name' => 'RTG',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 30,
                'property_category_id' => 3,
                'name' => 'Asistovaná reprodukce',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 32,
                'property_category_id' => 3,
                'name' => 'Dermatologie',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 33,
                'property_category_id' => 3,
                'name' => 'Neurologie',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 34,
                'property_category_id' => 3,
                'name' => 'Oftalmologie',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 35,
                'property_category_id' => 3,
                'name' => 'Onkologie',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 41,
                'property_category_id' => 1,
                'name' => 'Operační sál',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 45,
                'property_category_id' => 2,
                'name' => 'Exotická zvířata',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 46,
                'property_category_id' => 3,
                'name' => 'Respirace',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 95,
                'property_category_id' => 1,
                'name' => 'EKG',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 96,
                'property_category_id' => 3,
                'name' => 'Interní medicína',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 97,
                'property_category_id' => 3,
                'name' => 'Homeopatie',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 98,
                'property_category_id' => 3,
                'name' => 'Sonografie',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 99,
                'property_category_id' => 3,
                'name' => 'Endokrinologie',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 100,
                'property_category_id' => 3,
                'name' => 'Chirurgie',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 101,
                'property_category_id' => 3,
                'name' => 'Odstranění zubního kamene ultrazvukem',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 102,
                'property_category_id' => 1,
                'name' => 'USG',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 103,
                'property_category_id' => 1,
                'name' => 'Narkotizační přístroj',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 104,
                'property_category_id' => 1,
                'name' => 'Mikroskop',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 105,
                'property_category_id' => 1,
                'name' => 'Horkovzdušný sterilizátor',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 106,
                'property_category_id' => 1,
                'name' => 'Čtečka mikročipů',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 107,
                'property_category_id' => 1,
                'name' => 'Halogenový set',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 108,
                'property_category_id' => 1,
                'name' => 'Refraktometr',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 109,
                'property_category_id' => 1,
                'name' => 'Glukometr',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 110,
                'property_category_id' => 1,
                'name' => 'Sedimentační souprava',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 111,
                'property_category_id' => 1,
                'name' => 'Výjezdové vozidlo',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 112,
                'property_category_id' => 3,
                'name' => 'Stomatologie',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 113,
                'property_category_id' => 3,
                'name' => 'Gynekologie',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 114,
                'property_category_id' => 3,
                'name' => 'Andrologie',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 115,
                'property_category_id' => 3,
                'name' => 'Výjezdy k pacientům',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 116,
                'property_category_id' => 3,
                'name' => 'Biochemie',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 117,
                'property_category_id' => 3,
                'name' => 'Akutní péče',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 118,
                'property_category_id' => 3,
                'name' => 'RTG',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 120,
                'property_category_id' => 1,
                'name' => 'Laboratoř',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 121,
                'property_category_id' => 1,
                'name' => 'Otoskop',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 122,
                'property_category_id' => 1,
                'name' => 'Laryngoskop',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 130,
                'property_category_id' => 1,
                'name' => 'CT',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 131,
                'property_category_id' => 3,
                'name' => 'Nonstop pohotovost',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 132,
                'property_category_id' => 1,
                'name' => 'Psí salón',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 133,
                'property_category_id' => 1,
                'name' => 'Oftalmolaryngoskop',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 134,
                'property_category_id' => 1,
                'name' => 'Zubní vrtačka',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 135,
                'property_category_id' => 3,
                'name' => 'Čipování',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 136,
                'property_category_id' => 1,
                'name' => 'Magnetická rezonance',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 137,
                'property_category_id' => 1,
                'name' => 'Rehabilitační bazén',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 138,
                'property_category_id' => 1,
                'name' => 'JIP',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 139,
                'property_category_id' => 3,
                'name' => 'Medicína fretek',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 140,
                'property_category_id' => 3,
                'name' => 'Rehabilitace',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 141,
                'property_category_id' => 3,
                'name' => 'Fyzioterapie',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 142,
                'property_category_id' => 3,
                'name' => 'Neurochirurgie',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 144,
                'property_category_id' => 1,
                'name' => 'Biochemický analyzátor',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 145,
                'property_category_id' => 1,
                'name' => 'Cytologický mikroskop',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 146,
                'property_category_id' => 3,
                'name' => 'Vystavování europasů',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 147,
                'property_category_id' => 3,
                'name' => 'Vakcinace',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 148,
                'property_category_id' => 3,
                'name' => 'Odčervování',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 149,
                'property_category_id' => 3,
                'name' => 'Akutní medicína',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 150,
                'property_category_id' => 3,
                'name' => 'Anesteziologie',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 151,
                'property_category_id' => 3,
                'name' => 'Čínská medicína',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 152,
                'property_category_id' => 3,
                'name' => 'Endoskopie',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 153,
                'property_category_id' => 3,
                'name' => 'Felinní medicína',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 154,
                'property_category_id' => 3,
                'name' => 'Hospitalizace',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 155,
                'property_category_id' => 3,
                'name' => 'Počítačová tomografie',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 156,
                'property_category_id' => 3,
                'name' => 'Respiratorní choroby',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 157,
                'property_category_id' => 3,
                'name' => 'Traumatologie',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 158,
                'property_category_id' => 3,
                'name' => 'Všeobecná medicína',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 159,
                'property_category_id' => 3,
                'name' => 'Výcvik psů a štěňat',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 160,
                'property_category_id' => 3,
                'name' => 'Výživové poradenství',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 161,
                'property_category_id' => 1,
                'name' => 'Defibrilátor',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 162,
                'property_category_id' => 1,
                'name' => 'Endoskop',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 163,
                'property_category_id' => 1,
                'name' => 'Oddělené čekárny',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 164,
                'property_category_id' => 1,
                'name' => 'Skiaskop',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 165,
                'property_category_id' => 1,
                'name' => 'Ultrazvuk na čištění zubů',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 167,
                'property_category_id' => 3,
                'name' => 'Stříhání a úprava psů',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 168,
                'property_category_id' => 3,
                'name' => 'Pohotovost',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 218,
                'property_category_id' => 1,
                'name' => 'C - rameno',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 219,
                'property_category_id' => 1,
                'name' => 'Plicní ventilátor',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 220,
                'property_category_id' => 1,
                'name' => 'Caiman',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 221,
                'property_category_id' => 3,
                'name' => 'CT',
                'is_approved' => 1,
                'show_on_registration' => 1,
                'show_in_search' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 222,
                'property_category_id' => 3,
                'name' => 'Celostní medicína',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 223,
                'property_category_id' => 3,
                'name' => 'Gerontologie',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 224,
                'property_category_id' => 3,
                'name' => 'Magnetoterapie',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 225,
                'property_category_id' => 3,
                'name' => 'Dialýza',
                'is_approved' => 1,
                'show_on_registration' => 0,
                'show_in_search' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}