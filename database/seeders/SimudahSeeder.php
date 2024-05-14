<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class SimudahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name' => 'Ketua Badminton',
                'email' => 'badmintonmdp@mhs.mdp.ac.id',
                'role' => 'ketuaMahasiswa',
                'password' => bcrypt('badminton_mdp')
            ],

            [
                'name' => 'Ketua Basket',
                'email' => 'basketmdp@mhs.mdp.ac.id',
                'role' => 'ketuaMahasiswa',
                'password' => bcrypt('basket_mdp')
            ],

            [
                'name' => 'Ketua E-Sport',
                'email' => 'esportmdp@mhs.mdp.ac.id',
                'role' => 'ketuaMahasiswa',
                'password' => bcrypt('esport_mdp')
            ],

            [
                'name' => 'Ketua Himaksi',
                'email' => 'himaksimdp@mhs.mdp.ac.id',
                'role' => 'ketuaMahasiswa',
                'password' => bcrypt('himaksi_mdp')
            ],

            [
                'name' => 'Ketua Himif',
                'email' => 'himifmdp@mhs.mdp.ac.id',
                'role' => 'ketuaMahasiswa',
                'password' => bcrypt('himif_mdp')
            ],

            [
                'name' => 'Ketua Himmi',
                'email' => 'himmimdp@mhs.mdp.ac.id',
                'role' => 'ketuaMahasiswa',
                'password' => bcrypt('himmi_mdp')
            ],

            [
                'name' => 'Ketua Himsi',
                'email' => 'himsimdp@mhs.mdp.ac.id',
                'role' => 'ketuaMahasiswa',
                'password' => bcrypt('himsi_mdp')
            ],

            [
                'name' => 'Ketua Hmte',
                'email' => 'hmtemdp@mhs.mdp.ac.id',
                'role' => 'ketuaMahasiswa',
                'password' => bcrypt('hmte_mdp')
            ],

            [
                'name' => 'Ketua Kosma',
                'email' => 'kosmamdp@mhs.mdp.ac.id',
                'role' => 'ketuaMahasiswa',
                'password' => bcrypt('kosma_mdp')
            ],

            [
                'name' => 'Ketua Ldk',
                'email' => 'ldkmdp@mhs.mdp.ac.id',
                'role' => 'ketuaMahasiswa',
                'password' => bcrypt('ldk_mdp')
            ],

            [
                'name' => 'Ketua Mancom',
                'email' => 'mancommdp@mhs.mdp.ac.id',
                'role' => 'ketuaMahasiswa',
                'password' => bcrypt('mancom_mdp')
            ],

            [
                'name' => 'Ketua Mapala',
                'email' => 'mapalamdp@mhs.mdp.ac.id',
                'role' => 'ketuaMahasiswa',
                'password' => bcrypt('mapala_mdp')
            ],

            [
                'name' => 'Ketua Marching Band',
                'email' => 'mbmdp@mhs.mdp.ac.id',
                'role' => 'ketuaMahasiswa',
                'password' => bcrypt('mb_mdp')
            ],

            [
                'name' => 'Ketua Multimedia',
                'email' => 'mulmedmdp@mhs.mdp.ac.id',
                'role' => 'ketuaMahasiswa',
                'password' => bcrypt('mulmed_mdp')
            ],

            [
                'name' => 'Ketua Paduan Suara',
                'email' => 'padusmdp@mhs.mdp.ac.id',
                'role' => 'ketuaMahasiswa',
                'password' => bcrypt('padus_mdp')
            ],

            [
                'name' => 'Ketua Permadhis',
                'email' => 'permadhismdp@mhs.mdp.ac.id',
                'role' => 'ketuaMahasiswa',
                'password' => bcrypt('permadhis_mdp')
            ],

            [
                'name' => 'Ketua PMK',
                'email' => 'pmkmdp@mhs.mdp.ac.id',
                'role' => 'ketuaMahasiswa',
                'password' => bcrypt('pmk_mdp')
            ],

            [
                'name' => 'Ketua Senat Mahasiswa',
                'email' => 'semamdp@mhs.mdp.ac.id',
                'role' => 'ketuaMahasiswa',
                'password' => bcrypt('sema_mdp')
            ],

            [
                'name' => 'Ketua Band',
                'email' => 'bandmdp@mhs.mdp.ac.id',
                'role' => 'ketuaMahasiswa',
                'password' => bcrypt('bandmdp')
            ],

            [
                'name' => 'Ketua Futsal',
                'email' => 'futsalmdp@mhs.mdp.ac.id',
                'role' => 'ketuaMahasiswa',
                'password' => bcrypt('futsal_mdp')
            ],

            [
                'name' => 'Ketua Programming',
                'email' => 'programmingmdp@mhs.mdp.ac.id',
                'role' => 'ketuaMahasiswa',
                'password' => bcrypt('programming_mdp')
            ],

            [
                'name' => 'Ketua Taekwondo',
                'email' => 'taekwondomdp@mhs.mdp.ac.id',
                'role' => 'ketuaMahasiswa',
                'password' => bcrypt('taekwondo_mdp')
            ],

            [
                'name' => 'Ketua Seni Tari',
                'email' => 'tarimdp@mhs.mdp.ac.id',
                'role' => 'ketuaMahasiswa',
                'password' => bcrypt('tari_mdp')
            ],

            [
                'name' => 'Ketua Volly',
                'email' => 'vollymdp@mhs.mdp.ac.id',
                'role' => 'ketuaMahasiswa',
                'password' => bcrypt('volly_mdp')
            ],

            [
                'name' => 'Pembina Badminton',
                'email' => 'pembinabadminton@mdp.ac.id',
                'role' => 'pembina',
                'password' => bcrypt('pembina_badminton')
            ],

            [
                'name' => 'Pembina Basket',
                'email' => 'pembinabasket@mdp.ac.id',
                'role' => 'pembina',
                'password' => bcrypt('pembina_basket')
            ],

            [
                'name' => 'Pembina E-Sport',
                'email' => 'pembinaesport@mdp.ac.id',
                'role' => 'pembina',
                'password' => bcrypt('pembina_esport')
            ],

            [
                'name' => 'Pembina Himaksi',
                'email' => 'pembinahimaksi@mdp.ac.id',
                'role' => 'pembina',
                'password' => bcrypt('pembina_himaksi')
            ],

            [
                'name' => 'Pembina Himif',
                'email' => 'pembinahimif@mdp.ac.id',
                'role' => 'pembina',
                'password' => bcrypt('pembina_himif')
            ],

            [
                'name' => 'Pembina Himmi',
                'email' => 'pembinahimmi@mdp.ac.id',
                'role' => 'pembina',
                'password' => bcrypt('pembina_himmi')
            ],

            [
                'name' => 'Pembina Himsi',
                'email' => 'pembinahimsi@mdp.ac.id',
                'role' => 'pembina',
                'password' => bcrypt('pembina_himsi')
            ],


            [
                'name' => 'Pembina Hmte',
                'email' => 'pembinahmte@mdp.ac.id',
                'role' => 'pembina',
                'password' => bcrypt('pembina_hmte')
            ],

            [
                'name' => 'Pembina Kosma',
                'email' => 'pembinakosma@mdp.ac.id',
                'role' => 'pembina',
                'password' => bcrypt('pembina_kosma')
            ],

            [
                'name' => 'Pembina LDK',
                'email' => 'pembinaldk@mdp.ac.id',
                'role' => 'pembina',
                'password' => bcrypt('pembina_ldk')
            ],

            [
                'name' => 'Pembina Mancom',
                'email' => 'pembinamancom@mdp.ac.id',
                'role' => 'pembina',
                'password' => bcrypt('pembina_mancom')
            ],

            [
                'name' => 'Pembina Mapala',
                'email' => 'pembinamapala@mdp.ac.id',
                'role' => 'pembina',
                'password' => bcrypt('pembina_mapala')
            ],

            [
                'name' => 'Pembina Marching Band',
                'email' => 'pembinamb@mdp.ac.id',
                'role' => 'pembina',
                'password' => bcrypt('pembina_mb')
            ],

            [
                'name' => 'Pembina Multimedia',
                'email' => 'pembinamulmed@mdp.ac.id',
                'role' => 'pembina',
                'password' => bcrypt('pembina_mulmed')
            ],

            [
                'name' => 'Pembina Paduan Suara',
                'email' => 'pembinapadus@mdp.ac.id',
                'role' => 'pembina',
                'password' => bcrypt('pembina_padus')
            ],

            [
                'name' => 'Pembina Permadhis',
                'email' => 'pembinapermadhis@mdp.ac.id',
                'role' => 'pembina',
                'password' => bcrypt('pembina_permadhis')
            ],

            [
                'name' => 'Pembina PMK',
                'email' => 'pembinapmk@mdp.ac.id',
                'role' => 'pembina',
                'password' => bcrypt('pembina_pmk')
            ],

            [
                'name' => 'Pembina Senat Mahasiswa',
                'email' => 'pembinasema@mdp.ac.id',
                'role' => 'pembina',
                'password' => bcrypt('pembina_sema')
            ],

            [
                'name' => 'Pembina Band',
                'email' => 'pembinaband@mdp.ac.id',
                'role' => 'pembina',
                'password' => bcrypt('pembina_band')
            ],

            [
                'name' => 'Pembina Futsal',
                'email' => 'pembinafutsal@mdp.ac.id',
                'role' => 'pembina',
                'password' => bcrypt('pembina_futsal')
            ],

            [
                'name' => 'Pembina Programming',
                'email' => 'pembinaprogramming@mdp.ac.id',
                'role' => 'pembina',
                'password' => bcrypt('pembina_programming')
            ],

            [
                'name' => 'Pembina Taekwondo',
                'email' => 'pembinataekwondo@mdp.ac.id',
                'role' => 'pembina',
                'password' => bcrypt('pembina_taekwondo')
            ],

            [
                'name' => 'Pembina Seni Tari',
                'email' => 'pembinatari@mdp.ac.id',
                'role' => 'pembina',
                'password' => bcrypt('pembina_tari')
            ],

            [
                'name' => 'Pembina Volly',
                'email' => 'pembinavolly@mdp.ac.id',
                'role' => 'pembina',
                'password' => bcrypt('pembina_volly')
            ],

            [
                'name' => 'Pelatih Badminton',
                'email' => 'pelatihbadminton@mdp.ac.id',
                'role' => 'pelatih',
                'password' => bcrypt('pelatih_badminton')
            ],

            [
                'name' => 'Pelatih Basket',
                'email' => 'pelatihbasket@mdp.ac.id',
                'role' => 'pelatih',
                'password' => bcrypt('pelatih_basket')
            ],

            [
                'name' => 'Pelatih E-Sport',
                'email' => 'pelatihesport@mdp.ac.id',
                'role' => 'pelatih',
                'password' => bcrypt('pelatih_esport')
            ],

            [
                'name' => 'Pelatih Marching Band',
                'email' => 'pelatihmb@mdp.ac.id',
                'role' => 'pelatih',
                'password' => bcrypt('pelatih_mb')
            ],

            [
                'name' => 'Pelatih Paduan Suara',
                'email' => 'pelatihpadus@mdp.ac.id',
                'role' => 'pelatih',
                'password' => bcrypt('pelatih_padus')
            ],

            [
                'name' => 'Pelatih Band',
                'email' => 'pelatihband@mdp.ac.id',
                'role' => 'pelatih',
                'password' => bcrypt('pelatih_band')
            ],

            [
                'name' => 'Pelatih Futsal',
                'email' => 'pelatihfutsal@mdp.ac.id',
                'role' => 'pelatih',
                'password' => bcrypt('pelatih_futsal')
            ],

            [
                'name' => 'Pelatih Programming',
                'email' => 'pelatihprogramming@mdp.ac.id',
                'role' => 'pelatih',
                'password' => bcrypt('pelatih_programming')
            ],

            [
                'name' => 'Pelatih Taekwondo',
                'email' => 'pelatihtaekwondo@mdp.ac.id',
                'role' => 'pelatih',
                'password' => bcrypt('pelatih_taekwondo')
            ],

            [
                'name' => 'Pelatih Seni Tari',
                'email' => 'pelatihtari@mdp.ac.id',
                'role' => 'pelatih',
                'password' => bcrypt('pelatih_tari')
            ],

            [
                'name' => 'Pelatih Volly',
                'email' => 'pelatihvolly@mdp.ac.id',
                'role' => 'pelatih',
                'password' => bcrypt('pelatih_volly')
            ],

            [
                'name' => 'Admin Keuangan',
                'email' => 'adminkeuangan@mdp.ac.id',
                'role' => 'adminKeuangan',
                'password' => bcrypt('admin_keuangan')
            ],

            [
                'name' => 'Bidang Kemahasiswaan',
                'email' => 'bidangmahasiswa@mdp.ac.id',
                'role' => 'bidangKemahasiswaan',
                'password' => bcrypt('bidang_mahasiswa')
            ],
            ];

            foreach ($userData as $key => $val) {
                User::create($val);
            }
    }
}
