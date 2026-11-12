<?php

namespace Tests\Feature;

use App\Models\Buku;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BukuTest extends TestCase
{
    use RefreshDatabase;

    public function test_buku_can_be_created_and_displayed_with_its_metadata(): void
    {
        $this->withoutVite();

        $dataBuku = [
            'judul' => 'Laskar Pelangi',
            'penulis' => 'Andrea Hirata',
            'tahun_terbit' => 2005,
            'sinopsis' => 'Kisah perjuangan anak-anak Belitung.',
        ];

        $this->post(route('buku.store'), $dataBuku)
            ->assertRedirect(route('buku.index'));

        $this->assertDatabaseHas('buku', $dataBuku);

        $buku = Buku::firstOrFail();

        $this->get(route('buku.index'))
            ->assertOk()
            ->assertSee($dataBuku['judul'])
            ->assertSee($dataBuku['penulis'])
            ->assertSee((string) $dataBuku['tahun_terbit']);

        $this->get(route('buku.show', $buku))
            ->assertOk()
            ->assertSee($dataBuku['sinopsis']);
    }
}
