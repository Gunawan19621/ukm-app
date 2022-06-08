<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use App\Models\Laporan;
use App\Models\Logbook;
use App\Models\Proposal;
use App\Models\UKM;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                    'name'=>'Wahyu Nugraha',
                    'email'=>'wahyu@gmail.com',
                    'password'=>bcrypt('wahyu123'),
                    'email_verified_at'=>date('Y-m-d H:i:s'),
                    'ukm_id'=>'1',
                    'role'=>'1',
                ],
                [
                    'name'=>'Hana Kariska',
                    'email'=>'hana@gmail.com',
                    'password'=>Hash::make('hana123'),
                    'email_verified_at'=>date('Y-m-d H:i:s'),
                    'ukm_id'=>'7',
                    'role'=>'1',
                    ]
                ];

        $ukms=[
            [
                'nama_ukm'=>'Kotak Pena',
                'slug'=>'kotak-pena',
                'deskripsi'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, necessitatibus veritatis error temporibus pariatur quae totam delectus architecto, porro quasi, molestias qui officiis eos ullam non earum! Excepturi pariatur voluptatem, doloribus sint possimus delectus accusantium beatae illum. Cupiditate, sequi consequatur?Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde ut perspiciatis officiis labore blanditiis nihil accusantium dicta voluptas maxime, aspernatur ab fuga molestias? Dignissimos reiciendis rem recusandae, commodi sunt totam eveniet nam doloribus corporis obcaecati saepe fuga excepturi soluta ipsum veritatis tempora beatae quo nihil nemo voluptas facilis? Alias, distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, a! Non cum quia natus beatae id sunt vero saepe consectetur dolore, eius maiores sapiente perspiciatis quod officia optio placeat blanditiis? Libero incidunt praesentium facilis saepe soluta quae natus consequuntur ab, dolores rerum, magni reiciendis adipisci non nam consequatur explicabo illum!',

            ],
            [
                'nama_ukm'=>'Forum Mahasiswa Bidik Misi',
                'slug'=>'forum-mahasiswa-bidik-misi',
                'deskripsi'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, necessitatibus veritatis error temporibus pariatur quae totam delectus architecto, porro quasi, molestias qui officiis eos ullam non earum! Excepturi pariatur voluptatem, doloribus sint possimus delectus accusantium beatae illum. Cupiditate, sequi consequatur?Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde ut perspiciatis officiis labore blanditiis nihil accusantium dicta voluptas maxime, aspernatur ab fuga molestias? Dignissimos reiciendis rem recusandae, commodi sunt totam eveniet nam doloribus corporis obcaecati saepe fuga excepturi soluta ipsum veritatis tempora beatae quo nihil nemo voluptas facilis? Alias, distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, a! Non cum quia natus beatae id sunt vero saepe consectetur dolore, eius maiores sapiente perspiciatis quod officia optio placeat blanditiis? Libero incidunt praesentium facilis saepe soluta quae natus consequuntur ab, dolores rerum, magni reiciendis adipisci non nam consequatur explicabo illum!',


            ],
            [
                'nama_ukm'=>'Resimen Mahasiswa',
                'slug'=>'resimen-mahasiswa',
                'deskripsi'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, necessitatibus veritatis error temporibus pariatur quae totam delectus architecto, porro quasi, molestias qui officiis eos ullam non earum! Excepturi pariatur voluptatem, doloribus sint possimus delectus accusantium beatae illum. Cupiditate, sequi consequatur?Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde ut perspiciatis officiis labore blanditiis nihil accusantium dicta voluptas maxime, aspernatur ab fuga molestias? Dignissimos reiciendis rem recusandae, commodi sunt totam eveniet nam doloribus corporis obcaecati saepe fuga excepturi soluta ipsum veritatis tempora beatae quo nihil nemo voluptas facilis? Alias, distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, a! Non cum quia natus beatae id sunt vero saepe consectetur dolore, eius maiores sapiente perspiciatis quod officia optio placeat blanditiis? Libero incidunt praesentium facilis saepe soluta quae natus consequuntur ab, dolores rerum, magni reiciendis adipisci non nam consequatur explicabo illum!',

            ],
            [
                'nama_ukm'=>'Persatuan Olahraga Polindra',
                'slug'=>'persatuan-olahraga-polindra',
                'deskripsi'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, necessitatibus veritatis error temporibus pariatur quae totam delectus architecto, porro quasi, molestias qui officiis eos ullam non earum! Excepturi pariatur voluptatem, doloribus sint possimus delectus accusantium beatae illum. Cupiditate, sequi consequatur?Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde ut perspiciatis officiis labore blanditiis nihil accusantium dicta voluptas maxime, aspernatur ab fuga molestias? Dignissimos reiciendis rem recusandae, commodi sunt totam eveniet nam doloribus corporis obcaecati saepe fuga excepturi soluta ipsum veritatis tempora beatae quo nihil nemo voluptas facilis? Alias, distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, a! Non cum quia natus beatae id sunt vero saepe consectetur dolore, eius maiores sapiente perspiciatis quod officia optio placeat blanditiis? Libero incidunt praesentium facilis saepe soluta quae natus consequuntur ab, dolores rerum, magni reiciendis adipisci non nam consequatur explicabo illum!',

            ],
            [
                'nama_ukm'=>'Foreign Language Forum',
                'slug'=>'foreign-language-forum',
                'deskripsi'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, necessitatibus veritatis error temporibus pariatur quae totam delectus architecto, porro quasi, molestias qui officiis eos ullam non earum! Excepturi pariatur voluptatem, doloribus sint possimus delectus accusantium beatae illum. Cupiditate, sequi consequatur?Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde ut perspiciatis officiis labore blanditiis nihil accusantium dicta voluptas maxime, aspernatur ab fuga molestias? Dignissimos reiciendis rem recusandae, commodi sunt totam eveniet nam doloribus corporis obcaecati saepe fuga excepturi soluta ipsum veritatis tempora beatae quo nihil nemo voluptas facilis? Alias, distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, a! Non cum quia natus beatae id sunt vero saepe consectetur dolore, eius maiores sapiente perspiciatis quod officia optio placeat blanditiis? Libero incidunt praesentium facilis saepe soluta quae natus consequuntur ab, dolores rerum, magni reiciendis adipisci non nam consequatur explicabo illum!',

            ],
            [
                'nama_ukm'=>'Komunitas Mahasiswa Pecinta Alam',
                'slug'=>'komunitas-mahasiswa-pecinta-alam',
                'deskripsi'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, necessitatibus veritatis error temporibus pariatur quae totam delectus architecto, porro quasi, molestias qui officiis eos ullam non earum! Excepturi pariatur voluptatem, doloribus sint possimus delectus accusantium beatae illum. Cupiditate, sequi consequatur?Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde ut perspiciatis officiis labore blanditiis nihil accusantium dicta voluptas maxime, aspernatur ab fuga molestias? Dignissimos reiciendis rem recusandae, commodi sunt totam eveniet nam doloribus corporis obcaecati saepe fuga excepturi soluta ipsum veritatis tempora beatae quo nihil nemo voluptas facilis? Alias, distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, a! Non cum quia natus beatae id sunt vero saepe consectetur dolore, eius maiores sapiente perspiciatis quod officia optio placeat blanditiis? Libero incidunt praesentium facilis saepe soluta quae natus consequuntur ab, dolores rerum, magni reiciendis adipisci non nam consequatur explicabo illum!',

            ],
            [
                'nama_ukm'=>'Seni Budaya Polindra',
                'slug'=>'seni-budaya-polindra',
                'deskripsi'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, necessitatibus veritatis error temporibus pariatur quae totam delectus architecto, porro quasi, molestias qui officiis eos ullam non earum! Excepturi pariatur voluptatem, doloribus sint possimus delectus accusantium beatae illum. Cupiditate, sequi consequatur?Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde ut perspiciatis officiis labore blanditiis nihil accusantium dicta voluptas maxime, aspernatur ab fuga molestias? Dignissimos reiciendis rem recusandae, commodi sunt totam eveniet nam doloribus corporis obcaecati saepe fuga excepturi soluta ipsum veritatis tempora beatae quo nihil nemo voluptas facilis? Alias, distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, a! Non cum quia natus beatae id sunt vero saepe consectetur dolore, eius maiores sapiente perspiciatis quod officia optio placeat blanditiis? Libero incidunt praesentium facilis saepe soluta quae natus consequuntur ab, dolores rerum, magni reiciendis adipisci non nam consequatur explicabo illum!',

            ],
            [
                'nama_ukm'=>'Robotika Polindra',
                'slug'=>'robotika-polindra',
                'deskripsi'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, necessitatibus veritatis error temporibus pariatur quae totam delectus architecto, porro quasi, molestias qui officiis eos ullam non earum! Excepturi pariatur voluptatem, doloribus sint possimus delectus accusantium beatae illum. Cupiditate, sequi consequatur?Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde ut perspiciatis officiis labore blanditiis nihil accusantium dicta voluptas maxime, aspernatur ab fuga molestias? Dignissimos reiciendis rem recusandae, commodi sunt totam eveniet nam doloribus corporis obcaecati saepe fuga excepturi soluta ipsum veritatis tempora beatae quo nihil nemo voluptas facilis? Alias, distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, a! Non cum quia natus beatae id sunt vero saepe consectetur dolore, eius maiores sapiente perspiciatis quod officia optio placeat blanditiis? Libero incidunt praesentium facilis saepe soluta quae natus consequuntur ab, dolores rerum, magni reiciendis adipisci non nam consequatur explicabo illum!',

            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
        foreach ($ukms as $ukm){
            UKM::create($ukm);
        }

        User::factory(6)->create();
        Kegiatan::factory(20)->create();
        Laporan::factory(25)->create();
        Logbook::factory(50)->create();
        Proposal::factory(10)->create();

    }
}
