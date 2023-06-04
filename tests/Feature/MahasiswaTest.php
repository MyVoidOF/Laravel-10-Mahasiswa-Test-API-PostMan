<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MahasiswaTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGetMahasiswa()
    {
        $response = $this->get('/api/mahasiswa');
    
        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => [
                'id',
                'nim',
                'nama',
                'umur',
                'alamat',
                'kota',
                'kelas',
                'jurusan',
                'created_at',
                'updated_at',
            ],
        ]);
    }
    
    public function testCreateMahasiswa()
    {
        $data = [
            'nim' => '123456789',
            'nama' => 'John Doe',
            'umur' => 21,
            'alamat' => 'Jl. Contoh Alamat',
            'kota' => 'Jakarta',
            'kelas' => 'A',
            'jurusan' => 'Teknik Informatika',
        ];
    
        $response = $this->post('/api/mahasiswa', $data);
    
        $response->assertStatus(201);
        $response->assertJson($data);
    }
    
    // Lanjutkan dengan menulis skenario pengujian lainnya
    
}
