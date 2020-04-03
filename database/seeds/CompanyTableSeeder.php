<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = [
            [
                'name' => 'Plastictecnic Sdn Bhd',
                'phone_no' => '603-89256950',
                'fax_no' => '603-89256955',
                'email' => 'sales@tecnic.com.my',
                'location' => 'Bangi Plant',
                'base' => 'Bangi',
                'state' => 'Selangor',
                'post_code' => '43650',
                'address' => 'Lot 1 Jalan P/2A, Kawasan Perusahaan PKT 1, 43650 Bandar Baru Bangi, Selangor Darul Ehsan, Malaysia'
            ],
            [
                'name' => 'Bangi Plastics Sdn Bhd',
                'phone_no' => '606-7999871',
                'fax_no' => '606-7990016',
                'email' => 'sales@tecnic.com.my',
                'location' => 'Nilai Plant',
                'base' => 'Block A',
                'state' => 'Negeri Sembilan',
                'post_code' => '71800',
                'address' => 'LOT PT. 1804, Nilai Industrial Estate, 71800 Nilai'
            ],
            [
                'name' => 'Bangi Plastics Sdn Bhd',
                'phone_no' => '06-7999871',
                'fax_no' => '606-7990016',
                'email' => 'sales@tecnic.com.my',
                'location' => 'Nilai Plant',
                'base' => 'Block B',
                'state' => 'Negeri Sembilan',
                'post_code' => '71800',
                'address' => 'LOT PT. 1804, Nilai Industrial Estate, 71800 Nilai'
            ]
        ];

        foreach ($company as $company) {
            \App\Company::create($company);
        }
    }
}
