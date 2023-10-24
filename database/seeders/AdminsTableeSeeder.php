<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Monolog\Handler\SyslogUdp\UdpSocket;
use App\Models\Admin;

class AdminsTableeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            ['id' => 1, 'name' => 'super admin', 'vendor_id' => 0, 'type' => 'superadmin', 'mobile' => '09126612898', 'email' => 'nader.davarmanesh62@gmail.com'
                , 'password' => '$2a$12$M62dMEVhSQLOYWI2PDa0y.PPMufj2mD53wsIGkhnitstGJ31.YlDO', 'image' => '', 'status' => 1],

        ];
        Admin::insert($adminRecords);
    }
}
