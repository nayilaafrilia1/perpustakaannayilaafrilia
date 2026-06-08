<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\DetailPeminjaman;

class ControllerDashboardPeminjam extends Controller
{
    /**
     * =========================================================
     * DASHBOARD PEMINJAM
     * =========================================================
     */
    public function index()
    {
        /*
        |=========================================================
        | ID PEMINJAM LOGIN
        |=========================================================
        */

        $idPeminjam = auth('peminjam')->user()->id;

        /*
        |=========================================================
        | DATA PEMINJAMAN
        |=========================================================
        */

        $totalPinjam = DetailPeminjaman::whereHas(
                                    'peminjaman',
                                    function ($query) use ($idPeminjam) {

                                        $query->where(
                                            'idpeminjam',
                                            $idPeminjam
                                        );

                                    }
                                )->count();

        $totalKembali = DetailPeminjaman::whereHas(
                                        'peminjaman',
                                        function ($query) use ($idPeminjam) {

                                            $query->where(
                                                'idpeminjam',
                                                $idPeminjam
                                            );

                                        }
                                    )
                                    ->where(
                                        'keterangan',
                                        'sudahkembali'
                                    )
                                    ->count();

        $totalBelumKembali = DetailPeminjaman::whereHas(
                                                'peminjaman',
                                                function ($query) use ($idPeminjam) {

                                                    $query->where(
                                                        'idpeminjam',
                                                        $idPeminjam
                                                    );

                                                }
                                            )
                                            ->where(
                                                'keterangan',
                                                'belumkembali'
                                            )
                                            ->count();

        $totalDenda = DetailPeminjaman::whereHas(
                                    'peminjaman',
                                    function ($query) use ($idPeminjam) {

                                        $query->where(
                                            'idpeminjam',
                                            $idPeminjam
                                        );

                                    }
                                )->sum('denda');

        /*
        |=========================================================
        | RIWAYAT
        |=========================================================
        */

        $riwayat = DetailPeminjaman::with([
                            'buku',
                            'peminjaman'
                        ])
                        ->whereHas(
                            'peminjaman',
                            function ($query) use ($idPeminjam) {

                                $query->where(
                                    'idpeminjam',
                                    $idPeminjam
                                );

                            }
                        )
                        ->latest()
                        ->take(10)
                        ->get();

        return view('zonapeminjam.dashboard.dashboardpeminjam', [

            'title'                   => 'Dashboard Peminjam',

            'totalPinjam'             => $totalPinjam,

            'totalKembali'            => $totalKembali,

            'totalBelumKembali'       => $totalBelumKembali,

            'totalDenda'              => $totalDenda,

            'riwayat'                 => $riwayat,

        ]);
    }
}