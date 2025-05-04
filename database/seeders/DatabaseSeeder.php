<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => bcrypt('123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Supplier A',
                'username' => 'supplier_a',
                'password' => bcrypt('123'),
                'role' => 'supplier',
            ],
            [
                'name' => 'Kasir A',
                'username' => 'kasir_a',
                'password' => bcrypt('123'),
                'role' => 'kasir',
            ],
        ]);



        DB::table('satuan')->insert([
            [
                'kode_satuan' => 'tsp',
                'nama_satuan' => 'Sendok Teh',
            ],
            [
                'kode_satuan' => 'tbs',
                'nama_satuan' => 'Sendok Makan',
            ],
            [
                'kode_satuan' => 'kg',
                'nama_satuan' => 'Kilogram',
            ],
            [
                'kode_satuan' => 'g',
                'nama_satuan' => 'Gram',
            ],
            [
                'kode_satuan' => 'l',
                'nama_satuan' => 'Liter',
            ],
            [
                'kode_satuan' => 'ml',
                'nama_satuan' => 'Mililiter',
            ],
            [
                'kode_satuan' => 'batang',
                'nama_satuan' => 'Batang',
            ],
            [
                'kode_satuan' => 'butir',
                'nama_satuan' => 'Butir',
            ],
            [
                'kode_satuan' => 'siung',
                'nama_satuan' => 'Siung',
            ],
            [
                'kode_satuan' => 'buah',
                'nama_satuan' => 'Buah',
            ],
        ]);


        DB::table('produk')->insert([
            [
                'nama_produk' => 'Siomay',
                'harga_produk' => '18000',
                'gambar_produk' => 'siomay.jpeg',
            ],
            [
                'nama_produk' => 'Batagor',
                'harga_produk' => '18000',
                'gambar_produk' => 'batagor.jpeg',
            ],
        ]);


        DB::table('bahan')->insert([
            [
                'nama_bahan' => 'Bawang Goreng',
                'stok_bahan' => '100',
                'limit_bahan' => '10',
                'satuan_id' => '3',
                'harga_satuan_bahan' => '1000',
            ],
            [
                'nama_bahan' => 'Tahu Goreng',
                'stok_bahan' => '100',
                'limit_bahan' => '10',
                'satuan_id' => '2',
                'harga_satuan_bahan' => '1000',
            ],
            [
                'nama_bahan' => 'Udang',
                'stok_bahan' => '100',
                'limit_bahan' => '10',
                'satuan_id' => '3',
                'harga_satuan_bahan' => '1000',
            ],
            [
                'nama_bahan' => 'Air',
                'stok_bahan' => '100',
                'limit_bahan' => '10',
                'satuan_id' => '8',
                'harga_satuan_bahan' => '1000',
            ],
            [
                'nama_bahan' => 'Air Jeruk Nipis',
                'stok_bahan' => '100',
                'limit_bahan' => '10',
                'satuan_id' => '5',
                'harga_satuan_bahan' => '1000',
            ],
            [
                'nama_bahan' => 'Bawang Putih',
                'stok_bahan' => '100',
                'limit_bahan' => '10',
                'satuan_id' => '9',
                'harga_satuan_bahan' => '1000',
            ],
            [
                'nama_bahan' => 'Cabe Rawit Merah',
                'stok_bahan' => '100',
                'limit_bahan' => '10',
                'satuan_id' => '3',
                'harga_satuan_bahan' => '1000',
            ],
            [
                'nama_bahan' => 'Daging Ayam',
                'stok_bahan' => '100',
                'limit_bahan' => '10',
                'satuan_id' => '3',
                'harga_satuan_bahan' => '1000',
            ],
            [
                'nama_bahan' => 'Daun Bawang',
                'stok_bahan' => '100',
                'limit_bahan' => '10',
                'satuan_id' => '7',
                'harga_satuan_bahan' => '1000',
            ],
            [
                'nama_bahan' => 'Garam',
                'stok_bahan' => '100',
                'limit_bahan' => '10',
                'satuan_id' => '1',
                'harga_satuan_bahan' => '1000',
            ],
            [
                'nama_bahan' => 'Gula',
                'stok_bahan' => '100',
                'limit_bahan' => '10',
                'satuan_id' => '1',
                'harga_satuan_bahan' => '1000',
            ],
            [
                'nama_bahan' => 'Gula Merah',
                'stok_bahan' => '100',
                'limit_bahan' => '10',
                'satuan_id' => '1',
                'harga_satuan_bahan' => '1000',
            ],
            [
                'nama_bahan' => 'Ikan Tenggiri',
                'stok_bahan' => '100',
                'limit_bahan' => '10',
                'satuan_id' => '3',
                'harga_satuan_bahan' => '1000',
            ],
            [
                'nama_bahan' => 'Kacang Tanah',
                'stok_bahan' => '100',
                'limit_bahan' => '10',
                'satuan_id' => '3',
                'harga_satuan_bahan' => '1000',
            ],
            [
                'nama_bahan' => 'Kaldu Bubuk',
                'stok_bahan' => '100',
                'limit_bahan' => '10',
                'satuan_id' => '1',
                'harga_satuan_bahan' => '1000',
            ],
            [
                'nama_bahan' => 'Kecap Manis',
                'stok_bahan' => '100',
                'limit_bahan' => '10',
                'satuan_id' => '2',
                'harga_satuan_bahan' => '1000',
            ],
            [
                'nama_bahan' => 'Merica Bubuk',
                'stok_bahan' => '100',
                'limit_bahan' => '10',
                'satuan_id' => '1',
                'harga_satuan_bahan' => '1000',
            ],
            [
                'nama_bahan' => 'Minyak Goreng',
                'stok_bahan' => '100',
                'limit_bahan' => '10',
                'satuan_id' => '2',
                'harga_satuan_bahan' => '1000',
            ],
            [
                'nama_bahan' => 'Minyak Sayur',
                'stok_bahan' => '100',
                'limit_bahan' => '10',
                'satuan_id' => '2',
                'harga_satuan_bahan' => '1000',
            ],
            [
                'nama_bahan' => 'Tahu Putih',
                'stok_bahan' => '100',
                'limit_bahan' => '10',
                'satuan_id' => '3',
                'harga_satuan_bahan' => '1000',
            ],
            [
                'nama_bahan' => 'Telur',
                'stok_bahan' => '100',
                'limit_bahan' => '10',
                'satuan_id' => '8',
                'harga_satuan_bahan' => '1000',
            ],
            [
                'nama_bahan' => 'Tepung Sagu',
                'stok_bahan' => '100',
                'limit_bahan' => '10',
                'satuan_id' => '3',
                'harga_satuan_bahan' => '1000',
            ],
            [
                'nama_bahan' => 'Tepung Terigu',
                'stok_bahan' => '100',
                'limit_bahan' => '10',
                'satuan_id' => '3',
                'harga_satuan_bahan' => '1000',
            ],
            [
                'nama_bahan' => 'Kecap Manis',
                'stok_bahan' => '100',
                'limit_bahan' => '10',
                'satuan_id' => '2',
                'harga_satuan_bahan' => '1000',
            ],
        ]);


        DB::table('produk_bahan')->insert([
            [
                'produk_id' => '1',
                'bahan_id' => '23',
                'kebutuhan_bahan' => '0.2',
            ],
            [
                'produk_id' => '1',
                'bahan_id' => '22',
                'kebutuhan_bahan' => '0.15',
            ],
            [
                'produk_id' => '1',
                'bahan_id' => '10',
                'kebutuhan_bahan' => '0.5',
            ],
            [
                'produk_id' => '1',
                'bahan_id' => '17',
                'kebutuhan_bahan' => '0.25',
            ],
            [
                'produk_id' => '1',
                'bahan_id' => '4',
                'kebutuhan_bahan' => '0.4',
            ],
            [
                'produk_id' => '1',
                'bahan_id' => '19',
                'kebutuhan_bahan' => '2',
            ],
            [
                'produk_id' => '1',
                'bahan_id' => '13',
                'kebutuhan_bahan' => '0.2',
            ],
            [
                'produk_id' => '1',
                'bahan_id' => '3',
                'kebutuhan_bahan' => '0.15',
            ],
            [
                'produk_id' => '1',
                'bahan_id' => '9',
                'kebutuhan_bahan' => '2.5',
            ],
            [
                'produk_id' => '1',
                'bahan_id' => '16',
                'kebutuhan_bahan' => '3',
            ],
            [
                'produk_id' => '1',
                'bahan_id' => '10',
                'kebutuhan_bahan' => '1.25',
            ],
            [
                'produk_id' => '1',
                'bahan_id' => '17',
                'kebutuhan_bahan' => '0.5',
            ],
            [
                'produk_id' => '1',
                'bahan_id' => '11',
                'kebutuhan_bahan' => '0.5',
            ],
            [
                'produk_id' => '1',
                'bahan_id' => '21',
                'kebutuhan_bahan' => '1',
            ],
            [
                'produk_id' => '1',
                'bahan_id' => '14',
                'kebutuhan_bahan' => '0.1',
            ],
            [
                'produk_id' => '1',
                'bahan_id' => '6',
                'kebutuhan_bahan' => '2',
            ],
            [
                'produk_id' => '1',
                'bahan_id' => '5',
                'kebutuhan_bahan' => '1',
            ],
            [
                'produk_id' => '1',
                'bahan_id' => '12',
                'kebutuhan_bahan' => '1',
            ],
            [
                'produk_id' => '1',
                'bahan_id' => '2',
                'kebutuhan_bahan' => '3',
            ],
            [
                'produk_id' => '1',
                'bahan_id' => '21',
                'kebutuhan_bahan' => '1',
            ],
            [
                'produk_id' => '1',
                'bahan_id' => '6',
                'kebutuhan_bahan' => '0.5',
            ],



            [
                'produk_id' => '2',
                'bahan_id' => '8',
                'kebutuhan_bahan' => '0.2',
            ],
            [
                'produk_id' => '2',
                'bahan_id' => '3',
                'kebutuhan_bahan' => '0.1',
            ],
            [
                'produk_id' => '2',
                'bahan_id' => '22',
                'kebutuhan_bahan' => '0.05',
            ],
            [
                'produk_id' => '2',
                'bahan_id' => '23',
                'kebutuhan_bahan' => '2',
            ],
            [
                'produk_id' => '2',
                'bahan_id' => '9',
                'kebutuhan_bahan' => '3',
            ],
            [
                'produk_id' => '2',
                'bahan_id' => '6',
                'kebutuhan_bahan' => '7',
            ],
            [
                'produk_id' => '2',
                'bahan_id' => '21',
                'kebutuhan_bahan' => '1',
            ],
            [
                'produk_id' => '2',
                'bahan_id' => '10',
                'kebutuhan_bahan' => '2',
            ],
            [
                'produk_id' => '2',
                'bahan_id' => '17',
                'kebutuhan_bahan' => '0.5',
            ],
            [
                'produk_id' => '2',
                'bahan_id' => '15',
                'kebutuhan_bahan' => '0.5',
            ],
            [
                'produk_id' => '2',
                'bahan_id' => '20',
                'kebutuhan_bahan' => '0.2',
            ],
            [
                'produk_id' => '2',
                'bahan_id' => '14',
                'kebutuhan_bahan' => '0.1',
            ],
            [
                'produk_id' => '2',
                'bahan_id' => '16',
                'kebutuhan_bahan' => '2',
            ],
            [
                'produk_id' => '2',
                'bahan_id' => '12',
                'kebutuhan_bahan' => '0.1',
            ],
            [
                'produk_id' => '2',
                'bahan_id' => '4',
                'kebutuhan_bahan' => '0.15',
            ],
            [
                'produk_id' => '2',
                'bahan_id' => '7',
                'kebutuhan_bahan' => '0.1',
            ],
            [
                'produk_id' => '2',
                'bahan_id' => '18',
                'kebutuhan_bahan' => '1',
            ],
        ]);
    }
}
