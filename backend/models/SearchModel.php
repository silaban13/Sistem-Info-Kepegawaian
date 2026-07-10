<?php

class SearchModel
{
    private $pages = [

        [
            "title" => "Home",
            "url" => "?page=home",
            "content" => "Sistem Informasi Kepegawaian mengelola data pegawai, absensi, cuti, divisi, jabatan dan informasi perusahaan."
        ],

        [
            "title" => "About",
            "url" => "?page=about",
            "content" => "Tentang Kami Sistem Informasi Kepegawaian merupakan aplikasi berbasis web dengan arsitektur MVC dan REST API."
        ],

        [
            "title" => "Contact",
            "url" => "?page=contact",
            "content" => "Hubungi Kami melalui email, telepon, alamat kantor, dan informasi kontak lainnya."
        ]

    ];


    public function search($keyword)
    {
        $result = [];

        foreach ($this->pages as $page) {

            if (
                stripos($page['title'], $keyword) !== false ||
                stripos($page['content'], $keyword) !== false
            ) {

                $pos = stripos($page['content'], $keyword);

                if ($pos !== false) {
                    $snippet = substr(
                        $page['content'],
                        max(0, $pos - 30),
                        80
                    );
                } else {
                    $snippet = substr($page['content'], 0, 80);
                }


                $result[] = [
                    "title" => $page['title'],
                    "url" => $page['url'],
                    "snippet" => "...".$snippet."..."
                ];
            }
        }


        return $result;
    }
}