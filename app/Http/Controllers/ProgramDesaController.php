<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramDesaController extends Controller
{
    /**
     * Menampilkan halaman daftar semua program untuk pengunjung.
     */
    public function index()
    {
        $programs = Program::latest()->get();
        return view('pages.program', [
            'title' => 'Program Desa',
            'programs' => $programs
        ]);
    }

    /**
     * Menampilkan halaman detail untuk satu program.
     */
    public function show(Program $program)
    {
        return view('pages.program-detail', [
            'title' => 'Detail Program',
            'program' => $program
        ]);
    }
}