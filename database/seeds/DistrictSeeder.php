<?php

use Illuminate\Database\Seeder;
use App\District;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('districts')->insert([
        [
            'name' => 'Ahemdabad',
            'lat' => '23.0204978',
            'lng' => '72.4396539',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
        ],
        [
            'name' => 'Amreli',
            'lat' => '21.6015',
            'lng' => '71.2204',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
        ],
        [
            'name' => 'Anand',
            'lat' => '22.4193784',
            'lng' => '72.502636',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
        ],
        [
            'name' => 'Aravalli',
            'lat' => '23.5205 ',
            'lng' => '73.3709',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
        ],
        [
            'name' => 'Banaskantha',
            'lat' => '24.3455',
            'lng' => '71.7622',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
        ],
        [
            'name' => 'Bharuch',
            'lat' => '21.7278383',
            'lng' => '72.9686102',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
        ],
        [
            'name' => 'Bhavnagar',
            'lat' => '21.7639097 ',
            'lng' => '72.1198864',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
        ],
        [
            'name' => 'Botad',
            'lat' => '22.172101',
            'lng' => '71.6420345',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
        ],
        [
            'name' => 'Chhota Udaipur',
            'lat' => '22.3084716',
            'lng' => '73.9930806',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
        ],
        [
            'name' => 'Dahod',
            'lat' => '22.8494756',
            'lng' => '74.2175589',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
        ],
        [
            'name' => 'Dang',
            'lat' => '20.8247891',
            'lng' => '73.4264755',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
        ],
        [
            'name' => 'Devbhoomi Dwarka',
            'lat' => '22.1609866',
            'lng' => '69.1558358',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
        ],
        [
            'name' => 'Devbhoomi Dwarka',
            'lat' => '22.1609866',
            'lng' => '69.1558358',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
        ],
        [
            'name' => 'Gandhinagar',
            'lat' => '23.220852',
            'lng' => '72.575507',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
        ],
        [
            'name' => 'Gir Somnath',
            'lat' => '20.9924021',
            'lng' => '70.4515555',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
        ],[
            'name' => 'Jamnagar',
            'lat' => '22.474474',
            'lng' => '69.9883724',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
        ],[
            'name' => 'Junagadh',
            'lat' => '21.5307113',
            'lng' => '70.3675688',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
        ],
        [
            'name' => 'Kutch',
            'lat' => '23.7108804',
            'lng' => '68.8013801',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
        ],
        [
            'name' => 'Kheda',
            'lat' => '22.7502861',
            'lng' => '72.6764231',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
        ],
        [
            'name' => 'Mahisagar',
            'lat' => '23.1912283',
            'lng' => '73.3558213',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
        ],
        [
            'name' => 'Mehsana',
            'lat' => '23.5899467',
            'lng' => '72.3479592',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
        ],
        [
            'name' => 'Morbi',
            'lat' => '22.8252',
            'lng' => '70.8491',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
],
[
            'name' => 'Narmada',
            'lat' => '21.719946',
            'lng' => '73.6',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
],
[
            'name' => 'Navsari',
            'lat' => '20.9467',
            'lng' => '72.9520',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
],
[
            'name' => 'Panchmahal',
            'lat' => '22.843740',
            'lng' => '74.238777',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
],
[
            'name' => 'Patan',
            'lat' => '23.849325',
            'lng' => '72.126625',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
],
[
            'name' => 'Porbandar',
            'lat' => '21.639151',
            'lng' => '69.612160',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
],
[
    'name' => 'Rajkot',
    'lat' => '22.2736308',
    'lng' => '70.7512552',
    'infected' =>'0',
    'cured' => '0',
    'died' => '0'
],
[
            'name' => 'Sabarkantha',
            'lat' => '23.624500',
            'lng' => '73.190338',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
],
[
    'name' => 'Surat',
    'lat' => '21.1594627',
    'lng' => '72.6822074',
    'infected' =>'0',
    'cured' => '0',
    'died' => '0'
],
[
            'name' => 'Surendranagar',
            'lat' => '22.7739',
            'lng' => '71.6673',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
],
[
            'name' => 'Tapi',
            'lat' => '21.2789',
            'lng' => '73.6065',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
],
[
            'name' => 'Valsad',
            'lat' => '20.5992',
            'lng' => '72.9342',
            'infected' =>'0',
            'cured' => '0',
            'died' => '0'
],
        
        
    
        ]);
    }
}
